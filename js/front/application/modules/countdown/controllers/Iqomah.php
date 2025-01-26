<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iqomah extends MX_Controller {

	public function index()
	{
		$data['data'] = null;
		$this->template->countdown('countdown/iqomah', $data);
		
	}

	public function getdata($waktu)
	{

		$jeda = set_perwaktu_shalat($waktu);
		$data['jeda_iqomah'] 		= $jeda['perwaktushalat_jeda_iqomah'];
		$data['jeda_layar_mati'] 	= $jeda['perwaktushalat_jeda_layar_mati'];

		$data['waktu_sleep'] 		= $data['jeda_iqomah'] + $data['jeda_layar_mati'];

		$data['waktu_shalat'] 		= date("Y-m-d") . " " . substr(jadwal_shalat()[$waktu], 0,5) . ":00";
		$data['shalat']				= ucfirst($waktu);

		if($data['shalat'] == 'Dzuhur' AND date('D') == 'Fri') {
			$data['shalat']			= 'Jumat';
		}

		$data['konten'] = [
			'1' => 'Menjelang Iqomah ' . $data['shalat'],
			'2' => 'Sesungguhnya doa yang tidak tertolak adalah doa antara adzan dan iqomah, maka berdoalah saat itu. (HR. Ahmad)'
		];

		$this->template->countdown('countdown/iqomah', $data);

	}

}

/* End of file Iqomah.php */
/* Location: ./application/modules/iqomah/controllers/Iqomah.php */