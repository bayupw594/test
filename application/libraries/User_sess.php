<?php 
	class User_sess {
	    function asu() { 
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$this->load->view('admin/home_admin', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$this->load->view('home', $data);
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}
	}
?>