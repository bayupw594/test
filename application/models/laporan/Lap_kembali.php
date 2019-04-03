<?php if( !defined('BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Lap_kembali extends CI_Model {
		function __construct() {
			parent::__construct();
		}

		function diprint($tgl_1, $tgl_2){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('pengembalian', 'peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan');
			$this->db->join('pembayaran', 'pembayaran.Id_Peminjaman = peminjaman.Id_Peminjamanan');
			$this->db->where('Tanggal_kembali >=', $tgl_1);
			$this->db->where('Tanggal_kembali <=', $tgl_2);

			return $this->db->get();
		}
	}
?>