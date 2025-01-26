<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'konten';
	private $prefix 	= 'konten';
	private $tbl 		= 'konten';
	private $tblprefix 	= 'konten_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;
		
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.konten_createby = u.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user e', 'on' => 'tbl.konten_editedby = e.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', 'tbl.*, u.user_nama, e.user_nama as useredited_nama', ['where' => ['konten_isdelete' => '0']], null, null, null, $join);

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Konten';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Konten', $this->initurl]];
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
		$data['_page_title']            = 'Konten';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Konten', $this->initurl], ['Tambah', $this->initurl . '/add']];

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
		$data['_page_title']            = 'Edit Konten';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Edit Data';
		$data['_breadcrumb']            = [['Konten', $this->initurl], ['Edit', $this->initurl .'/edit/'.$id]];
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
        $this->form_validation->set_rules('posisi', 'posisi', 'required');
        $this->form_validation->set_rules('teks', 'teks', 'required');
        if ($input['posisi'] == '1') {
        	// $this->form_validation->set_rules('arab', 'arab', 'required');
        }

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'posisi']        	= $input['posisi'];
			$data[$this->tblprefix . 'arab']        	= @$input['arab'];
			$data[$this->tblprefix . 'teks']        	= $input['teks'];
			$data[$this->tblprefix . 'createby']  		= get_current_user_id();
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

		$this->form_validation->set_rules('posisi', 'posisi', 'required');
        $this->form_validation->set_rules('teks', 'teks', 'required');
        if ($input['posisi'] == '1') {
        	// $this->form_validation->set_rules('arab', 'arab', 'required');
        }

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'posisi']        	= $input['posisi'];
			$data[$this->tblprefix . 'arab']        	= @$input['arab'];
			$data[$this->tblprefix . 'teks']        	= $input['teks'];
			$data[$this->tblprefix . 'editedby']  		= get_current_user_id();
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

	public function action_status()
	{
		// if ( !@$this->granted['delete'] ) { deniedpage($this->initurl); } 

		$data 		= null;
		$response	= null;
		$where		= array();
		$input 		= app_input();

		$cekdata = $this->m_crud->getdata('row', $this->tbl, '*', ['where' => ['konten_id' => $input['id']]]);
		$status = ($cekdata->konten_status == '1') ? '0' : '1';

		$where 	= [$this->tblprefix . 'id' => @$input['id']];
		$data[$this->tblprefix . 'status'] = $status;			
		$result = $this->m_crud->update($this->tbl, $data, $where);	

		if ($result) {
			$response['status'] 	= 1;
			$response['message'] 	= 'Berhasil update data <strong>' . @$input['nama'] . '</strong>';
	        set_reload_update();
		} else {
			$response['status'] 	= 0;
			$response['message'] 	= 'Gagal update data <strong>' . @$input['nama'] . '</strong>';
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

/* End of file user.php */
/* Location: ./application/modules/master_user/controllers/Master_user.php */