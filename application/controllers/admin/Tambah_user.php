<?php if ( ! defined( "BASEPATH" )) exit( "No Direct Access Script Allowed !" );
	class Tambah_user extends CI_Controller {
		function __construct() {
			parent:: __construct();
			$this->load->model( 'login' );
			$this->load->library('parser');
			$this->load->library( 'form_validation' );
		}

		function index(){
			$user_data = $this->session->userdata( 'logged_in' );
		   	if( intval( $user_data[ 'level' ] ) == 1 ) {
		    	$session_data = $this->session->userdata( 'logged_in' );
		    	$data[ 'username' ] = $session_data[ 'username' ];
		    	//trim : security
		    	$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_tambah_user');
		    	$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|matches[pass_2]');
		    	$this->form_validation->set_rules('pass_2', 'Ulangi Password', 'required|trim|xss_clean');
		    	$this->form_validation->set_rules('level', 'Level', 'required|trim|xss_clean');

		    	$data['list'] = $this->login->lihat_user();
		    	if($this->form_validation->run() == FALSE) {
		    		$this->load->view('admin/tambah_user', $data);
		    	} else {
		    		$this->load->view('admin/tambah_user', $data);
		    	}
		   	} else if ( intval( $user_data[ 'level' ] ) == 2 ){
		    	$session_data = $this->session->userdata( 'logged_in' );
		    	$data[ 'username' ] = $session_data[ 'username' ];
		    	redirect( 'home', 'refresh' );
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function tambah_user($username) {
			$data = array (
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level')
			);
			$username = $data['username'];
			$user = $this->login->user($username);

			if($user == $username){
				$this->form_validation->set_message('tambah_user', 'Username Sudah Ada Di Dalam Database');
				return FALSE;
			} else {
				$this->login->tambah_user($data);
				$this->session->set_flashdata('msg', 'User Baru Berhasil Di Input');
				redirect('admin/tambah_user');
				return TRUE;			
			} 
		}

		function del( $username ){
			$this->login->hapus_user( $username );
			redirect('admin/tambah_user');
		}
	}
	
?>