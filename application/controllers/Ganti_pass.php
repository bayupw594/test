<?php if ( ! defined( "BASEPATH" )) exit( "No Direct Access Script Allowed !" );
	class Ganti_pass extends CI_Controller {
		function __construct() {
			parent:: __construct();
			$this->load->model( 'login' );
			$this->load->library('parser');
			$this->load->library('form_validation');
		}

		function index(){
			//session handler
			$user_data = $this->session->userdata( 'logged_in' );
		   	if( intval( $user_data[ 'level' ] ) == 1 || intval( $user_data[ 'level' ] ) == 2 ) {
		    	$session_data = $this->session->userdata( 'logged_in' );
		    	$data[ 'username' ] = $session_data[ 'username' ];

				$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|is_unique[login.username]');
				$this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim|xss_clean|callback_ganti_pass');
				$this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|xss_clean|matches[ulangi]');
				$this->form_validation->set_rules('ulangi', 'Ulangi Password', 'required|trim|xss_clean');

				if($this->form_validation->run() == FALSE){
					$this->load->view('ganti_pass', $data);
				} else {
					$this->load->view('ganti_pass', $data);
				}

		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function ganti_pass($pass_lama) {
			$data = array (
				'username' => $this->input->post('username'),
				'pass_lama' => $this->input->post('pass_lama'),
				'pass_baru' => $this->input->post('pass_baru'),
				'ulangi' => $this->input->post('ulangi')
			);
			$username = $data['username'];
			$result = $this->login->log_in($username, $pass_lama);

			if( !$result ) {
				$this->form_validation->set_message('ganti_pass','Password Lama Tidak Sama Dengan Yang Ada Di Database');
				return FALSE;
			} else {
				$update = array('username' => $data['username'] , 'password' => md5($data['pass_baru']));
				$condition['username'] = $this->input->post('username');
				$this->login->ganti_pass($update,$condition);
				$this->session->set_flashdata('msg', 'Password Berhasil Di Ganti');
				redirect('ganti_pass');
				return TRUE;
			}
		}
	}
	
?>