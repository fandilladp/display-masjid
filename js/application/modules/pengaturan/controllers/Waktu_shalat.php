<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu_shalat extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'pengaturan/waktu-shalat';
	private $prefix 	= 'waktushalat';
	private $tbl 		= 'set_perhitungan_waktu_shalat';
	private $tblprefix 	= 'waktushalat_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;
		
		$getdata 	= $this->m_crud->getdata('row', $this->tbl, '*');

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_breadcrumb']            = [['Waktu Shalat', $this->initurl]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}

	public function edit( $id = "" )
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$data 	= null;
		$where 	= null;
		
		$where['custom'] = "1=1";

		$where['where']	= [$this->tblprefix . 'id' => $id];	
		$getdata 	= $this->m_crud->getdata('row', $this->tbl, '*', $where, null, null, null);

		// trace($getdata,false);
		// trace($this->db->last_query());

		if ( count($getdata) == 0 ) { deniedpage(); }

		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Edit Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_breadcrumb']            = [['Waktu Shalat', $this->initurl], ['Edit', $this->initurl . "/edit/" . $id]];

		$data['action'] 				= 'edit';
		$data['data'] 					= $getdata;

		$this->template->display($this->prefix . '_form', $data);
	}

	public function action_edit()
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$data 		= null;
		$response	= null;
		$_error		= [];
		$input 		= app_input();
		$date = date('Y-m-d H:i:s');

		// form validation
        $this->form_validation->set_rules('timezone_set', 'timezone_set', 'required');
        $this->form_validation->set_rules('ketinggian_laut', 'ketinggian_laut', 'required');
        $this->form_validation->set_rules('sudut_fajar_senja', 'sudut_fajar_senja', 'required');
        $this->form_validation->set_rules('sudut_malam_senja', 'sudut_malam_senja', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');
        $this->form_validation->set_rules('time_zone', 'time_zone', 'required');
        $this->form_validation->set_rules('mazhab', 'mazhab', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'timezone_set']        = $input['timezone_set'];
			$data[$this->tblprefix . 'ketinggian_laut']     = $input['ketinggian_laut'];
			$data[$this->tblprefix . 'sudut_fajar_senja']   = $input['sudut_fajar_senja'];
			$data[$this->tblprefix . 'sudut_malam_senja']   = $input['sudut_malam_senja'];
			$data[$this->tblprefix . 'latitude']        	= $input['latitude'];
			$data[$this->tblprefix . 'longitude']        	= $input['longitude'];
			$data[$this->tblprefix . 'time_zone']        	= $input['time_zone'];
			$data[$this->tblprefix . 'mazhab']        		= $input['mazhab'];

			if (is_pengguna()) {
				$_error[] = "<li>Anda tidak punya akses mengedit data ini</li>";
			}

	        if ( count($_error) > 0 ) {
				$response['status']     = 2;
				$response['message']    = implode("", $_error);
			}
			else
			{
	        	$where 	= [ $this->tblprefix . 'id' => $input['ID']];
	        	$result = $this->m_crud->update($this->tbl, $data, $where);

	        	if( $result )
	            {
	                $response['status']     = 1;
	            	$response['ID'] 	    = $input['ID'];
	            	$response['message'] 	= 'Berhasil megedit data <strong>'. @$input['nama'] .'</strong>';
	        		set_reload_update();
	            } else {
	            	$response['status'] 	= 0;
	            	$response['message'] 	= 'Gagal mengedit data <strong>'. @$input['nama'] .'</strong>';
	            }
	        }
        } else {
        	$response['status']     = 3;
            $str                	= ['<p>', '</p>'];
            $str_replace        	= ['<li>', '</li>'];
            $response['message']    = str_replace($str, $str_replace, validation_errors());
        }

        $this -> output -> set_header("Pragma: no-cache");
        $this -> output -> set_header("Cache-Control: no-store, no-cache");
        $this -> output -> set_content_type('application/json') -> set_output(json_encode($response));
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/modules/pengaturan/controllers/Pengaturan.php */