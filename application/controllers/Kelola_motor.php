<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	session_start();
	class Kelola_motor extends CI_Controller {
		function __construct() {
			parent:: __construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('dm');
			$this->load->model('dp');
		}

		public function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['dmotor'] = $this->dm->getdm();
		   	if(intval($user_data['level']) == 1 ) {
		    	redirect('admin/kelola_motor', 'refresh');
		   	} else if (intval($user_data['level']) == 2){
		    	$this->load->view('kelola_motor', $data);
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		//update
		public function oum($no_motor){
			$data['dmotor'] = $this->dm->gmu($no_motor);
		    $this->load->view('admin/updatemotor',$data);
		}

		//delete
		public function odm($no_motor){
			$this->dm->ddm($no_motor);
			redirect('admin/kelola_motor');
		}

		public function um(){
			$data = array(
				'No_Registrasi' => $this->input->post('no_regs'),
				'Nama_Pemilik' => $this->input->post('nama_pemilik'),
				'Type' => $this->input->post('types')
			);
			$condition = $this->input->post('no_regs');
			$this->dm->udm($data,$condition);
			redirect('admin/kelola_motor' , 'refresh');
		}

		public function sdm(){
			$data = [
				'No_Registrasi' => $this->input->post('no_regs1'),
				'Nama_Anggota' => $this->input->post('nama_pemilik1'),
				'Type' => $this->input->post('types1'),
				'milik' => $this->input->post('milik1'),
				'status' => "Ada"
			];

			$this->dm->adm($data);
			redirect('admin/kelola_motor');
		}
	}
	
?>