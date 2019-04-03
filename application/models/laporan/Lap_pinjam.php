<?php if( !defined('BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Lap_pinjam extends CI_Model {
		function __construct() {
			parent::__construct();
		}

		function diprint($tgl_1, $tgl_2){
			$this->db->select('*');
			$this->db->from('peminjaman');
			$this->db->join('pembayaran', 'peminjaman.Id_Peminjamanan = pembayaran.Id_Peminjaman');
			$this->db->where('Tanggal >=', $tgl_1);
			$this->db->where('Tanggal <=', $tgl_2);
			$this->db->where('status', 'pinjam');

			return $this->db->get();
		}
	}
?>