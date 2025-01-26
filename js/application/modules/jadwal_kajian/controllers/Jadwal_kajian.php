<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_kajian extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'jadwal/kajian';
	private $prefix 	= 'jadwalkajian';
	private $tbl 		= 'jadwal_kajian';
	private $tblprefix 	= 'kajian_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;

		$order = [[
			'field' => 'tbl.kajian_tanggal', 'direction' => 'ASC'
		]];
		
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.kajian_userid = u.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', 
			'tbl.*, u.user_id, u.user_nama',
			['where' => ['kajian_isdelete' => '0']], null, null, null, $join);

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Jadwal Kajian';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Jadwal Kajian', $this->initurl]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}

	public function add()
	{
		$data 	= null;
		$where 	= null;
		
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Jadwal Kajian';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Jadwal Kajian', $this->initurl], ['Tambah', $this->initurl . '/add']];

		$data['action'] 				= 'add';
		$data['redirect'] 				= $this->fullurl;

		$this->template->display($this->prefix.'_form', $data);
	}

	public function edit( $id = "" )
	{
		$data 	= null;
		$where 	= null;
		
		$where['where']	= [$this->tblprefix . 'id' => $id];	
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.kajian_userid = u.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', 
			'tbl.*, u.user_id, u.user_nama', $where, null, null, null, $join);

		if ( count($getdata) == 0 ) { deniedpage(); }

		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Edit Petugas Shalat Jumat';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Edit Data';
		$data['_breadcrumb']            = [['Petugas Shalat Jumat', $this->initurl], ['Edit', $this->initurl .'/edit/'.$id]];
		$data['action'] 				= 'edit';
		$data['data'] 					= $getdata;

		$this->template->display($this->prefix . '_form', $data);
	}

	public function action_add()
	{
		// if ( !@$this->granted['add'] ) { deniedpage($this->initurl); } 

		$data 		= null;
		$response	= null;
		$_error		= [];
		$input 		= app_input();
		$date 		= date('Y-m-d H:i:s');

		// form validation
        $this->form_validation->set_rules('userid', 'Ustadz', 'required');
        $this->form_validation->set_rules('materi', 'materi', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'userid']        	= $input['userid'];
			$data[$this->tblprefix . 'materi']        	= $input['materi'];
			$data[$this->tblprefix . 'tanggal']        	= $input['tanggal'];
			$data[$this->tblprefix . 'waktu']        	= $input['waktu'];
			$data[$this->tblprefix . 'createdate']  	= $date;

        	if ( count($_error) > 0 ) {
				$response['status']     = 3;
				$response['message']    = implode("", $_error);
			}
			else
			{
	        	$result 	= $this->m_crud->insert($this->tbl, $data);
	        	if( $result['status'] )
	            {
	                $response['status']     = 1;
	            	$response['message'] 	= 'Berhasil menambah data <strong>'. @$input['nama'] .'</strong>';
	            	set_reload_update();
	            } else {
	            	$response['status'] 	= 0;
	            	$response['message'] 	= 'Gagal menambah data <strong>'. @$input['nama'] .'</strong>';
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

	public function action_edit()
	{
		// if ( !@$this->granted['add'] ) { deniedpage($this->initurl); } 

		$data 		= null;
		$response	= null;
		$_error		= [];
		$input 		= app_input();
		$date = date('Y-m-d H:i:s');

		// form validation
        $this->form_validation->set_rules('userid', 'Ustadz', 'required');
        $this->form_validation->set_rules('materi', 'materi', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'waktu', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'userid']        	= $input['userid'];
			$data[$this->tblprefix . 'materi']        	= $input['materi'];
			$data[$this->tblprefix . 'tanggal']        	= $input['tanggal'];
			$data[$this->tblprefix . 'waktu']        	= $input['waktu'];
			$data[$this->tblprefix . 'lastupdate']  	= $date;

        	if ( count($_error) > 0 ) {
				$response['status']     = 3;
				$response['message']    = implode("", $_error);
			}
			else
			{
				$where = [$this->tblprefix.'id' => $input['ID']];
	        	$result 	= $this->m_crud->update($this->tbl, $data, $where);
	        	
	        	if( $result['status'] )
	            {
	                $response['status']     = 1;
	            	$response['message'] 	= 'Berhasil mengedit data <strong>'. @$input['nama'] .'</strong>';
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

	public function action_delete()
	{
		// if ( !@$this->granted['delete'] ) { deniedpage($this->initurl); } 

		$_error 	= [];
		$data 		= null;
		$response	= null;
		$where		= array();
		$input 		= app_input();

		if (is_pengguna() AND get_current_user_id() != $input['id']) {
			$_error[] = "<li>Anda tidak punya akses menghapus data ini</li>";
		}

		if (count($_error)) {
			$response['status']     = 2;
			$response['message']    = implode("", $_error);
		} else {
			$where 	= [$this->tblprefix . 'id' => @$input['id']];
			$data[$this->tblprefix . 'isdelete'] = '1';			
			$result = $this->m_crud->update($this->tbl, $data, $where);	

			if ($result) {
				$response['status'] 	= 1;
				$response['message'] 	= 'Berhasil menghapus data <strong>' . @$input['nama'] . '</strong>';
			} else {
				$response['status'] 	= 0;
				$response['message'] 	= 'Gagal menghapus data <strong>' . @$input['nama'] . '</strong>';
			}
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file user.php */
/* Location: ./application/modules/master_user/controllers/Master_user.php */