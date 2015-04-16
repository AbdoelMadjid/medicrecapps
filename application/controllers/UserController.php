<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends CI_Controller {
	
	
	function index(){
		
		$this->load->view('test2');
	}
	
	
	public function verifyUser()	{
		$userName =  $_POST['userName'];
		$userName =   $this->input->post('userName');
		$userPassword =   $this->input->post('userPassword');
		
		
		
		$status = array("STATUS"=>"false");
		
		if($userName=='admin' && $userPassword=='admin'){
			$status = array("STATUS"=>"true",
							"Complex"=>"kompleks");	
		}
		
		$status = array("STATUS"=>"true",
							"Complex"=>"kompleks");	
		echo json_encode ($status) ;	
	}
}