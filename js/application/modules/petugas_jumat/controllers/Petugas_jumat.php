<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_jumat extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'petugas/shalat-jumat';
	private $prefix 	= 'petugasjumat';
	private $tbl 		= 'petugas_shalat_jumat';
	private $tblprefix 	= 'petugasshalatjumat_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;
		
		$join[] = ['table' => 'master_user m', 'on' => 'tbl.petugasshalatjumat_muadzin_1 = m.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user m2', 'on' => 'tbl.petugasshalatjumat_muadzin_2 = m2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user i', 'on' => 'tbl.petugasshalatjumat_imam = i.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user k', 'on' => 'tbl.petugasshalatjumat_khatib = k.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user c', 'on' => 'tbl.petugasshalatjumat_createby = c.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', 
			'tbl.*, m.user_nama as muazin_1, m2.user_nama as muazin_2, i.user_nama as imam, k.user_nama as khatib, c.user_nama as createby',
			['where' => ['petugasshalatjumat_isdelete' => '0']], null, null, null, $join);

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Petugas Shalat Jumat';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Petugas Shalat Jumat', $this->initurl]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}



	public function add()
	{
		$data 	= null;
		$where 	= null;
		
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Petugas Shalat Jumat';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Petugas Shalat Jumat', $this->initurl], ['Tambah', $this->initurl . '/add']];

		$data['action'] 				= 'add';
		$data['redirect'] 				= $this->fullurl;

		$this->template->display($this->prefix.'_form', $data);
	}

	public function edit( $id = "" )
	{
		$data 	= null;
		$where 	= null;
		
		$where['where']	= [$this->tblprefix . 'id' => $id];	
		$join[] = ['table' => 'master_user m', 'on' => 'tbl.petugasshalatjumat_muadzin_1 = m.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user m2', 'on' => 'tbl.petugasshalatjumat_muadzin_2 = m2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user i', 'on' => 'tbl.petugasshalatjumat_khatib = i.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user k', 'on' => 'tbl.petugasshalatjumat_imam = k.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user c', 'on' => 'tbl.petugasshalatjumat_createby = c.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', 
			'tbl.*, m.user_nama as petugasshalatjumat_muadzin_1_nama, m2.user_nama as petugasshalatjumat_muadzin_2_nama, i.user_nama as petugasshalatjumat_imam_nama, k.user_nama as petugasshalatjumat_khatib_nama, c.user_nama as petugasshalatjumat_createby_nama', $where, null, null, null, $join);

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
		$date = date('Y-m-d H:i:s');

		// form validation
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('muazin_1', 'muazin I', 'required');
        // $this->form_validation->set_rules('muazin_2', 'muazin II', 'required');
        $this->form_validation->set_rules('khatib', 'khatib', 'required');
        $this->form_validation->set_rules('imam', 'imam', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'tanggal']        	= $input['tanggal'];
			$data[$this->tblprefix . 'muadzin_1']       = $input['muazin_1'];
			$data[$this->tblprefix . 'muadzin_2']       = set_null(@$input['muazin_2']);
			$data[$this->tblprefix . 'khatib']        	= $input['khatib'];
			$data[$this->tblprefix . 'imam']        	= $input['imam'];
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

		// form validation
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('muazin_1', 'muazin I', 'required');
        // $this->form_validation->set_rules('muazin_2', 'muazin II', 'required');
        $this->form_validation->set_rules('khatib', 'khatib', 'required');
        $this->form_validation->set_rules('imam', 'imam', 'required');

        if ( $this->form_validation->run($this) )
        {
			$data[$this->tblprefix . 'tanggal']        	= $input['tanggal'];
			$data[$this->tblprefix . 'muadzin_1']       = $input['muazin_1'];
			$data[$this->tblprefix . 'muadzin_2']       = set_null(@$input['muazin_2']);
			$data[$this->tblprefix . 'khatib']        	= $input['khatib'];
			$data[$this->tblprefix . 'imam']        	= $input['imam'];
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