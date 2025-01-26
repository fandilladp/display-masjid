<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masjid extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'pengaturan/masjid';
	private $prefix 	= 'masjid';
	private $tbl 		= 'set_masjid';
	private $tblprefix 	= 'masjid_';

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
		$data['_subtitle']              = '';
		$data['_breadcrumb']            = [['Masjid', $this->initurl]];
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

		if ( count($getdata) == 0 ) { deniedpage(); }

		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Edit Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Edit Data';
		$data['_breadcrumb']            = [['Masjid', $this->initurl], ['Edit', $this->initurl .'/edit/'.$id]];
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
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'nama']        = $input['nama'];
			$data[$this->tblprefix . 'alamat']        = $input['alamat'];

			if (is_pengguna()) {
				$_error[] = "<li>Anda tidak punya akses mengedit data ini</li>";
			}

	        if ( count($_error) > 0 ) {
				$response['status']     = 3;
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
	            	$response['message'] 	= 'Berhasil megedit data <strong>'. $input['nama'] .'</strong>';
	        		set_reload_update();
	            } else {
	            	$response['status'] 	= 0;
	            	$response['message'] 	= 'Gagal mengedit data <strong>'. $input['nama'] .'</strong>';
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

/* End of file Indentitas.php */
/* Location: ./application/modules/identitas/controllers/Indentitas.php */