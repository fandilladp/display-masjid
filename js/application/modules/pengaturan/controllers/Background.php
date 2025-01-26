<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Background extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'pengaturan/background';
	private $prefix 	= 'background';
	private $tbl 		= 'set_background';
	private $tblprefix 	= 'background_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index($tipe = 'picture')
	{
		$data 	= null;
		$where 	= null;

		$where['where'] = ['background_tipe' => $tipe, 'background_isdelete' => '0'];
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.background_createby = u.user_id', 'type' => 'left'];
		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', '*', $where, null, null, null, $join);

		$data 	= null;
		$data['tipe']					= ucfirst($tipe);
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['Background ' . $data['tipe'], $this->initurl . '/' . $tipe]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}

	public function add($tipe)
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$data 	= null;
		$where 	= null;
		
		$where['custom'] = "1=1";

		$data['tipe']					= ucfirst($tipe);
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Background ' . $data['tipe'];
		$data['_title']                 = $data['_page_title'];
		$data['_breadcrumb']            = [['Background ' . $data['tipe'], $this->initurl . '/' . $tipe], ['Add', $this->initurl . "/add/" . $tipe]];

		$data['tipe'] 					= lcfirst($data['tipe']);
		$data['action'] 				= 'add';

		$this->template->display($this->prefix . '_form', $data);
	}

	public function upload()
	{
		// if ( !@$this->granted['edit'] ) { deniedpage($this->initurl); } 

		$input = app_input();

		$date = date("Y-m-d H:i:s");
	    $result['status'] = false;

		$tipe = (@$input['ID'] == 'picture') ? 'images' : 'videos';
		$config['upload_path']          = FCPATH . 'public/uploads/' . $tipe . '/';
        $config['allowed_types']        = 'jpg|png';
		if ($tipe == 'videos') {
        	$config['allowed_types']        = 'mp4|m4v';
		}

		$config['overwrite'] 			= TRUE;
		$config['remove_spaces'] 		= TRUE;
        $config['max_size']             = 102400;

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
        }

        trace($error,false);
        trace($data,false);
        trace($this->upload->do_upload('file'));*/

		if ($this->upload->do_upload('file')) # form input field attribute
		{
	    	$data[$this->tblprefix.'tipe'] = (@$input['ID'] == 'picture') ? 'picture' : 'video';
	    	$data[$this->tblprefix.'file'] = $this->upload->data()['file_name'];
	    	$data[$this->tblprefix.'createby'] = get_current_user_id();
	    	$data[$this->tblprefix.'createdate'] = $date;
	    	$result = $this->m_crud->insert($this->tbl, $data);
		}
	   

	    if( $result['status'] ) {
            $response['status']     = 1;
        	$response['message'] 	= 'Berhasil upload data <strong>'. @$data[$this->tblprefix.'file'] .'</strong>';
    		set_reload_update();
        } else {
        	$response['status'] 	= 0;
        	$response['message'] 	= 'Gagal upload data <strong>'. @$data[$this->tblprefix.'file'] .'</strong>';
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

	    $upload_path = FCPATH . 'public/uploads/' . $tipe . '/' . $input['file']; # check path is correct

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

		$cekdata = $this->m_crud->getdata('row', $this->tbl, '*', ['where' => ['background_id' => $input['id']]]);
		$status = ($cekdata->background_status == '1') ? '0' : '1';

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

/* End of file Background.php */
/* Location: ./application/modules/pengaturan/controllers/Background.php */