<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publik extends CI_Controller {

	public function index() {

	}

	public function action()
	{

		$data['status'] = false;
		$data['message'] = "Terjadi kesalahan, hubungi System Admin";
		$error = [];

		$input = app_input();

		$tipe = @$input['tipe'];

		if ($tipe == "shutdown") {
			$execute = system("/sbin/halt 2>&1");
			$data['status']		= true;
			$data['message'] 	= "Komputer Dimatikan";
		} elseif ($tipe == "restart") {
            $execute = system("/sbin/reboot 2>&1");
            $data['status']		= true;
            $data['message'] 	= "Sedang memulai ulang";
		} else {
			trace('mau ngapain');
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */