<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');

	class Laporan_transaksi extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('laporan/lap_transaksi');
		}

		function index() {
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
			$id = $this->lap_transaksi->maxid();
			$data['peminjaman'] = $this->lap_transaksi->liatdata($id);
			$data['motor'] = $this->lap_transaksi->liatmotor($id);
			$data['perlengkapan'] = $this->lap_transaksi->liat_p($id);
			$data['pembayaran'] = $this->lap_transaksi->lihat($id);
			$data['anggota'] = $this->lap_transaksi->lihatanggota($id);
			$data['boot_mx'] = $this->lap_transaksi->lihatbootmx($id);

			foreach( $data['pembayaran']->result() as $bayar ) :
				if( $bayar->Jumlah_Denda != "0"){
					$data['total'] = $bayar->total - $bayar->Jumlah_Denda;
				} else {
					$data['total'] = $bayar->total;
				}
			endforeach;
	    	$this->load->view('laporan/print_transaksi', $data);
		}

		function lap_pinjam() {
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$id = $this->lap_transaksi->maxid_pinjam();
			$data['peminjaman'] = $this->lap_transaksi->liatdata_pinjam($id);
			$data['motor'] = $this->lap_transaksi->liatmotor_pinjam($id);
			$data['perlengkapan'] = $this->lap_transaksi->liat_p_pinjam($id);
			$data['pembayaran'] = $this->lap_transaksi->lihat_pinjam($id);
			$data['anggota'] = $this->lap_transaksi->lihatanggota_pinjam($id);
			$data['boot_mx'] = $this->lap_transaksi->lihatbootmx_pinjam($id);

			foreach( $data['pembayaran']->result() as $bayar ) :
				$data['total'] = $bayar->total;
			endforeach;

	    	$this->load->view('laporan/print_transaksi_pinjam', $data);
		}

		function lap_pinjaman( $id ) {
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
			$data['peminjaman'] = $this->lap_transaksi->liatdata_pinjam($id);
			$data['motor'] = $this->lap_transaksi->liatmotor_pinjam($id);
			$data['perlengkapan'] = $this->lap_transaksi->liat_p_pinjam($id);
			$data['pembayaran'] = $this->lap_transaksi->lihat_pinjam($id);
			$data['anggota'] = $this->lap_transaksi->lihatanggota_pinjam($id);
			$data['boot_mx'] = $this->lap_transaksi->lihatbootmx_pinjam($id);

			foreach( $data['pembayaran']->result() as $bayar ) :
				$data['total'] = $bayar->total;
			endforeach;

	    	$this->load->view('laporan/print_transaksi_pinjam', $data);
		}

		function lap_kembali( $id ) {
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
			$data['peminjaman'] = $this->lap_transaksi->liatdata($id);
			$data['motor'] = $this->lap_transaksi->liatmotor($id);
			$data['perlengkapan'] = $this->lap_transaksi->liat_p($id);
			$data['pembayaran'] = $this->lap_transaksi->lihat($id);
			$data['anggota'] = $this->lap_transaksi->lihatanggota($id);
			$data['boot_mx'] = $this->lap_transaksi->lihatbootmx($id);

			foreach( $data['pembayaran']->result() as $bayar ) :
				if( $bayar->Jumlah_Denda != "0"){
					$data['total'] = $bayar->total - $bayar->Jumlah_Denda;
				} else {
					$data['total'] = $bayar->total;
				}
			endforeach;
	    	$this->load->view('laporan/print_transaksi', $data);
		}
	}
	
?>