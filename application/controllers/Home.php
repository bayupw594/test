<?php if ( ! defined('BASEPATH')) exit( 'No direct script access allowed' );
	class Home extends CI_Controller {
		function __construct() {
		   	parent::__construct();

		}

		function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

		   	if(intval($user_data['level']) == 1 ) {		    	
		    	$this->load->view('admin/home_admin',$data);
		   	} else if (intval($user_data['level']) == 2){
		    	$this->load->view('home', $data);
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function logout() {
		   $this->session->unset_userdata('logged_in');
		   $this->session->sess_destroy();
		   redirect('login', 'refresh');
		}

		function ganti_pass() {
			$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
			$this->load->view('ganti_pass',$data);
		}
	}

?>