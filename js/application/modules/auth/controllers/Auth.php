<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	private $ga_tracking_id = null;
	private $fullurl 	= '';
	private $initurl 	= 'auth';
	private $prefix 	= 'auth';
	private $tbl 		= 'master_user';
	private $tblprefix 	= 'user_';


	public function __construct()
	{
		parent::__construct();
		$this->fullurl 	= base_url() . $this->initurl;
	}


	public function login()
	{
		$data['data'] = "";
		$data['get_next'] = urlencode(@$_REQUEST['next']);
		$data['initurl'] = $this->initurl;
		$data['fullurl'] = $this->fullurl;
		$this->load->view('auth', $data);
		
	}

	public function action_login()
	{
		if ( !$this->input->is_ajax_request() ) trace('die');

		$data 	= null;
		$_error = [];
		$input 	= $this->input->post();

		$this->form_validation->set_rules('uid', 'uid', 'required');        
        $this->form_validation->set_rules('password', 'password', 'required');                

        if ( $this->form_validation->run($this) )
        {
	        $where['where'] = [
				$this->tblprefix.'uid' => $input['uid'],
				$this->tblprefix.'password' =>  md5($input['password']),
				$this->tblprefix.'isdelete' =>  "0"
			];
			
			$select = "
				user_id,
				user_uid,
				user_nama,
				user_jk,
				user_isdelete,
				user_createdate,
				user_lastupdate
			";

			$getdata = $this->m_crud->getdata('array', $this->tbl, '*', $where);

        	if (@$getdata[0]['user_level'] == '4') {
        		$_error[] 	= '<li>Anda tidak punya akses untuk masuk.</li>';
        	}
			
        	if ( count($getdata) == 0) {
        		$_error[] 	= '<li>User ID dan password tidak sesuai</li>';
        	}

        	if ( count($_error) > 0 ) {
        		$response['status']     = 3;
        		$response['message']    = implode("", $_error);
        	} else {

        		/* change data array to object */
        		foreach ($getdata as $row) {
        			$getdata = $row;
        		}
        		$getdata = (object) $getdata;
        		/* end change data array to object */

        		$logsession 	= [
        			'logintime' 	=> date('Y/m/d H:i:s'),
        			'ipaddress' 	=> $this->input->ip_address(),
        			'user' 			=> $getdata,        			
        			'islogin' 		=> md5('1'),
        			'user_agent' 	=> $this->input->user_agent(),
        			'referrer' 		=> $this->agent->referrer()
        		];

        		$this->session->set_userdata($logsession);

        		$response['status'] 	= 1;
        		$response['redirect'] 	= @$_REQUEST['next'] != "" ? urlencode(@$_REQUEST['next']) : base_url();
        		$response['message'] 	= 'Selamat datang ' . $getdata->user_nama;        		
        	}

        } else {
        	$response['status']     = 3;
            $str                	= ['<p>', '</p>'];
            $str_replace        	= ['<li>', '</li>'];
            $response['message']    = str_replace($str, $str_replace, validation_errors());
        }

        $this->output->set_header("Pragma: no-cache");
        $this->output->set_header("Cache-Control: no-store, no-cache");
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth/login').'?next='. urlencode($this->agent->referrer()));
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */