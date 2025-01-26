<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'pengaturan/general';
	private $prefix 	= 'general';
	private $tbl 		= 'set_general';
	private $tblprefix 	= 'general_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$where 	= null;

		$getdata 	= $this->m_crud->getdata('array', $this->tbl . ' tbl', '*');

		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'Pengaturan';
		$data['_title']                 = $data['_page_title'];
		$data['_subtitle']              = 'Table Data';
		$data['_breadcrumb']            = [['General ', $this->initurl]];
		$data['data']					= $getdata;

		$this->template->display($this->prefix, $data);
	}

	public function action_status()
	{
		$data 	= null;
		$where 	= null;

		$input = app_input();

		if ($input['nama'] == "Restart") {
                $execute = system("/sbin/reboot 2>&1");
                trace($execute);
        }

        if ($input['nama'] == "Shut Down") {
                $execute = system("/sbin/halt 2>&1");
                trace($execute);
        }

		$cekdata = $this->m_crud->getdata('row', $this->tbl, '*', ['where' => ['general_id' => $input['id']]]);
		$status = ($cekdata->general_status == '1') ? '0' : '1';


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

	public function blackscreen()
	{
		$data 	= null;
		$this->load->view('blackscreen', $data);
	}

}

/* End of file General.php */
/* Location: ./application/modules/pengaturan/General.php */