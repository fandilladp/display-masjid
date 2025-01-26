<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Font extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'pengaturan/font';
	private $prefix 	= 'font';
	private $tbl 		= 'set_font';
	private $tblprefix 	= 'font_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;

		$where['where'] = ['font_isdelete' => '0'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', '*', $where);

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Font ', $this->initurl]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}

	public function add()
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$data 	= null;
		$where 	= null;
		
		$where['custom'] = "1=1";

		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Font';
		$data['_title']                 = $data['_page_title'];
		$data['_breadcrumb']            = [['Font ', $this->initurl], ['Add', $this->initurl . "/add/"]];
		$data['action'] 				= 'add';

		$this->template->display($this->prefix . '_form', $data);
	}

	public function edit( $id = "" )
	{
		$data 	= null;
		$where 	= null;


		$where['where']	= [$this->tblprefix . 'id' => $id];	
		$getdata 	= $this->m_crud->getdata('row', $this->tbl, '*', $where, null, null, null);

		if ( count((array)$getdata) == 0 ) { deniedpage(); }

		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Edit Font';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Edit Data';
		$data['_breadcrumb']            = [['Font', $this->initurl], ['Edit', $this->initurl .'/edit/'.$id]];
		$data['action'] 				= 'edit';
		$data['data'] 					= $getdata;

		$this->template->display($this->prefix . '_form', $data);
	}

	public function action_add()
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$input = app_input();

		$date = date("Y-m-d H:i:s");
	    $result['status'] = false;

		$config['upload_path']          = FCPATH . 'public/uploads/fonts/';
        $config['allowed_types']        = 'ttf';
		$config['overwrite'] 			= TRUE;
		$config['remove_spaces'] 		= TRUE;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);
		$this->upload->initialize($config);

		/*$error = [];
		$data = [];
		if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
        }*/


        // trace($this->upload->data());
        // trace($input,false);
        // trace($config,false);
        // trace($this->upload->data()['file_name'],false);
        // trace($this->upload->do_upload());

		if ($this->upload->do_upload('file')) # form input field attribute
		{
	    	$data[$this->tblprefix.'src'] 			= $this->upload->data()['file_name'];
	    	$data[$this->tblprefix.'nama'] 			= $_FILES['file']['name'];
	    	$data[$this->tblprefix.'family'] 		= $input['family'];
	    	$data[$this->tblprefix.'style'] 		= $input['style'];
	    	$data[$this->tblprefix.'weight'] 		= $input['weight'];
	    	$data[$this->tblprefix.'createdate'] 	= $date;
	    	$result = $this->m_crud->insert($this->tbl, $data);
		} else {
	    	$data[$this->tblprefix.'nama'] 			= $input['family'];
	    	$data[$this->tblprefix.'family'] 		= $input['family'];
	    	$data[$this->tblprefix.'style'] 		= $input['style'];
	    	$data[$this->tblprefix.'weight'] 		= $input['weight'];
	    	$data[$this->tblprefix.'createdate'] 	= $date;
	    	$result = $this->m_crud->insert($this->tbl, $data);
		}
	   

	    if( $result['status'] ) {
            $response['status']     = 1;
        	$response['message'] 	= 'Berhasil upload data <strong>'. @$data[$this->tblprefix.'nama'] .'</strong>';
    		set_reload_update();
        } else {
        	$response['status'] 	= 0;
        	$response['message'] 	= 'Gagal upload data <strong>'. $this->upload->display_errors('<p>', '</p>') .'</strong>';
        }
   
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function action_edit()
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$input = app_input();

		$date = date("Y-m-d H:i:s");
	    $result['status'] = false;

    	$data[$this->tblprefix.'family'] 		= @$input['family'];
    	$data[$this->tblprefix.'style'] 		= @$input['style'];
    	$data[$this->tblprefix.'weight'] 		= @$input['weight'];
    	$data[$this->tblprefix.'lastupdate'] 	= $date;

		$where = [$this->tblprefix.'id' => $input['ID']];
    	$result 	= $this->m_crud->update($this->tbl, $data, $where);

	    if( $result['status'] ) {
            $response['status']     = 1;
        	$response['message'] 	= 'Berhasil Update data <strong>'. @$data[$this->tblprefix.'family'] .'</strong>';
    		set_reload_update();
        } else {
        	$response['status'] 	= 0;
        	$response['message'] 	= 'Gagal Update data, <strong>'. $this->upload->display_errors('<p>', '</p>') .'</strong>';
        }
   
        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function action_delete()
	{
		// if ( !@$this->granted['delete'] ) { deniedpage($this->initurl); } 

		$data 		= null;
		$response	= null;
		$where		= array();
		$input 		= app_input();

		$tipe = (@$input['tipe'] == 'picture') ? 'images' : 'videos';

	    $upload_path = FCPATH . 'public/uploads/fonts/' . $input['file']; # check path is correct

		$where 	= [$this->tblprefix . 'id' => @$input['id']];
		$data[$this->tblprefix . 'isdelete'] = '1';			
		$result = $this->m_crud->update($this->tbl, $data, $where);	

		if ($result) {
			$response['status'] 	= 1;
			$response['message'] 	= 'Berhasil menghapus data <strong>' . @$input['nama'] . '</strong>';
	        unlink($upload_path);
	        set_reload_update();
		} else {
			$response['status'] 	= 0;
			$response['message'] 	= 'Gagal menghapus data <strong>' . @$input['nama'] . '</strong>';
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

		$cekdata = $this->m_crud->getdata('row', $this->tbl, '*', ['where' => ['font_id' => $input['id']]]);
		$status = ($cekdata->font_status == '1') ? '0' : '1';

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

/* End of file font.php */
/* Location: ./application/modules/pengaturan/controllers/Background.php */