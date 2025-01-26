<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
	protected $_ci;    

	public function __construct()
	{
		$this->_ci = &get_instance();
	}
	
	public function display( $view, $data = null )
	{
		$data['content']          		= $this->_ci->load->view($view, $data, TRUE);
		$data['session'] 		   		= $this->_ci->session->all_userdata();

		$is_ajax 				   		= $this->_ci->input->post('status_link', TRUE);
		$is_ajax 				   		= $is_ajax == 'ajax' or $this->_ci->input->is_ajax_request() ? true : false;

		if ( $is_ajax )
		{
			$data['content']     		= $this->_ci->load->view('adminbsb/content_full', $data);
		}
		else
		{			
			$data['header']           	= $this->_ci->load->view('adminbsb/header', $data, TRUE);
			$data['content']     		= $this->_ci->load->view('adminbsb/content_full', $data, TRUE);
			$data['footer']           	= $this->_ci->load->view('adminbsb/footer', $data, TRUE);
			$data['_base']             	= $this->_ci->load->view('adminbsb/template', $data);
		}				

	}

}