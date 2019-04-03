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
		    	redirect('admin/kas', 'refresh');
		   	} else if (intval($user_data['level']) == 2){
		   		$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['kas'] = $this->kass->lihat();
		    	$data['total_kas'] = $this->kass->total_kas();
		    	if ( $data['total_kas'] == NULL ) {
		    		$data['total_kas'] = "0";
		    	}
		    	$this->load->view('kas', $data);
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
	}
	
?>