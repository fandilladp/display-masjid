<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

myAuth();

function myAuth()
{
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->load->library('user_agent');

    $status_link    = @$CI->input->post('status_link');
    $controller     = $CI->uri->segment(1);
    $function       = $CI->uri->segment(2);

    $bypass         = [];

    if ( in_array($controller, $bypass) ) return true;

    if ( $CI->session->userdata('islogin') == md5("1"))
    {
        if ( strtolower($controller) == 'auth' AND strtolower($function) == 'login' )
        {
	        if ( $status_link == "ajax" )
	        {
	            echo "<script>window.location.href='" . base_url('dashboard').'?next='. urlencode($CI->agent->referrer()). "';</script>";
	        } else {
	            redirect('dashboard').'?next='. urlencode($CI->agent->referrer());
	        }
        }        
        
    }
    else
    {
        if ( $status_link == "ajax" )
        {
            echo "<script>window.location.href='" . base_url().'?next='. urlencode($CI->agent->referrer()). "';</script>";
        }
        else
        {
            if ( strtolower($controller) != 'auth' )
            {
                if ( $CI->input->is_ajax_request() ) {
                } else {
                    $agen = $CI->agent->referrer();
                    if(!empty($agen)){
                        redirect(base_url('auth/login').'?next='. urlencode($CI->agent->referrer()));
                    }else{
                        redirect(base_url('auth/login').'?next='. base_url() . urlencode(uri_string()));
                    }
                }
            }
        }
    }

}

function get_current_user_id()
{
    $session    = mysession('user');
    return @$session->user_id;
}


function get_current_user_level()
{
    $session    = mysession('user');
    return @$session->user_level;
}

function get_current_user_nama()
{
    $session    = mysession('user');
    return @$session->user_nama;
}

function mysession($name = '')
{
    $CI =& get_instance();
    $CI->load->library('session');

    $session    = [];

    if ($name == "")
    {
        $session    = $CI->session->all_userdata();
    }
    else
    {
        if ( count( (array)@$CI->session->userdata($name)) > 0 )
        {
            $session    = $CI->session->userdata($name);
        }
    }

    return $session;
}

function is_super_admin()
{
    $user   = mysession('user');
    if ( in_array(@$user->user_level, ['1']) )
    {
        return true;
    }

    return false;
}

function is_admin()
{
    $user   = mysession('user');
    if ( in_array(@$user->user_level, ['2']) )
    {
        return true;
    }

    return false;
}

function is_pengguna()
{
    $user   = mysession('user');
    if ( in_array(@$user->user_level, ['3']) )
    {
        return true;
    }

    return false;
}

function deniedpage( $redirect = null )
{
    $CI       = _CI();
    $redirect = is_null($redirect) ? base_url() : base_url($redirect);

    if ( $CI->input->post('status_link') == 'ajax' OR $CI->input->is_ajax_request() ) {
        echo "<script>window.location.href='" . $redirect . "';</script>";
        exit();
    } else {
        $session    = mysession('user');
        redirect($redirect,'refresh');
    }
}