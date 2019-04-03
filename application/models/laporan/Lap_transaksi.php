<?php if( !defined('BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Lap_transaksi extends CI_Model {
		function __construct() {
			parent::__construct();
		}

		public function liatdata_pinjam($id_peminjaman){
			$this->db->select('*')
			->from('peminjaman')
			->where('Id_Peminjamanan', $id_peminjaman);
			return $this->db->get();
		}

		public function liatmotor_pinjam($id_peminjaman){
			$this->db->select('*')
			->from('peminjaman')
			->join('detailpinjammotor', 'detailpinjammotor.Id_Peminjamanan = peminjaman.Id_Peminjamanan')
			->where('peminjaman.Id_Peminjamanan', $id_peminjaman);
			return $this->db->get();
		}

		public function liat_p_pinjam($id_peminjaman){
			$this->db->select('*')
			->from('peminjaman')
			->join('detailpeminjaman', 'detailpeminjaman.Id_Peminjamanan = peminjaman.Id_Peminjamanan')
			->where('peminjaman.Id_Peminjamanan', $id_peminjaman);
			return $this->db->get();
		}

		public function lihat_pinjam($id_peminjaman) {
			$this->db->select('*')
			->from('peminjaman')
			->join('pembayaran', 'pembayaran.Id_Peminjaman = peminjaman.Id_Peminjamanan')
			->where('Id_Peminjamanan', $id_peminjaman);
			return $this->db->get();
		}

		public function lihatanggota_pinjam($id_peminjaman){
			$this->db->select("*")
			->from("peminjaman")
			->join('anggota', 'anggota.id_anggota = peminjaman.guide')
			->join('pembayaran', 'pembayaran.Id_Peminjaman = peminjaman.Id_Peminjamanan')
			->where('Id_Peminjamanan', $id_peminjaman);

			return $this->db->get();
		}

		public function lihatbootmx_pinjam($id_peminjaman){
			$this->db->select("*")
			->from("peminjaman")
			->join('detailbootmx', 'detailbootmx.id_peminjamanan = peminjaman.Id_Peminjamanan')
			->join('boot_oneal', 'boot_oneal.id_boot = detailbootmx.id_boot')
			->where('peminjaman.Id_Peminjamanan', $id_peminjaman);

			return $this->db->get();
		}

		public function maxid_pinjam(){
			$this->db->select_max('Id_Peminjamanan');
			$query = $this->db->get('peminjaman');
		     if ($query->num_rows() > 0) {
		         return $query->row()->Id_Peminjamanan;
		     }
		     return false;
		}

		/* menampilkan data transaksi untuk pengembalian */
		
		public function liatdata($id_pengembalian){
			$this->db->select('*')
			->from('pengembalian')
			->join('peminjaman', 'peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
			->where('id_pengembalian', $id_pengembalian);
			return $this->db->get();
		}

		public function liatmotor($id_pengembalian){
			$this->db->select('*')
			->from('pengembalian')
			->join('detailpinjammotor', 'detailpinjammotor.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
			->where('id_pengembalian', $id_pengembalian);
			return $this->db->get();
		}

		public function liat_p($id_pengembalian){
			$this->db->select('*')
			->from('pengembalian')
			->join('detailpeminjaman', 'detailpeminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
			->where('id_pengembalian', $id_pengembalian);
			return $this->db->get();
		}

		public function lihat($id_pengembalian) {
			$this->db->select('*')
			->from('pengembalian')
			->join('pembayaran', 'pembayaran.Id_Peminjaman = pengembalian.Id_Peminjamanan')
			->where('id_pengembalian', $id_pengembalian);
			return $this->db->get();
		}

		public function lihatbootmx($id_pengembalian){
			$this->db->select("*")
			->from("pengembalian")
			->join('peminjaman', 'peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
			->join('detailbootmx', 'detailbootmx.id_peminjamanan = pengembalian.Id_Peminjamanan')
			->join('boot_oneal', 'boot_oneal.id_boot = detailbootmx.id_boot')
			->where('id_pengembalian', $id_pengembalian);

			return $this->db->get();
		}

		public function maxid(){
			$this->db->select_max('id_pengembalian');
			$query = $this->db->get('pengembalian');
		     if ($query->num_rows() > 0) {
		         return $query->row()->id_pengembalian;
		     }
		     return false;
		}

		public function lihatanggota($id_pengembalian){
			$this->db->select("*")
			->from("pengembalian")
			->join("peminjaman", "peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan")
			->join('anggota', 'anggota.id_anggota = peminjaman.guide')
			->join('pembayaran', 'pembayaran.Id_Peminjaman = pengembalian.Id_Peminjamanan')
			->where('id_pengembalian', $id_pengembalian);

			return $this->db->get();
		}
	}
?>