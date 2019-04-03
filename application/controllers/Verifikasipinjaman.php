<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	class Verifikasipinjaman extends CI_Controller {
		public function __construct() {#
			parent:: __construct();
			$this->load->model('dm');
			$this->load->model('dp');
			$this->load->model('p');
			$this->load->model('detp');
			$this->load->model('detailpm');
			$this->load->model('mpengembalian');
			$this->load->model('hs');
			$this->load->model('hb');
			$this->load->model('h');
			$this->load->model('pembayaran');
			$this->load->library( 'form_validation' );
		}

		function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
			$id = $this->p->maxid();
			$data['peminjaman'] = $this->p->liatdata($id);
			$data['motor'] = $this->detailpm->liatdata($id);
			$data['perlengkapan'] = $this->detp->liatdata($id);
			$data['harga'] = $this->h->liatdata();
			$data['anggota'] = $this->p->lihatanggota($id);
		   	if(intval($user_data['level']) == 1 ) {	
		    	redirect('admin/verifikasipinjaman', 'refresh');
		   	} else if (intval($user_data['level']) == 2){
		    	$this->load->view('verifikasipinjaman', $data);
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		public function proses(){
			if($this->input->post('tunai',TRUE) ){
				$data = array(
					'Id_Peminjaman' => $this->input->post('id_peminjamant'),
					'tgl_pembayaran_satu' => $this->input->post('tgl'),
					'total' => $this->input->post('hargatotaltunai'),
					'harga_motor' => $this->input->post('hargamotor'),
					'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
					'harga_guide' => $this->input->post('hargaguide'),
					'harga_marketing' => $this->input->post('hargamarketing'),
					'keterangan' => "Tunai"
				);
				$this->pembayaran->savedata($data);
				$total = $this->input->post('idharga');
				$this->h->delete($total);
				redirect('admin/peminjaman_view');
			} else if($this->input->post('debit',TRUE) ){
				$this->form_validation->set_rules('nomertransaksi', 'Id Transaksi', 'required|trim|xss_clean');
				if($this->form_validation->run() == FALSE) {
					$session_data = $this->session->userdata('logged_in');
			    	$data['username'] = $session_data['username'];
					$id = $this->p->maxid();
					$data['peminjaman'] = $this->p->liatdata($id);
					$data['motor'] = $this->detailpm->liatdata($id);
					$data['perlengkapan'] = $this->detp->liatdata($id);
					$data['harga'] = $this->h->liatdata();
			    	$this->load->view('admin/verifikasipinjaman', $data);
				} else {
					$data = array(
						'Id_Peminjaman' => $this->input->post('id_peminjamandebit'),
						'tgl_pembayaran_satu' => $this->input->post('tgl'),
						'Nomer_Rekening' => $this->input->post('nomertransaksi'),
						'total' => $this->input->post('hargatotaldebit'),
						'harga_motor' => $this->input->post('hargamotor'),
						'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
						'harga_guide' => $this->input->post('hargaguide'),
						'harga_marketing' => $this->input->post('hargamarketing'),
						'keterangan' => "Debit"
					);
					$this->pembayaran->savedata($data);
					$total = $this->input->post('idharga');
					$this->h->delete($total);
					redirect('admin/peminjaman_view');
				}
			} else if($this->input->post('dp',TRUE)){
				$this->form_validation->set_rules('nominal_satudp', 'Nominal Dp Pertama', 'required|trim|xss_clean');
				if($this->form_validation->run() == FALSE) {
					$session_data = $this->session->userdata('logged_in');
			    	$data['username'] = $session_data['username'];
					$id = $this->p->maxid();
					$data['peminjaman'] = $this->p->liatdata($id);
					$data['motor'] = $this->detailpm->liatdata($id);
					$data['perlengkapan'] = $this->detp->liatdata($id);
					$data['harga'] = $this->h->liatdata();
			    	$this->load->view('admin/verifikasipinjaman', $data);
				} else {
					$total = $this->input->post('hargatotaldp');
					$bayar = $this->input->post('nominal_satudp');
					$sisa  = $total - $bayar;
					$data = array(
						'Id_Peminjaman' => $this->input->post('id_peminjamandp'),
						'tgl_pembayaran_satu' => $this->input->post('tgl'),
						'nominal_pertama' => $this->input->post('nominal_satudp'),
						'harga_motor' => $this->input->post('hargamotor'),
						'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
						'harga_guide' => $this->input->post('hargaguide'),
						'harga_marketing' => $this->input->post('hargamarketing'),
						'sisa' => $sisa,
						'keterangan' => "Dp"
					);
					$this->pembayaran->savedata($data);
					$total = $this->input->post('idharga');
					$this->h->delete($total);
					$data = array(
						'status' => "masihdp"
					);
					$id = $this->input->post('id_peminjamandp');
					$this->p->udpin($data,$id);
					redirect('admin/peminjaman_view');
				}
			}  else if($this->input->post('transfer',TRUE) ){
				$this->form_validation->set_rules('nomer_rekening', 'Id Transaksi', 'required|trim|xss_clean');
				if($this->form_validation->run() == FALSE) {
					$session_data = $this->session->userdata('logged_in');
			    	$data['username'] = $session_data['username'];
					$id = $this->p->maxid();
					$data['peminjaman'] = $this->p->liatdata($id);
					$data['motor'] = $this->detailpm->liatdata($id);
					$data['perlengkapan'] = $this->detp->liatdata($id);
					$data['harga'] = $this->h->liatdata();
			    	$this->load->view('admin/verifikasipinjaman', $data);
				} else {
					$data = array(
						'Id_Peminjaman' => $this->input->post('id_peminjamantransfer'),
						'tgl_pembayaran_satu' => $this->input->post('tgl'),
						'Nomer_Rekening' => $this->input->post('nomer_rekening'),
						'total' => $this->input->post('hargatotaltransfer'),
						'harga_motor' => $this->input->post('hargamotor'),
						'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
						'harga_guide' => $this->input->post('hargaguide'),
						'harga_marketing' => $this->input->post('hargamarketing'),
						'keterangan' => "Transfer"
					);
					$this->pembayaran->savedata($data);
					$total = $this->input->post('idharga');
					$this->h->delete($total);
					redirect('admin/peminjaman_view');
				}
			} else {
				redirect('admin/verifikasipinjaman');
			}
		}
		
		public function lihat($idpinjam) {
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			$data['motor'] = $this->detailpm->liatdata($idpinjam);
			$data['perlengkapan'] = $this->detp->liatdata($idpinjam);
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			$data['anggota'] = $this->p->lihatanggota($idpinjam);
			$this->load->view('admin/lihatdp',$data);
		}
		
	}
	
?>