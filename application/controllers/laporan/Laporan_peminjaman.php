<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Laporan_peminjaman extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('laporan/lap_pinjam');
		}

		function index() {
			$user_data = $this->session->userdata( 'logged_in' );
		   	if( intval( $user_data[ 'level' ] ) == 1 || intval( $user_data[ 'level' ] ) == 2 ) {
		    	$session_data = $this->session->userdata( 'logged_in' );
		    	$data[ 'username' ] = $session_data[ 'username' ];
		    	$this->load->view( 'laporan/laporan_peminjaman' , $data );
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}		
		}

		function ngeprint(){
			$tgl_1 = $this->input->post('tgl_1');
			$tgl_2 = $this->input->post('tgl_2');
			$session_data = $this->session->userdata( 'logged_in' );
		    $data['username' ] = $session_data[ 'username' ];
			$data['peminjaman'] = $this->lap_pinjam->diprint($tgl_1,$tgl_2);
			$this->load->view('laporan/print_pinjam', $data);
		}
	}
	
?>