<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Kelola_motor extends CI_Controller {
		function __construct() {
			parent:: __construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('dm');
			$this->load->model('dp');
			$this->load->model('manggota');
		}

		public function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['dmotor'] = $this->dm->getdm();
		    	$data['nama'] = $this->manggota->kel_motor();
		    	$this->load->view('admin/kelola_motor', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('kelola_motor','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		//update
		public function oum($no_motor){
			$data['dmotor'] = $this->dm->gmu($no_motor);
			$data['nama'] = $this->manggota->kel_motor();
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
				'id_anggota' => $this->input->post('nama_pemilik'),
				'Type' => $this->input->post('types')
			);
			$condition = $this->input->post('no_regs');
			$this->dm->uudm($data,$condition);
			redirect('admin/kelola_motor' , 'refresh');
		}

		public function sdm(){
			$data = array(
				'No_Registrasi' => $this->input->post('no_regs1'),
				'id_anggota' => $this->input->post('nama_pemilik1'),
				'Type' => $this->input->post('types1'),
				'status' => "Ada"
			);
			$this->dm->adm($data);
			redirect('admin/kelola_motor');
		}

		public function lihat_maintenance( $No_Registrasi ){
			$data['listmotor'] = $this->dm->modal_maintenance( $No_Registrasi );
			$this->load->view( "admin/modal_maintanence", $data );
		}

		public function laporan_maintenance(){
			$this->form_validation->set_rules("nama_anggota", "Nama Anggota", "required|trim|xss_clean");
			$this->form_validation->set_rules("tgl_1", "Dari", "required|trim|xss_clean");
			$this->form_validation->set_rules("tgl_2", "Hingga", "reuqired|trim|xss_clean");

			if( $this->form_validation->run("admin/Kelola_motor/laporan_maintenance") == FALSE) {
				redirect("admin/kelola_motor", "refresh");
			} else {
				$id_anggota = $this->input->post("nama_anggota");
				$tgl_1 = $this->input->post("tgl_1");
				$tgl_2 = $this->input->post("tgl_2");

				$data['motor'] = $this->dm->laporan_maintenance( $id_anggota, $tgl_1, $tgl_2 );
				$data['tgl'] = [ $tgl_1, $tgl_2	];

				$grand_sub = 0;
				foreach( $data['motor']->result() as $mtr ){	
					$grand_sub += $mtr->grand_sub;
					$no_motor = $mtr->no_motor;
				}
				$data['no_motor'] = $no_motor;
				$data['grand_sub'] = $grand_sub;
				$this->load->view( 'laporan/print_maintanence', $data );	
			}			
		}
	}
	
?>