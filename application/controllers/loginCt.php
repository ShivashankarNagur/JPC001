

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//ob_start();
//session_start();
class loginCt extends CI_Controller
{
public function __construct()
    {
    	parent::__construct();
    	$this->load->model('loginModel');
    	//$this->load->library("session");
    }

	
	function loginForAdmin()
	{
		$data1['username'] = $this->input->post('srUserName');
		$data1['password']  = $this->input->post('srPswd');
		$data = 'true';
		//$data['msg'] = 'Please login with valid credentials.';
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	



}
