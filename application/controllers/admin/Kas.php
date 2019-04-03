<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Kas extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('kass');
			$this->load->model('p');
			$this->load->model('detp');
			$this->load->model('detailpm');
			$this->load->model('pembayaran');
			$this->load->model('dp');
			
			$this->load->library( 'form_validation' );
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['kas'] = $this->kass->lihat();
		    	$data['total_kas'] = $this->kass->total_kas();
		    	if ( $data['total_kas'] == NULL ) {
		    		$data['total_kas'] = "0";
		    	}
		    	$this->load->view('admin/kas', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('kas', 'refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function lihat($idpinjam) {
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			$data['motor'] = $this->detailpm->liatdata($idpinjam);
			$data['perlengkapan'] = $this->detp->liatdata($idpinjam);
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			$data['jmlbarang'] = $this->dp->getdata();
			$data['anggota'] = $this->p->lihatanggota($idpinjam);
			$data['denda'] = $this->kass->denda($idpinjam);
			$this->load->view('admin/lihatkas',$data);
		}

		function keluar(){
			$session_data = $this->session->userdata('logged_in');
		    $username = $session_data['username'];

			$data['total_kas'] = $this->kass->total_kas();
			$kas_keluar = $this->input->post("jumlah_keluar");
			$data_kas = [
				'jenis_kas' => "keluar",
				'kas_keluar' => $kas_keluar,
				'kas_sebelum' => $this->kass->kas_sebelum(),
				'total' => $this->kass->kas_sebelum() - $kas_keluar,
				'tanggal' => date("Y-m-d H:i"),
				'admin' => $username,
				'keterangan' => $this->input->post("keterangan")
			];
			if ( $kas_keluar > $data['total_kas'] ){
				print "<script type=\"text/javascript\">alert('Kas Tidak Mencukupi ! ');</script>";
				redirect("admin/kas","refresh");
			} else {
				$this->kass->kas_masuk($data_kas);
			}			
			redirect("admin/kas","refresh");
		}

		function masuk(){
			$session_data = $this->session->userdata('logged_in');
		    $username = $session_data['username'];
		    
			$data['total_kas'] = $this->kass->total_kas();
			$kas_masuk = $this->input->post("jumlah_masuk");
			$data_kas = [
				'jenis_kas' => "masuk",
				'kas_masuk' => $kas_masuk,
				'kas_sebelum' => $this->kass->kas_sebelum(),
				'total' => $this->kass->kas_sebelum() + $kas_masuk,
				'tanggal' => date("Y-m-d H:i"),
				'admin' => $username,
				'keterangan' => $this->input->post("ket")
			];
			$this->kass->kas_masuk($data_kas);
						
			redirect("admin/kas","refresh");
		}
	}
	
?>