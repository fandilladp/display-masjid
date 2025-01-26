<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		trace('your are IP has been saved');
	}

	public function reload()
	{
		$input = app_input();

		$data['status'] = false;

		if(@$input['status']) {
			$data['status'] = true;
		} else {
			$where['where'] = ['reload_status' => '1'];
			$getdata = $this->m_crud->getdata('row','set_reload', "*", $where);

			if (count($getdata) > 0 ) {
				if ($getdata->reload_status == '1') {
					$data['status'] = true;
				} else {
					$data['status'] = false;
				}
			}

		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}

	public function reset_reload()
	{
		$data['status'] = false;

		$_data['reload_status'] = '0';
		$result = $this->m_crud->update('set_reload', $_data);

		if ($result['status']) {
			$data['status'] = true;
		} else {
			$data['status'] = false;
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}

	public function waktu_shalat_selanjutnya()
	{
		$input = app_input();

		trace($input);
		$getdata = $this->m_crud->getdata('row','set_perhitungan_waktu_shalat', "*");
		trace($getdata);

		/*$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));*/
		
	}

	public function setgeneral() {

		$data['status'] = 0;

		$input = app_input();

		$where['where'] = ['general_nama' => $input['nama']];
		$getdata = _CI()->m_crud->getdata('array','set_general', '*', $where);

		$data = [];
		foreach ($getdata as $key => $value) {
			$data['status'] = $value['general_status'];
		}

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}



	public function get_background() {

		$input = app_input();

		$tipe = ($input['tipe'] == 'picture') ? 'images' : 'videos';

		$where['where'] = ['background_tipe' => $input['tipe'], 'background_status' => '1', 'background_isdelete' => '0'];
		$getdata = _CI()->m_crud->getdata('array','set_background', '*', $where);

		$path = str_replace("front/", "", base_url()) . "public/uploads/" . $tipe . "/";

		$data = [];
		foreach ($getdata as $key => $value) {
			$data[] = $path.$value['background_file'];
			// str_replace('_client', '', base_url()) . 'public/uploads/' . $tipe . '/' . 
		}

		shuffle($data);

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_jadwal_imam() {

		$input = app_input();

		$today 		= lcfirst($input['today']);
		$tomorrow 	= lcfirst($input['tomorrow']);

		$where['where'] = ['jadwalimam_hari' => $today];
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.jadwalimam_subuh = u.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u1', 'on' => 'tbl.jadwalimam_dzuhur = u1.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u2', 'on' => 'tbl.jadwalimam_ashar = u2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u3', 'on' => 'tbl.jadwalimam_maghrib = u3.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u4', 'on' => 'tbl.jadwalimam_isya = u4.user_id', 'type' => 'left'];
		$get_today = _CI()->m_crud->getdata('row','jadwal_imam tbl',
			'u.user_nama as user_subuh, u1.user_nama as user_dzuhur, u2.user_nama as user_ashar, u3.user_nama as user_maghrib, u4.user_nama as user_isya',
		$where, null, null, null, $join);

		$_where['where'] = ['jadwalimam_hari' => $tomorrow];
		$_join[] = ['table' => 'master_user u', 'on' => 'tbl.jadwalimam_subuh = u.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u1', 'on' => 'tbl.jadwalimam_dzuhur = u1.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u2', 'on' => 'tbl.jadwalimam_ashar = u2.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u3', 'on' => 'tbl.jadwalimam_maghrib = u3.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u4', 'on' => 'tbl.jadwalimam_isya = u4.user_id', 'type' => 'left'];
		$get_tomorrow = _CI()->m_crud->getdata('row','jadwal_imam tbl',
			'u.user_nama as user_subuh, u1.user_nama as user_dzuhur, u2.user_nama as user_ashar, u3.user_nama as user_maghrib, u4.user_nama as user_isya',
		$_where, null, null, null, $_join);

		$data['today']['jadwalimam_hari']	 		= 'Hari ini';
		$data['today']['jadwalimam_subuh']	 		= @$get_today->user_subuh;
		$data['today']['jadwalimam_dzuhur']	 		= @$get_today->user_dzuhur;
		$data['today']['jadwalimam_ashar']	 		= @$get_today->user_ashar;
		$data['today']['jadwalimam_maghrib']	 	= @$get_today->user_maghrib;
		$data['today']['jadwalimam_isya']	 		= @$get_today->user_isya;

		$data['tomorrow']['jadwalimam_hari']	 	= 'Besok Hari';
		$data['tomorrow']['jadwalimam_subuh']	 	= @$get_tomorrow->user_subuh;
		$data['tomorrow']['jadwalimam_dzuhur']	 	= @$get_tomorrow->user_dzuhur;
		$data['tomorrow']['jadwalimam_ashar']	 	= @$get_tomorrow->user_ashar;
		$data['tomorrow']['jadwalimam_maghrib']	 	= @$get_tomorrow->user_maghrib;
		$data['tomorrow']['jadwalimam_isya']	 	= @$get_tomorrow->user_isya;

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_petugas_jumat() {

		$input = app_input();

		$hari = $input['hari'];

		if ($hari == "Rabu") {
			$tf = app_date_add(date("Y-m-d"), "+2 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "2 Hari Lagi";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Kamis") {
			$tf = app_date_add(date("Y-m-d"), "+1 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "1 Hari Lagi";
			$ts_sec = "Tanggal";
		} elseif ($hari == "Jumat") {
			$tf = app_date_add(date("Y-m-d"), "+0 days", "Y-m-d");
			$tf_next = app_date_add($tf, "+7 days", "Y-m-d");
			$ts = "Hari Ini";
			$ts_sec = "Minggu Depan";
		}

		$where['where'] = ['petugasshalatjumat_tanggal' => $tf];
		$join[] = ['table' => 'master_user u', 'on' => 'tbl.petugasshalatjumat_muadzin_1 = u.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u1', 'on' => 'tbl.petugasshalatjumat_muadzin_2 = u1.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u2', 'on' => 'tbl.petugasshalatjumat_khatib = u2.user_id', 'type' => 'left'];
		$join[] = ['table' => 'master_user u3', 'on' => 'tbl.petugasshalatjumat_imam = u3.user_id', 'type' => 'left'];
		$get_petugas_1 = _CI()->m_crud->getdata('row','petugas_shalat_jumat tbl',
			'u.user_nama as muadzin_1, u1.user_nama as muadzin_2, u2.user_nama as khatib, u3.user_nama as imam',
		$where, null, null, null, $join);
		// trace(_CI()->db->last_query(),false);

		$_where['where'] = ['petugasshalatjumat_tanggal' => $tf_next];
		$_join[] = ['table' => 'master_user u', 'on' => 'tbl.petugasshalatjumat_muadzin_1 = u.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u1', 'on' => 'tbl.petugasshalatjumat_muadzin_2 = u1.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u2', 'on' => 'tbl.petugasshalatjumat_khatib = u2.user_id', 'type' => 'left'];
		$_join[] = ['table' => 'master_user u3', 'on' => 'tbl.petugasshalatjumat_imam = u3.user_id', 'type' => 'left'];
		$get_petugas_2 = _CI()->m_crud->getdata('row','petugas_shalat_jumat tbl',
			'u.user_nama as muadzin_1, u1.user_nama as muadzin_2, u2.user_nama as khatib, u3.user_nama as imam',
		$_where, null, null, null, $_join);
		// trace(_CI()->db->last_query());

		$data['petugas1']['ts']	 		= $ts;
		$data['petugas1']['tf']	 		= $tf;
		// $data['petugas1']['tf']	 		= app_date_indo($tf, true); //app_date_value($tf, "d M Y");
		$data['petugas1']['muadzin_1']	= $this->fs_string_count(@$get_petugas_1->muadzin_1);
		$data['petugas1']['muadzin_2']	= $this->fs_string_count(@$get_petugas_1->muadzin_2);
		$data['petugas1']['khatib']	 	= $this->fs_string_count(@$get_petugas_1->khatib);
		$data['petugas1']['imam']	 	= $this->fs_string_count(@$get_petugas_1->imam);

		$data['petugas2']['ts']	 		= $ts_sec;
		$data['petugas2']['tf']	 		= $tf_next;
		// $data['petugas2']['tf']	 		= app_date_indo($tf_next, true);
		$data['petugas2']['muadzin_1']	= $this->fs_string_count(@$get_petugas_2->muadzin_1);
		$data['petugas2']['muadzin_2']	= $this->fs_string_count(@$get_petugas_2->muadzin_2);
		$data['petugas2']['khatib']	 	= $this->fs_string_count(@$get_petugas_2->khatib);
		$data['petugas2']['imam']	 	= $this->fs_string_count(@$get_petugas_2->imam);

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function fs_string_count($string) {

		$count = strlen($string);

		// if ($count <= 30 AND $count >= 26) {
		// 	$string = "<p style='font-size:20px; margin-top:14px;'>".$string."</p>";
		// } elseif ($count <= 25 AND $count >= 18) {
		// 	$string = "<p style='font-size:25px; margin-top:10px;'>".$string."</p>";
		// } elseif ($count <= 18) {
		// 	// $string = "<p style='font-size:30px; margin-top:5px;'>".$string."</p>";
		// } elseif ($count <= 10) {
		// 	// $string = "<p style='font-size:25px; margin-top:10px;'>".$string."</p>";
		// }

		return $string;
		// return $count;

	}

	/*public function get_jadwal_imam() {

		$input = app_input();

		$today 		= lcfirst($input['today']);
		$tomorrow 	= lcfirst($input['tomorrow']);

		$where['where'] = ['jadwalimam_hari' => $today];
		$get_today = _CI()->m_crud->getdata('row','jadwal_imam tbl',
			'*',
		$where, null, null, null);

		$_where['where'] = ['jadwalimam_hari' => $tomorrow];
		$get_tomorrow = _CI()->m_crud->getdata('row','jadwal_imam tbl',
			'*',
		$_where, null, null, null);

		$data['today']['jadwalimam_hari']	 		= 'Hari ini';
		$data['today']['jadwalimam_subuh']	 		= $get_today->jadwalimam_subuh;
		$data['today']['jadwalimam_dzuhur']	 		= $get_today->jadwalimam_dzuhur;
		$data['today']['jadwalimam_ashar']	 		= $get_today->jadwalimam_ashar;
		$data['today']['jadwalimam_maghrib']	 	= $get_today->jadwalimam_maghrib;
		$data['today']['jadwalimam_isya']	 		= $get_today->jadwalimam_isya;

		$data['tomorrow']['jadwalimam_hari']	 	= 'Besok';
		$data['tomorrow']['jadwalimam_subuh']	 	= $get_tomorrow->jadwalimam_subuh;
		$data['tomorrow']['jadwalimam_dzuhur']	 	= $get_tomorrow->jadwalimam_dzuhur;
		$data['tomorrow']['jadwalimam_ashar']	 	= $get_tomorrow->jadwalimam_ashar;
		$data['tomorrow']['jadwalimam_maghrib']	 	= $get_tomorrow->jadwalimam_maghrib;
		$data['tomorrow']['jadwalimam_isya']	 	= $get_tomorrow->jadwalimam_isya;

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}*/

	public function get_hijri() {
		$input = app_input();

		$getdata = $this->m_crud->getdata('row','set_perwaktu_shalat', "*", ['where' => ['perwaktushalat_nama' => 'Hijriah']]);

		$date = app_date_add(date("Y-m-d H:i:s"), "{$getdata->perwaktushalat_penyesuaian} days", "Y-m-d H:i:s");
		$selisih = app_date_diff(date('Y-m-d 23:59:59'), $input['maghrib']);

		$_jam = app_time_add($date, "+{$selisih->h} Hours", "Y-m-d H:i:s");
		$_menit = app_time_add($_jam, "+{$selisih->i} Minutes", "Y-m-d H:i:s");
		$pergantian_hari = app_time_add($_menit, "+{$selisih->s} Seconds", "Y-m-d H:i:s");

		$hijri = _CI()->hijridate->idate(strtotime($pergantian_hari));
		$data['hijri'] = _CI()->hijridate->get_date();

		$this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

}

/* End of file Service.php */
/* Location: ./application/modules/service/controllers/Service.php */