<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	session_start();
	class Kelola_barang extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('dm');
			$this->load->model('dp');
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['listperlengkapan'] = $this->dp->getdp();

		   	if(intval($user_data['level']) == 1 ) {
	    		redirect('admin/kelola_barang', 'refresh');
		   	} else if (intval($user_data['level']) == 2){
		    	$this->load->view('kelola_barang', $data);
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
			if($this->dp->is_exists($data['jenis_perlengkapan'], $data['kondisi'])=="true"){
				echo '<script>alert("data tersebut sudah ada, silahkan diubah dari menu Lihat Data Barang");</script>';
				redirect('admin/kelola_barang', 'refresh');
			}
			$this->dp->adp($data);
			redirect('admin/kelola_barang');
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
	}
	
?>