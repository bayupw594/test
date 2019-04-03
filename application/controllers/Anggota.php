<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Anggota extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('manggota');
			$this->load->library('form_validation');
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['anggota'] = $this->manggota->lihat_anggota();

			if( intval( $user_data['level'] ) == 1 ) {
		    	redirect( 'admin/anggota', 'refresh' );
		   	} else if ( intval($user_data['level']) == 2 ){
		    	$this->load->view('anggota', $data );
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function ins_anggota(){
			$this->form_validation->set_rules('nama_anggota', "Nama Anggota", "required|trim|xss_clean");
			$this->form_validation->set_rules('nomor_hp', "Nomor HP", "required|trim|xss_clean");

			if ( $this->form_validation->run('admin/anggota/ins_anggota') == FALSE ){
				redirect('admin/anggota');
			} else {
				$data = [
					'nama_anggota' => $this->input->post('nama_anggota'),
					'nomor_hp' => $this->input->post('nomor_hp')
				];

				$this->manggota->ins_anggota($data);
				$this->session->set_flashdata('msg', 'Anggota Baru Berhasil Di Input');
				redirect('admin/anggota');
				return TRUE;
			}
		}
		function l_update_anggota($id) {
			$data['listanggota'] = $this->manggota->l_update_anggota($id);
			$this->load->view('admin/updateanggota', $data);
		}

		function update_anggota($id_anggota){
			$data = [
				'id_anggota' => $this->input->post('id_anggota'),
				'nama_anggota' => $this->input->post('nama_anggota'),
				'nomor_hp' => $this->input->post('nomor_hp')
			];

			$condition = $this->input->post('id_anggota');
			$this->manggota->update($data, $condition);
			echo '<script>alert("Data Berhasil Di Update");</script>';
			redirect('admin/anggota');
			return TRUE;					
		}

		function del($id_anggota) {
			$this->manggota->delete($id_anggota);
			redirect('admin/anggota');
		}
	}
	
?>