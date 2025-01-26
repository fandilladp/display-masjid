<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
	}

	public function get_user() {

		$input = app_input();

		$where['custom'] = "user_level != '1' AND user_isdelete = '0'";

		if ($this->input->get('q') != "") {
			$where['custom'] .= " AND user_nama like '%{$this->input->get('q')}%'";
		}

		$getdata = _CI()->m_crud->getdata('array','master_user', '*', $where);

		$data = [];
		foreach ($getdata as $key => $value) {
			$data[$key]['id'] = $value['user_id'];
			$data[$key]['text'] = $value['user_nama'];
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


}

/* End of file Service.php */
/* Location: ./application/modules/service/controllers/Service.php */