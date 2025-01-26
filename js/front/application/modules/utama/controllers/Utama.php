<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'utama';
	private $prefix 	= 'utama';
	private $tbl 		= 'konten';
	private $tblprefix 	= 'konten_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{
		$where['where'] = [
			$this->tblprefix.'posisi' => '1',
			$this->tblprefix.'status' => '1',
			$this->tblprefix.'isdelete' => '0'
		];
		$order = [['field' => $this->tblprefix.'id', 'direction' => 'DESC']];
		$getdata = $this->m_crud->getdata('array', $this->tbl, '*', $where, $order);

		$data['initurl'] 			= $this->initurl;
		$data['fullurl'] 			= $this->fullurl;
		$data['data'] = $getdata;
		$this->template->show($this->prefix, $data);
	}

	public function getdata()
	{

		$where['where'] = [
			$this->tblprefix.'posisi' => '1',
			$this->tblprefix.'status' => '1',
			$this->tblprefix.'isdelete' => '0'
		];
		$order = [['field' => $this->tblprefix.'id', 'direction' => 'DESC']];
		$getdata = $this->m_crud->getdata('array', $this->tbl, '*', $where);

		$data['data'] = $getdata;
		$this->load->view('utama_load', $data);
	}

}

/* End of file Utama.php */
/* Location: ./application/modules/utama/controllers/Utama.php */