<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kajian extends MX_Controller {

	private $fullurl 	= '';
	private $initurl 	= 'kajian';
	private $prefix 	= 'kajian';
	private $tbl 		= 'jadwal_kajian';
	private $tblprefix 	= 'kajian_';

	public function __construct()
	{
		parent::__construct();
		$this->fullurl 		= base_url() . $this->initurl;
	}

	public function index()
	{

		$data = [];
		$date = date("Y-m-d");

		$where['where'] = [
			$this->tblprefix.'isdelete' => '0'
		];

		$where['custom'] = "date({$this->tblprefix}tanggal) >= '{$date}'";

		$join[] = ['table' => 'master_user u', 'on' => 'tbl.kajian_userid = u.user_id', 'type' => 'left'];

		$order = [
			['field' => 'kajian_tanggal', 'direction' => 'ASC']
		];

		$getdata = $this->m_crud->getdata('array', $this->tbl . ' tbl', ' tbl.*, u.user_nama', $where, $order, null, null, $join);

		if (count($getdata) > 0) {
			$i = 0;
			foreach ($getdata as $key => $value) {

				$data['data_1'][0] = @$getdata[0];
				$data['data_1'][1] = @$getdata[3];
				// $data['data_1'][1] = @$getdata[1];

				$data['data_2'][0] = @$getdata[1];
				$data['data_2'][1] = @$getdata[4];
				// $data['data_2'][1] = @$getdata[3];

				$data['data_3'][0] = @$getdata[2];
				$data['data_3'][1] = @$getdata[5];
				// $data['data_3'][1] = @$getdata[5];
			}
		}

		if (count($data) > 0) {
			$this->load->view('kajian', $data);
		}

		
	}
}

/* End of file Kajian.php */
/* Location: ./application/modules/kajian/controllers/Kajian.php */