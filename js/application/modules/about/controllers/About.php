<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'about';
	private $prefix 	= 'about';
	private $tbl 		= 'about';
	private $tblprefix 	= 'about_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$data 	= null;
		
		$data 	= null;
		$data['initurl'] 				= $this->initurl;
		$data['fullurl'] 				= $this->fullurl;
		$data['_page_title']            = 'About';
		$data['_title']                 = $data['_page_title'];
		$data['_breadcrumb']            = [['About', $this->initurl]];

		$this->template->display($this->prefix, $data);
	}

}

/* End of file About.php */
/* Location: ./application/modules/about/controllers/About.php */