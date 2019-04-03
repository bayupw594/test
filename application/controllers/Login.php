<?php if ( ! defined( 'BASEPATH' ) ) exit( "No Direct Script Allowed" );

	class Login extends CI_Controller {
		function index() {
			if ( $this->session->userdata('logged_in')){
				redirect( 'home', 'refresh');
			}
			$this->load->helper( array( 'form') );
			$this->load->view( 'login_view' );
		}
	}