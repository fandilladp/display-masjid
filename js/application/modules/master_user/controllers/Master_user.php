<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'master/user';
	private $prefix 	= 'user';
	private $tbl 		= 'master_user';
	private $tblprefix 	= 'user_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{

		$data 	= null;
		$where 	= null;
		
		$getdata 	= $this->m_crud->getdata('array', $this->tbl, '*', ['where' => ['user_isdelete' => '0']]);

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Master User';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['User', $this->initurl]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}



	public function add()
	{
		$data 	= null;
		$where 	= null;
		
		$getdata 	= $this->m_crud->getdata('array', $this->tbl, '*');

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Master User';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['User', $this->initurl], ['Tambah', $this->initurl . '/add']];

		$data['action'] 				= 'add';
		$data['redirect'] 				= $this->fullurl;
		$data['data']					= $getdata;

		$this->template->display($this->prefix.'_form', $data);
	}

	public function edit( $id = "" )
	{
		$data 	= null;
		$where 	= null;
		
		$where['where']	= [$this->tblprefix . 'id' => $id];	
		$getdata 	= $this->m_crud->getdata('row', $this->tbl, '*', $where, null, null, null);

		if ( count($getdata) == 0 ) { deniedpage(); }

		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Edit User';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Edit Data';
		$data['_breadcrumb']            = [['User', $this->initurl], ['Edit', $this->initurl .'/edit/'.$id]];
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
		$date = date('Y-m-d H:i:s');

		// form validation
        $this->form_validation->set_rules('uid', 'User ID', 'required|alpha_numeric|is_unique[master_user.user_uid]');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');

        $this->form_validation->set_rules('level', 'level', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'uid']        	= $input['uid'];
			$data[$this->tblprefix . 'nama']        = $input['nama'];
			$data[$this->tblprefix . 'jk']        	= $input['jk'];
			$data[$this->tblprefix . 'level']       = $input['level'];
			$data[$this->tblprefix . 'createdate']  = $date;
	        
	        if ($input['password'] == '') {
				$data[$this->tblprefix . 'password']    = md5($input['uid']);
	        } else {
				$data[$this->tblprefix . 'password']    = md5($input['password']);
	        }

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
	            	$response['message'] 	= 'Berhasil menambah data <strong>'. $input['nama'] .'</strong>';
	            } else {
	            	$response['status'] 	= 0;
	            	$response['message'] 	= 'Gagal menambah data <strong>'. $input['nama'] .'</strong>';
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
        $this->form_validation->set_rules('uid', 'uid', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        if (is_admin()) {
        	$this->form_validation->set_rules('level', 'level', 'required');
        }

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'uid']        		= $input['uid'];
			$data[$this->tblprefix . 'nama']        	= $input['nama'];
			$data[$this->tblprefix . 'jk']        		= $input['jk'];

	        if (is_admin()) {
				$data[$this->tblprefix . 'level']       = $input['level'];
			}

			$data[$this->tblprefix . 'isdelete']       	= "0";

			if ($input['password'] != "") {
				$data[$this->tblprefix . 'password']    = md5($input['password']);
			}
			$data[$this->tblprefix . 'lastupdate']  	= $date;

			if (is_admin() AND $input['ID'] == 1) {
				$_error[] = "<li>Anda tidak punya akses mengubah User <strong>System Administrator</strong></li>";
			}

			if (is_pengguna() AND get_current_user_id() != $input['ID']) {
				$_error[] = "<li>Anda tidak punya akses mengubah data user lain</li>";
			}

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
	            	$response['message'] 	= 'Berhasil mengedit data <strong>'. $input['nama'] .'</strong>';
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

	public function action_delete()
	{
		// if ( !@$this->granted['delete'] ) { deniedpage($this->initurl); } 

		$_error 	= [];
		$data 		= null;
		$response	= null;
		$where		= array();
		$input 		= app_input();

		if (is_admin() AND $input['id'] == 1) {
			$_error[] = "<li>Anda tidak punya akses menghapus User <strong>System Administrator</strong></li>";
		}

		if (is_pengguna() AND get_current_user_id() != $input['id']) {
			$_error[] = "<li>Anda tidak punya akses menghapus data user lain</li>";
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
        $this->output->set_content_type('application/json') -> set_output(json_encode($response));
	}
}

/* End of file Master_user.php */
/* Location: ./application/modules/master_user/controllers/Master_user.php */