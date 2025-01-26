<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_imam extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'jadwal-imam-shalat';
	private $prefix 	= 'jadwalimam';
	private $tbl 		= 'jadwal_imam';
	private $tblprefix 	= 'jadwalimam_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;
		
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.jadwalimam_subuh = u.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u1', 'on' => 'tbl.jadwalimam_dzuhur = u1.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u2', 'on' => 'tbl.jadwalimam_ashar = u2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u3', 'on' => 'tbl.jadwalimam_maghrib = u3.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u4', 'on' => 'tbl.jadwalimam_isya = u4.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', '
			u.user_id as user_subuh_id,
			u.user_nama as user_subuh,
			u1.user_id as user_dzuhur_id,
			u1.user_nama as user_dzuhur,
			u2.user_id as user_ashar_id,
			u2.user_nama as user_ashar,
			u3.user_id as user_maghrib_id,
			u3.user_nama as user_maghrib,
			u4.user_id as user_isya_id,
			u4.user_nama as user_isya',
		$where, null, null, null, $join);

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Jadwal Imam';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Jadwal Imam Shalat', $this->initurl]];

		$data['action'] 				= 'edit';
		$data['redirect'] 				= $this->fullurl;
		$data['data']					= $getdata;

		$this->template->display($this->prefix.'_form', $data);
		
	}

	public function action_edit()
	{
		// if ( !@$this->granted['add'] ) { deniedpage($this->initurl); } 

		$data 		= null;
		$response	= null;
		$_error		= [];
		$input 		= app_input();
		$date = date('Y-m-d H:i:s');

		unset($input['dtBasicExample_length']);
		unset($input['DataTables_Table_0_length']);

        if ( !$this->form_validation->run($this) )
        {
        	foreach ($input as $key => $value) {
        		foreach ($value as $k => $val) {
        			$data[$key][$this->tblprefix.'subuh'] 	= @$value[0];
        			$data[$key][$this->tblprefix.'dzuhur'] 	= @$value[1];
        			$data[$key][$this->tblprefix.'ashar'] 	= @$value[2];
        			$data[$key][$this->tblprefix.'maghrib'] = @$value[3];
        			$data[$key][$this->tblprefix.'isya'] 	= @$value[4];
        		}
        	}

			if (is_pengguna()) {
				$_error[] = "<li>Anda tidak punya akses mengubah data</li>";
			}

        	if ( count($_error) > 0 ) {
				$response['status']     = 3;
				$response['message']    = implode("", $_error);
			}
			else
			{
				$this->db->trans_start();
				foreach ($data as $key => $value) {
					$where[$key] = [$this->tblprefix.'hari' => $key];
	        		$result[] 	= $this->m_crud->update($this->tbl, $data[$key], $where[$key]);
        		}
	            
	            set_reload_update();

	        	$this->db->trans_complete();

	        	if( $result[0]['status'] )
	            {
	                $response['status']     = 1;
	            	$response['message'] 	= 'Berhasil mengedit data <strong>'. @$input['nama'] .'</strong>';
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

/* End of file Kasmasjid.php */
/* Location: ./application/modules/kasmasjid/controllers/Kasmasjid.php */