<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Licence extends CI_Controller {

	public function index()
	{
		$data['enc'] = substr($this->app_encrypt($this->app_get_system('e') . $this->app_get_system('s') . date("Y-m-d H:i:s")), 0,20);
		$this->load->view('licence', $data);
	}

	public function create() {

		$data['status'] = false;
		$data['message'] = "Lisensi yang Anda masukkan salah";

		$error = [];

		$input = app_input();

		$gn = substr($input['gn'], 0,4);
		$lc = $input['lc'];

		if ($gn == $this->app_decrypt($lc)) {

			$e = $this->app_get_system('e');
			$s = $this->app_get_system('s');

			if ($e == "" OR $s == "") {
				$error[] = "Program ini hanya untuk Raspberry Pi";
			}

			if (count($error)) {
				$data['status'] = false;
				$data['message'] = implode("", $error);
			} else {
				$generate_lc = ['e' => $this->app_encrypt($e), 's' => $this->app_encrypt($s)];

				$_data['masjid_licence'] = json_encode($generate_lc);
				$result = $this->m_crud->update('set_masjid', $_data);
				// $result['status'] = true;

				if ($result['status']) {
					$data['status'] = true;
					$direct = base_url();
					$data['message'] = "Success!. Klik di <a href='{$direct}'>sini</a> untuk Login";
				}
			}
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));

	}

	public function cl()
	{
		$input = $this->input->get();

		$str = (@$input['genkey']) ? $input['genkey'] : "";
		$key = (@$input['key']) ? $input['key'] : "";

		$this->load->library('encrypt');
		$this->encrypt->set_cipher(MCRYPT_BLOWFISH);
		$hash   = $encrypted_string = $this->encrypt->encode($str, $key);
		$hash   = base64_encode($hash);
		trace($hash);
	}

	public function app_encrypt($str='', $isURL = false, $key = '@er!!ksanjaya')
	{
		$this->load->library('encrypt');
		$this->encrypt->set_cipher(MCRYPT_BLOWFISH);
		$hash   = $encrypted_string = $this->encrypt->encode($str, $key);
		$hash   = base64_encode($hash);
		if ($isURL){
			$hash   = urlencode($hash);
		}
		return $hash;
	}

	public function app_decrypt($str='', $isURL = FALSE, $key = '@er!!ksanjaya')
	{
		$this->load->library('encrypt');
		$this->encrypt->set_cipher(MCRYPT_BLOWFISH);
		if ($isURL) {
			$str    = urldecode($str);
		}
		$str    = base64_decode($str);
		$plain  = $encrypted_string = $this->encrypt->decode($str, $key);
		return $plain;
	}

	public function app_get_system($opt)
	{

	    $mac = null;

	    if ($opt == 'e') {
			ob_start(); // Turn on output buffering
			system('ifconfig'); //Execute external program to display output
			$mycom    = ob_get_contents(); // Capture the output into a variable
			ob_clean(); // Clean (erase) the output buffer
			$pmac     = strpos($mycom, 'ether'); // Find the position of Physical text
			$mac      = substr($mycom,($pmac+6),17);
		} elseif ($opt == 's') {
			# code...
			ob_start();
			system('cat /proc/cpuinfo | grep Serial');
			$result   = ob_get_contents();
			ob_clean();
			$pmac     = strpos($result, 'Serial');
			$mac    = substr($result,($pmac+10),16);
		}
		
		return $mac;
	}

}

/* End of file untitled.php */
/* Location: ./application/modules/licence/controllers/untitled.php */