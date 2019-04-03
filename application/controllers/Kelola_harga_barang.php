<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	session_start();
	class Kelola_harga_barang extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('hb');
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['listhargasewa'] = $this->hb->showdata();

		   	if(intval($user_data['level']) == 1 ) {	
		    	redirect('admin/kelola_harga_barang', 'refresh');
		   	} else if (intval($user_data['level']) == 2){
		    	$this->load->view('kelola_harga_barang', $data);
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		//insert data 
		public function savedata(){
			$data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'harga' => $this->input->post('harga')
			);
			/*if($this->hs->is_exists($data['tipe_motor'], $data['harga_sewa'])=="true"){
				echo '<script>alert("data tersebut sudah ada, silahkan diubah dari menu Lihat Data Harga Sewa");</script>';
				redirect('admin/kelola_harga_sewa', 'refresh');
			}*/
			$this->hb->savedata($data);
			redirect('admin/kelola_harga_barang');
		}

		//delete data barang
		public function hapus($kode_harga){
			$this->hb->delete($kode_harga);
			redirect('admin/kelola_harga_barang');
		}

		//update view
		public function update($kode_harga){
			$data['listharga'] = $this->hb->liatdata($kode_harga);
			$this->load->view('admin/updatehargabarang',$data);
		}

		//update db
		public function updatedata(){
			$data = array(
				'harga' => $this->input->post('harga')
			);
			$condition = $this->input->post('id_harga');
			$this->hb->update($data,$condition);
			redirect('admin/kelola_harga_barang');
		}
	}
	
?>