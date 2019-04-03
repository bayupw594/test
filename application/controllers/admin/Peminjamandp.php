<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	class Peminjamandp extends CI_Controller {
		function __construct(){
			parent:: __construct();
			$this->load->model("p");
			$this->load->model("detp");
			$this->load->model("detailpm");
			$this->load->model("dm");
			$this->load->model("dp");	
			$this->load->model("mpengembalian");
			$this->load->model("pembayaran");
			$this->load->model("lihatanggota");
			$this->load->library( 'form_validation' );
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['cp'] = $this->p->ldp();
		    	$this->load->view('admin/peminjamandp', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('peminjamandp','refresh');
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
			$data['guide'] = $this->pembayaran->lihatguide( $idpinjam );
			$data['mx'] = $this->detp->dx($idpinjam);
			$data['anggota'] = $this->p->lihatanggota($idpinjam);
			$this->load->view('admin/lihatdp',$data);
		}

		function batal() {
			
		}
		public function lunas(){
			if($this->input->post('lunas',TRUE)){
				$data = array(
					'total' => $this->input->post('hargatotal'),
					'tgl_pembayaran_dua' => $this->input->post('tgl'),
					'nominal_dua' => $this->input->post('harga_dua'),
					'keterangan' => "Lunas"
				);
				$condition = $this->input->post('id_pinjam');
				$this->pembayaran->update($data,$condition);
				$data = array(
					'status' => "pinjam"
				);
				$this->p->udpin($data,$condition);
				redirect('admin/peminjaman_view');
			} else {
				redirect('admin/peminajamn_view');
			}
		}
	}
	
?>