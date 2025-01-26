<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @package Codeigniter\Library\Template
*/
class Template
{
	protected $_ci;    

	public function __construct()
	{
		$this->_ci = &get_instance();
	}



	public function countdown($view, $data = null) {
		$data['_content']          		= $this->_ci->load->view($view, $data, TRUE);
		$data['_countdown_content']     = $this->_ci->load->view('custom/countdown_content', $data, TRUE);
		$data['_countdown_footer']     	= $this->_ci->load->view('custom/countdown_footer', $data, TRUE);
		$this->_ci->load->view('custom/countdown', $data);
	}
	
	public function show( $view, $data = null )
	{

		$data['_content']          = $this->_ci->load->view($view, $data, TRUE);

		$is_ajax 				   = $this->_ci->input->post('status_link', TRUE);
		$is_ajax 				   = $is_ajax == 'ajax' or $this->_ci->input->is_ajax_request() ? true : false;

		if ( $is_ajax )
		{
			$this->_ci->load->view('custom/utama_content', $data);
		}
		else
		{	
			
			$data['_content']			= $this->_ci->load->view($view, $data, TRUE);
			
			$data['_utama_header']     	= $this->_ci->load->view('custom/utama_header', $data, TRUE);
			$data['_utama_content']		= $this->_ci->load->view('custom/utama_content', $data, TRUE);
			// $data['_utama_kajian']     	= $this->_ci->load->view('custom/utama_kajian', $data, TRUE);
			$data['_utama_footer']     	= $this->_ci->load->view('custom/utama_footer', $data, TRUE);
			
			$this->_ci->load->view('custom/utama', $data);
		}

	}

	public function display( $view, $data = null )
	{
		$data['content']          = $this->_ci->load->view($view, $data, TRUE);
		$data['session'] 		   = $this->_ci->session->all_userdata();

		$is_ajax 				   = $this->_ci->input->post('status_link', TRUE);
		$is_ajax 				   = $is_ajax == 'ajax' or $this->_ci->input->is_ajax_request() ? true : false;

		if ( $is_ajax )
		{
			$data['content']     = $this->_ci->load->view('mdb/content_full', $data);
		}
		else
		{			
			$data['header']           	= $this->_ci->load->view('mdb/header', $data, TRUE);
			$data['content']     		= $this->_ci->load->view('mdb/content_full', $data, TRUE);
			$data['footer']           	= $this->_ci->load->view('mdb/footer', $data, TRUE);
			$data['_base']             	= $this->_ci->load->view('mdb/template', $data);
		}				

	}
}