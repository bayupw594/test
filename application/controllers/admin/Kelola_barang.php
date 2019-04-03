<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');

	class Kelola_barang extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('dm');
			$this->load->model('dp');
			$this->load->model('manggota');
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['listperlengkapan'] = $this->dp->getdp();
		    	$data['listoneal'] = $this->dp->lihat_boot();
		    	$data['anggota'] = $this->manggota->lihat_anggota();
		    	$this->load->view('admin/kelola_barang', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('kelola_barang', 'refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		//insert data barang
		public function sdp(){
			$data = array(
				'id_perlengkapan' => $this->input->post('id_perlengkapan'),
				'jenis_perlengkapan' => $this->input->post('jenis_perlengkapan'),
				'jumlah_perlengkapan' => $this->input->post('jumlah_perlengkapan'),
				'kondisi' => $this->input->post('kondisi')
			);
			if($this->dp->is_exists($data['jenis_perlengkapan'], $data['kondisi']) == "true"){
				echo '<script>alert("data tersebut sudah ada, silahkan diubah dari menu Lihat Data Barang");</script>';
				redirect('admin/kelola_barang', 'refresh');
			} else {
				$this->dp->adp($data);
				redirect('admin/kelola_barang');
			}
		}

		//delete data barang
		public function odp($id_perlengkapan){
			$this->dp->ddp($id_perlengkapan);
			redirect('admin/kelola_barang');
		}

		//update view
		public function oup($no_motor){
			$data['listperlengkapan'] = $this->dp->gpu($no_motor);
			$this->load->view('admin/updatebarang',$data);
		}

		//update db
		public function up(){
			$data = array(
				'id_perlengkapan' => $this->input->post('id_perlengkapan'),
				'jenis_perlengkapan' => $this->input->post('jenis_perlengkapan'),
				'jumlah_perlengkapan' => $this->input->post('jumlah_perlengkapan'),
				'kondisi' => $this->input->post('kondisi')
			);
			$condition = $this->input->post('id_perlengkapan');
			$this->dp->udp($data,$condition);
			redirect('admin/kelola_barang');
		}

		//insert boot mx / oneal
		function ins_oneal(){
			$status = "Ada";
			$data = [
				'nama' => $this->input->post('namaboot'),
				'id_anggota' => $this->input->post('namaanggota'),
				'status' => $status
			];

			$this->dp->ins_oneal($data);
			redirect("admin/kelola_barang");
		}

		//update boot mx / oneal
		function upd_oneal($no_boot){
			$data['listoneal'] = $this->dp->upd_oneal($no_boot);
			$data['anggota'] = $this->manggota->lihat_anggota();
			$this->load->view('admin/updateoneal',$data);
		}

		//update db 
		function updateoneal(){
			$id_boot = $this->input->post('id_boot');
			$data = [
				'id_boot' => $id_boot,
				'nama' => $this->input->post('nama_boot'),
				'id_anggota' => $this->input->post('namaanggota')
			];

			$this->dp->update_oneal($id_boot, $data);
			redirect('admin/kelola_barang');
		}

		//delete boot mx / oneal
		function del_mx( $id_boot ){
			$this->dp->del_mx( $id_boot );
			redirect('admin/kelola_barang');
		}
	}
	
?>