<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');

	class Laporan_pengembalian extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('laporan/lap_kembali');
			$this->load->model("p");
			$this->load->model("detp");
			$this->load->model("detailpm");
			$this->load->model("pembayaran");
			$this->load->model("dp");
			$this->load->model("prosespengembalian");
		}

		function index() {
			$user_data = $this->session->userdata( 'logged_in' );
		   	if( intval( $user_data[ 'level' ] ) == 1 || intval( $user_data[ 'level' ] ) == 2 ) {
		    	$session_data = $this->session->userdata( 'logged_in' );
		    	$data[ 'username' ] = $session_data[ 'username' ];
		    	$this->load->view( 'laporan/laporan_pengembalian' , $data );
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function ngeprint() {
			$tgl_1 = $this->input->post('tgl_1');
			$tgl_2 = $this->input->post('tgl_2');
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
			$data['peminjaman'] = $this->lap_kembali->diprint($tgl_1,$tgl_2);

			$jumlah_motor = 0;

			$this->load->view('laporan/print_kembali', $data);
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
	}
	
?>