<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	class Pengembalian extends CI_Controller {
		function __construct(){
			parent:: __construct();
			$this->load->model("p");
			$this->load->model("detp");
			$this->load->model("detailpm");
			$this->load->model("dm");
			$this->load->model("dp");	
			$this->load->model("mpengembalian");
			$this->load->model("pembayaran");
			$this->load->model("prosespengembalian");
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['cp'] = $this->p->k();
		    	$this->load->view('admin/pengembalian', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('pengembalian','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}
		public function lihatpin($idpinjam) {
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			$data['motor'] = $this->detailpm->liatdata($idpinjam);
			$data['perlengkapan'] = $this->detp->liatdata($idpinjam);
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			$data['jmlbarang'] = $this->dp->getdata();
			$data['kembali'] = $this->prosespengembalian->liatdata($idpinjam);
			$data['anggota'] = $this->p->lihatanggota($idpinjam);
			$data['guide'] = $this->pembayaran->lihatguide( $idpinjam );
			$data['mx'] = $this->detp->dx($idpinjam);
			$this->load->view('admin/lihatkem',$data);
		}

		public function sort_tanggal(){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

			$tgl_1 = $this->input->post('tgl_1');
			$tgl_2 = $this->input->post('tgl_2');
			
			$data['cp'] = $this->p->sort_tanggal($tgl_1, $tgl_2);
			$this->load->view('admin/pengembalian', $data);
		}
		
	}
	
?>