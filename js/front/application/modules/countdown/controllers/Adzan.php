<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adzan extends MX_Controller {

	public function index()
	{
		$data['data'] = null;
		$this->template->countdown('countdown/adzan', $data);
	}

	public function getdata($waktu)
	{
		$data['is_jumat'] = false;

		$data['waktu_shalat'] 	= date("Y-m-d") . " " . substr(jadwal_shalat()[$waktu], 0,5) . ":00";
		$data['shalat']			= ucfirst($waktu);

		$data['konten'] = [
			'1' => 'Adzan ' . $data['shalat'] . ' akan segera dimulai',
			'2' => 'Adzan ' . $data['shalat'] . ' akan segera dimulai'
		];

		$data['waktu_sleep'] = null;
		if($data['shalat'] == 'Dzuhur' AND date('D') == 'Fri') {
			$data['shalat']		= 'Jumat';
			$data['is_jumat'] 	= true;

			$waktu = 'jumat';
			$jeda = set_perwaktu_shalat($waktu);
			$data['waktu_sleep'] = $jeda['perwaktushalat_jeda_layar_mati'];

			$data['konten'] = [
				'1' => 'Adzan ' . $data['shalat'] . ' akan segera dimulai',
				'2' => 'Adzan ' . $data['shalat'] . ' akan segera dimulai'
			];
		}

		$this->template->countdown('countdown/adzan', $data);
	}

}

/* End of file Adzan.php */
/* Location: ./application/modules/adzan/controllers/Adzan.php */