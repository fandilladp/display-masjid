<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

if( !function_exists('get_versi'))
{
	function get_versi()
	{
		
    $versi = "V.1.3";

		return $versi;
	}
}

if ( !function_exists('app_encrypt') )
{
  function app_encrypt($str='', $isURL = false, $key = '')
  {
    $CI =& get_instance();
    $CI->load->library('encrypt');

    $key    = ($key == "") ? 'erik@digitalbee.id' : $CI->config->item('encryption_key');

    $CI->encrypt->set_cipher(MCRYPT_BLOWFISH);
    // $CI->encrypt->set_cipher(MCRYPT_CRYPT);

    $hash   = $encrypted_string = $CI->encrypt->encode($str, $key);

    $hash   = base64_encode($hash);

    if ($isURL){
      $hash   = urlencode($hash);
    }

    return $hash;
  }
}

if ( !function_exists('app_decrypt') )
{
  function app_decrypt($str='', $isURL = FALSE, $key = '')
  {
    $CI =& get_instance();
    $CI->load->library('encrypt');

    $key    = ($key == "") ? 'erik@digitalbee.id' : $CI->config->item('encryption_key');

    $CI->encrypt->set_cipher(MCRYPT_BLOWFISH);
    // $CI->encrypt->set_cipher(MCRYPT_CRYPT);

    if ($isURL)
    {
      $str    = urldecode($str);
    }

    $str    = base64_decode($str);

    $plain  = $encrypted_string = $CI->encrypt->decode($str, $key);

    return $plain;
  }
}

if( !function_exists('app_get_mazhab'))
{
	function app_get_mazhab($index = null)
	{
		$mazhab =  [
	        '1' => 'SYAFII',
	        '2' => 'HANAFI'
     	];

		if ( !is_null(@$index)  ) {
			return $mazhab[$index];
		} else {
			return $mazhab;
		}
	}
}



if( !function_exists('app_get_posisi'))
{
	function app_get_posisi($index = null)
	{
		$mazhab =  [
	        '1' => 'TENGAH',
	        '2' => 'BAWAH'
      	];

		if ( !is_null(@$index)  ) {
			return $mazhab[$index];
		} else {
			return $mazhab;
		}
	}
}

if ( !function_exists('app_input') )
{
	function app_input($except = null, $clean = true)
	{
		$CI =& get_instance();

		$input  = [];

		foreach ($CI->input->post() as $key => $value) {

			$input[$key]  = $CI->input->post($key, $clean) == "" ? null : $CI->input->post($key, $clean);

			if ( !is_null($except) and in_array($key, $except) )
			{
				$input[$key]  = $CI->input->post($key, !$clean) == "" ? null : my_clean_string($CI->input->post($key, !$clean));					
			}

			if ( substr($key, 0, 3) == 'tgl' or strpos($key, "_tgl") ) {
				$input[$key]  = app_date_format($input[$key], 'Y-m-d', 'd-m-Y');
			} 
		}

	return $input;
	}
}

if (!function_exists('app_master_jk'))
{
	function app_master_jk( $index = null )
	{
		$data = [
			'' => 'PILIH JENIS KELAMIN',
			'L' => 'Laki - Laki',
			'P' => 'Perempuan'
		];
		if ( !is_null($index) ) return @$data[$index];
		return $data;
	}
}

if (!function_exists('app_master_level'))
{
	function app_master_level( $index = null )
	{
		$data = [
			'' => 'PILIH',
			'1' => 'Super Admin',
			'2' => 'Admin',
			'3' => 'Pengguna'
		];
		if ( !is_null($index) ) return @$data[$index];
		return $data;
	}
	}

if ( !function_exists('_CI') )
{
	function _CI()
	{
		$CI =& get_instance();
		return $CI;
	}
}

if ( !function_exists('get_file_extensions') )
{
	function get_file_extensions( $string = "" ) {
		$array 	= explode(".", $string);
		$ext 	= end($array);

		return $ext;
	}
}

if ( !function_exists('kelamin') )
{
	function kelamin($kelamin){
		if($kelamin ==  'L'){
			$kelamin = 'Laki-Laki';
		}else{
			$kelamin = 'Perempuan';
		}

		return $kelamin;
	}
}

if ( !function_exists('app_version') )
{
	function app_version(){
		$string = "<b>Version <span style='color: #3C82C0'>" . get_versi() . "</span></b> | Check for updates : <a href='https://github.com/eriiksanjaya/appujian' target='_blank'>Github</a>";
		echo $string;
	}
}

if ( !function_exists('trace') )
{
	function trace($data, $die = true){
		echo "<pre>";
		print_r($data);
		if($die) {
			die();
		}
		echo "</pre>";
	}
}


if ( !function_exists('app_minutes_to_hour') ) 
{
  function app_minutes_to_hour($time, $format = '%02d:%02d')
  {    
    if ($time < 1) {
        return "-";
    }
    if ( $time < 60 )
    {
      return $time . " m";
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
  }
}

if ( !function_exists('app_time_add'))
{
  function app_time_add($selectedTime = null, $modify = "+30 minutes", $format = "H:i" )
  {
    // note this will set to today's current date since you are not specifying it in your passed parameter. This probably doesn't matter if you are just going to add time to it.
    $selectedTime = is_null($selectedTime) ? date($format) : $selectedTime;
    $datetime = DateTime::createFromFormat($format, $selectedTime);
    $datetime->modify($modify);
    return $datetime->format($format);
  }
}

if ( !function_exists('app_date_add'))
{
  function app_date_add($selectedTime = null, $modify = "+7 days", $format = 'Y-m-d' )
  {
    // note this will set to today's current date since you are not specifying it in your passed parameter. This probably doesn't matter if you are just going to add time to it.
    $selectedTime = is_null($selectedTime) ? date($format) : $selectedTime;
    $datetime = DateTime::createFromFormat($format, $selectedTime);
    $datetime->modify($modify);
    return $datetime->format($format);
  }
}

if ( !function_exists('app_time_duration') ) 
{
  function app_time_duration($start, $end)
  {
    $start  = nice_date($start, 'H:i');
    $end    = nice_date($end, 'H:i');

    return $start . ' - ' . $end;
  }
}


if (!function_exists('app_date_bigger')) 
{
    function app_date_bigger($bigger, $smaller)
    {
      $bigger     = date_create($bigger);
      $smaller    = date_create($smaller);

      return $bigger > $smaller ? true : false;
    }
}

if (!function_exists('app_date_diff')) 
{
    function app_date_diff($bigger, $smaller)
    {
        $bigger     = date_create($bigger);
        $smaller    = date_create($smaller);

        $diff = date_diff($smaller, $bigger);

        return $diff;
    }
}

if (!function_exists('app_date_default'))
{
  function app_date_default($date, $format = 'd-m-Y')
  {
    $result   = "";
    $date  = app_date_value($date, $format);
    if ( $format != "" AND !is_null($format) )
    {
      if (@$date == "") $date   = date($format);      
      $result   = $date;
    }        
    return $result;
  }
}


if (!function_exists('app_date_value')) 
{
    function app_date_value($date, $format = 'd-m-Y', $from = '')
    {
    	$result 	= null;
    	if ($date != "") {
			   $result = ($from == '')  ? nice_date($date, $format) : app_date_format($date, $format, $from);
    	}

    	return $result;

    }
}

if (!function_exists('app_date_format')) 
{
    function app_date_format($date, $format = '', $from = '')
    {
        $newdate = $date;

        if ( $from == "" ) 
        {
            $newdate   = date_format(date_create($date), $format);
        }else {
        	if ( app_valid_date($date, $from) ) {
        		$myDateTime = DateTime::createFromFormat($from, $date);
            	$newdate    = @$myDateTime->format('Y-m-d');
        	}            
        }        

        return $newdate;
    }
}

if ( !function_exists('app_valid_date') ) {
	function app_valid_date($date, $format = 'Y-m-d')
	{
	    $d = DateTime::createFromFormat($format, $date);
	    return $d && $d->format($format) == $date;
	}
}

if ( ! function_exists('nice_date'))
{
  /**
   * Turns many "reasonably-date-like" strings into something
   * that is actually useful. This only works for dates after unix epoch.
   *
   * @param string  The terribly formatted date-like string
   * @param string  Date format to return (same as php date function)
   * @return  string
   */
  function nice_date($bad_date = '', $format = FALSE)
  {
    if (empty($bad_date))
    {
      return 'Unknown';
    }
    elseif (empty($format))
    {
      $format = 'U';
    }

    // Date like: YYYYMM
    if (preg_match('/^\d{6}$/i', $bad_date))
    {
      if (in_array(substr($bad_date, 0, 2), array('19', '20')))
      {
        $year  = substr($bad_date, 0, 4);
        $month = substr($bad_date, 4, 2);
      }
      else
      {
        $month  = substr($bad_date, 0, 2);
        $year   = substr($bad_date, 2, 4);
      }

      return date($format, strtotime($year.'-'.$month.'-01'));
    }

    // Date Like: YYYYMMDD
    if (preg_match('/^(\d{2})\d{2}(\d{4})$/i', $bad_date, $matches))
    {
      return date($format, strtotime($matches[1].'/01/'.$matches[2]));
    }

    // Date Like: MM-DD-YYYY __or__ M-D-YYYY (or anything in between)
    if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/i', $bad_date, $matches))
    {
      return date($format, strtotime($matches[3].'-'.$matches[1].'-'.$matches[2]));
    }

    // Any other kind of string, when converted into UNIX time,
    // produces "0 seconds after epoc..." is probably bad...
    // return "Invalid Date".
    if (date('U', strtotime($bad_date)) === '0')
    {
      return 'Invalid Date';
    }

    // It's probably a valid-ish date format already
    return date($format, strtotime($bad_date));
  }
}


if (!function_exists('app_date_indo')) 
{
    function app_date_indo($date, $short = false)
    {
        $get_tahun  = substr($date, 0,4);
        $get_bulan    = substr($date, 5,2);
        $get_tanggal    = substr($date, 8,2);

        if ($short) {
          $bulan = [
            "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep",  "Okt", "Nov", "Des"
          ];
        } else {
          $bulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September",  "Oktober", "November", "Desember"
          ];
        }

        $newdate = $get_tanggal . " " . $bulan[$get_bulan-1] . " " . $get_tahun;

        return $newdate;
    }
}

if ( !function_exists('app_get_font') )
{
  function app_get_font()
  {

    $where['custom'] = "font_status = '1' and font_isdelete = '0'";
    $getdata = _CI()->m_crud->getdata('row','set_font', '*', $where);

    return $getdata;

  }
}