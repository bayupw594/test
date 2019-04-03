<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	class Kelola_harga_sewa extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('hs');
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['listhargasewa'] = $this->hs->showdata();
		    	$this->load->view('admin/kelola_harga_sewa', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('kelola_harga_sewa','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		//insert data 
		public function savedata(){
			$data = array(
				'tipe_motor' => $this->input->post('tipe_motor'),
				'harga_sewa' => $this->input->post('harga_sewa'),
				'hari' => $this->input->post('hari'),
				'jam' => $this->input->post('jam')
			);
			/*if($this->hs->is_exists($data['tipe_motor'], $data['harga_sewa'])=="true"){
				echo '<script>alert("data tersebut sudah ada, silahkan diubah dari menu Lihat Data Harga Sewa");</script>';
				redirect('admin/kelola_harga_sewa', 'refresh');
			}*/
			$this->hs->savedata($data);
			redirect('admin/kelola_harga_sewa');
		}

		//delete data barang
		public function hapus($kode_harga){
			$this->hs->delete($kode_harga);
			redirect('admin/kelola_harga_sewa');
		}

		//update view
		public function update($kode_harga){
			$data['listharga'] = $this->hs->liatdata($kode_harga);
			$this->load->view('admin/updatehargasewa',$data);
		}

		//update db
		public function updatedata(){
			$data = array(
				'harga_sewa' => $this->input->post('harga_sewa')
			);
			$condition = $this->input->post('kode_harga');
			$this->hs->update($data,$condition);
			redirect('admin/kelola_harga_sewa');
		}
	}
	
?>