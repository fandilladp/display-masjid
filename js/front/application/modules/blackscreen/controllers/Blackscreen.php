<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blackscreen extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'blackscreen';
	private $prefix 	= 'blackscreen';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		$this->load->view($this->prefix, $data);
	}

}

/* End of file Blackscreen.php */
/* Location: ./application/modules/pengaturan/controllers/Blackscreen.php */