<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
if ( !function_exists('_CI') ) {
	function _CI() {
		$CI =& get_instance();
		return $CI;
	}
}

if ( !function_exists('get_running_text') ) { 
	function get_running_text($status = false) {

		$data['status']	= false;

		$where['where'] = ['konten_posisi' => '2', 'konten_status' => '1', 'konten_isdelete' => '0'];
		$order = [['field' => 'konten_id', 'direction' => 'DESC']];
		$getdata = _CI()->m_crud->getdata('array','konten', "*", $where, $order);

		if (count($getdata) > 0 ) {
			$teks = [];
			foreach ($getdata as $key => $value) {
				$teks[] = $value['konten_teks'];
				// $teks[] = "<p>".$value['konten_teks']."</p>";
			}

			$data['status']	= true;
			$data['data'] = implode(" ~**~ ", $teks);
			
		}
		
		return $data;
	}
}



if ( !function_exists('app_masjid') ) { 
	function app_masjid($status = false) {

		$data = _CI()->m_crud->getdata('row','set_masjid', "*");

		return $data;
	}
}


if ( !function_exists('jadwal_shalat') ) { 
	function jadwal_shalat($jammenit = true) {
		$getdata = _CI()->m_crud->getdata('row','set_perhitungan_waktu_shalat', "*");
		
		$data['latitude'] 			= $getdata->waktushalat_latitude;
		$data['longitude'] 			= $getdata->waktushalat_longitude;
		$data['ketinggian_laut'] 	= $getdata->waktushalat_ketinggian_laut;
		$data['sudut_fajar_senja']	= $getdata->waktushalat_sudut_fajar_senja;
		$data['sudut_malam_senja'] 	= $getdata->waktushalat_sudut_malam_senja;
		$data['time_zone'] 			= $getdata->waktushalat_time_zone;
		$data['mazhab'] 			= $getdata->waktushalat_mazhab;

		$J 		= getdate()['yday'];

		$H 		= $data['ketinggian_laut'];		// menentukan terbit dan waktu maghrib
		$Gd 	= $data['sudut_fajar_senja'];   // menentukan waktu subuh
		$Gn 	= $data['sudut_malam_senja'];   // menentukan waktu isya
		
		$B 		= $data['latitude'];    // Garis Lintang Utara (derajat)  -  Latitude (Degrees)
		$L 		= $data['longitude'];    // Garis Bujur Timur (derajat)  -  Longitude (Degrees)

		$TZ 	= $data['time_zone'];    // Waktu Daerah (jam)  -  Time Zone (Hours)
		$Sh 	= $data['mazhab'];    // Sh=1 (Shafii) - Sh=2 (Hanafi)

		$result = hitung_waktu_shalat($J, $H, $Gd, $Gn, $B, $L, $TZ, $Sh);

		return $result;
	}
}

if ( !function_exists('hitung_waktu_shalat') ) { 
	function hitung_waktu_shalat($J, $H, $Gd, $Gn, $B, $L, $TZ, $Sh) {

		$D = 0;    // Turun mengenai matahari (derajat)  -  Solar Declination (derajat)
		$T = 0;    // Persamaan dari waktu (menit)  -  Equation of times (minutes)
		$R = 0;    // Referensi Garis Bujur (derajat)  -  Reference Longitude (Degrees)

		$beta = 2 * pi() * $J / 365;
		$D = (180 / pi()) * (0.006918 - (0.399912 * cos($beta)) + (0.070257 * sin($beta)) - (0.006758 * cos(2 * $beta)) + (0.000907 * sin(2 * $beta)) - (0.002697 * cos(3 * $beta)) + (0.001480 * sin(3 * $beta)));
		$T = 229.18 * (0.000075 + (0.001868 * cos($beta)) - (0.032077 * sin($beta)) - (0.014615 * cos(2 * $beta)) - (0.040849 * sin(2 * $beta)));
		$R = 15 * $TZ;
		$G = 18;

		$Z	= 12 + (($R - $L) / 15) - ($T / 60);
		$U	= (180 / (15 * pi())) * acos((sin((-0.8333 - 0.0347 * sign($H) * sqrt(abs($H))) * (pi() / 180)) - sin($D * (pi() / 180)) * sin($B * (pi() / 180))) / (cos($D * (pi() / 180)) * cos($B * (pi() / 180))));
		$Vd	= (180 / (15 * pi())) * acos((-sin($Gd * (pi() / 180)) - sin($D * (pi() / 180)) * sin($B * (pi() / 180))) / (cos($D * (pi() / 180)) * cos($B * (pi() / 180))));
		$Vn	= (180 / (15 * pi())) * acos((-sin($Gn * (pi() / 180)) - sin($D * (pi() / 180)) * sin($B * (pi() / 180))) / (cos($D * (pi() / 180)) * cos($B * (pi() / 180))));
		$W	= (180 / (15 * pi())) * acos((sin(atan(1 / ($Sh + tan(abs($B - $D) * pi() / 180))))-sin($D * pi() / 180) * sin($B * pi() / 180)) / (cos($D * pi() / 180) * cos($B * pi() / 180)));

		$getdata = _CI()->m_crud->getdata('array', 'set_perwaktu_shalat', '*');

		$_data['subuh'] 	= ($getdata[0]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[0]['perwaktushalat_penyesuaian'];
		$_data['dzuhur']  	= ($getdata[1]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[1]['perwaktushalat_penyesuaian'];
		$_data['ashar']  	= ($getdata[2]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[2]['perwaktushalat_penyesuaian'];
		$_data['maghrib']  	= ($getdata[3]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[3]['perwaktushalat_penyesuaian'];
		$_data['isya']  	= ($getdata[4]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[4]['perwaktushalat_penyesuaian'];
		$_data['terbit'] 	= ($getdata[6]['perwaktushalat_penyesuaian'] == 0) ? '+0' : $getdata[6]['perwaktushalat_penyesuaian'];

		/*$data['subuh']	 = dectohours($Z-$Vd);
		$data['terbit']	 = dectohours($Z-$U);
		$data['dzuhur']	 = dectohours($Z);
		$data['ashar']	 = dectohours($Z+$W);
		$data['maghrib'] = dectohours($Z+$U);
		$data['isya']	 = dectohours($Z+$Vn);*/

		$data['subuh']	 = app_time_add(substr(dectohours($Z-$Vd), 0,5) . ":00", $_data['subuh'] . ' minutes', 'H:i:s');
		// $data['terbit']	 = dectohours($Z-$U);
		$data['terbit']	 = app_time_add(substr(dectohours($Z-$U), 0,5) . ":00", $_data['terbit'] . ' minutes', 'H:i:s');
		$data['dzuhur']	 = app_time_add(substr(dectohours($Z), 0,5) . ":00", $_data['dzuhur'] . ' minutes', 'H:i:s');
		$data['ashar']	 = app_time_add(substr(dectohours($Z+$W), 0,5) . ":00", $_data['ashar'] . ' minutes', 'H:i:s');
		$data['maghrib'] = app_time_add(substr(dectohours($Z+$U), 0,5) . ":00", $_data['maghrib'] . ' minutes', 'H:i:s');
		$data['isya'] = app_time_add(substr(dectohours($Z+$Vn), 0,5) . ":00", $_data['isya'] . ' minutes', 'H:i:s');

		return $data;

	}
}

if ( !function_exists('dectohours') ) { 
	function dectohours($dec) {

		return gmdate('H:i:s', floor($dec * 3600));
	}
}

if ( !function_exists('sign') ) { 
	function sign($x) {
		if($x == 0) {
			return 0;
		} else {
			return $x / abs($x);
		}
	}
}

if ( !function_exists('decimal_to_time') ) { 
	function decimal_to_time($decimal) {
	}
}

if ( !function_exists('clockalize') ) { 
	function clockalize($in){

	    $h = intval($in);
	    $m = round((((($in - $h) / 100.0) * 60.0) * 100), 0);
	    if ($m == 60)
	    {
	        $h++;
	        $m = 0;
	    }
	    $retval = sprintf("%02d:%02d", $h, $m);
	    return $retval;
	}
}

if ( !function_exists('convertTime') ) { 
	function convertTime($dec)
	{
	    // start by converting to seconds
	    $seconds = ($dec * 3600);
	    // we're given hours, so let's get those the easy way
	    $hours = floor($dec);
	    // since we've "calculated" hours, let's remove them from the seconds variable
	    $seconds -= $hours * 3600;
	    // calculate minutes left
	    $minutes = floor($seconds / 60);
	    // remove those from seconds as well
	    $seconds -= $minutes * 60;
	    // return the time formatted HH:MM:SS
	    return lz($hours).":".lz($minutes).":".lz($seconds);
	}
}

// lz = leading zero
if ( !function_exists('lz') ) { 
	function lz($num)
	{
	    return (strlen($num) < 2) ? "0{$num}" : $num;
	}
}

if ( !function_exists('convert_to_jam') ) { 
	function convert_to_jam($waktu) {
		$jam 	= floor($waktu);
		$menit 	= floor(($waktu - $jam) * 60)+2;
		$detik 	= floor((((($waktu - $jam) * 60)+2) - $menit) * 60);


		if (strlen($jam)==1) $jam="0" . $jam;
		if (strlen($menit)==1) $menit="0" . $menit;
		if (strlen($detik)==1) $detik="0" . $detik;

		return "$jam:$menit:$detik";
	}
}


if ( !function_exists('sisa_waktu_shalat') ) { 
	function sisa_waktu_shalat($waktu_shalat) {

		$waktu_sekarang = date("Y-m-d H:i:s");
		$waktu_shalat = date("Y-m-d") . " " . substr($waktu_shalat, 0,5) . ":00";

		$is_bigger = app_date_bigger($waktu_shalat, $waktu_sekarang);
		$waktu_shalat = ($is_bigger) ? $waktu_shalat : app_date_add($waktu_shalat, "+1 days", "Y-m-d H:i:s");

		return app_date_diff($waktu_shalat, $waktu_sekarang);
	}
}


if ( !function_exists('set_perwaktu_shalat') ) { 
	function set_perwaktu_shalat($waktu = null) {

		$where['where'] = ['perwaktushalat_nama' => $waktu];
		$getdata = _CI()->m_crud->getdata('array','set_perwaktu_shalat', "*", $where);


		if (count($getdata) > 0 ) {
			foreach ($getdata as $key => $value) {
				$data['perwaktushalat_id'] = $value['perwaktushalat_id'];
				$data['perwaktushalat_nama'] = $value['perwaktushalat_nama'];
				$data['perwaktushalat_jeda_iqomah'] = $value['perwaktushalat_jeda_iqomah'];
				$data['perwaktushalat_jeda_layar_mati'] = $value['perwaktushalat_jeda_layar_mati'];
				$data['perwaktushalat_konten'] = $value['perwaktushalat_konten'];
			}
		}

		return $data;
	}
}


if ( !function_exists('pengaturan_general') ) { 
	function pengaturan_general() {

		$getdata = _CI()->m_crud->getdata('array','set_general', '*');

		$data = [];
		foreach ($getdata as $key => $value) {
			$data[$value['general_nama']] = $value['general_status'];
		}

		return $data;
	}
}

if ( !function_exists('get_background') ) { 
	function get_background($tipe) {
		$data['status'] = 0;

		$tipe = ($tipe == 'picture') ? 'images' : 'videos';

		$where['where'] = ['background_tipe' => $tipe, 'background_status' => '1', 'background_isdelete' => '0'];
		$getdata = _CI()->m_crud->getdata('array','set_background', '*', $where);

		$_data = [];
		foreach ($getdata as $key => $value) {
			$data[] =  $value['background_file'];
			// str_replace('_client', '', base_url()) . 'public/uploads/' . $tipe . '/' . 
		}

		$_data['files'] = implode(', ', $data);

		return $_data['files'];

	}
}