<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class P extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("peminjaman");
		$this->db->from("pembayaran");
		$this->db->from("anggota");
		return $this->db->get();
	}
	public function prosespinjam($data){
		$this->db->insert('peminjaman',$data);
		$last_id = $this->db->insert_id();
    	return $last_id;
	}

	
	public function udpin($data, $condition){
		$this->db->where('id_peminjamanan',$condition);
		$this->db->update('peminjaman',$data);
		
	}
	//menampilkan data peminjaman
	public function l(){
		$condition = "pinjam";
		$this->db->select("*");
		$this->db->from("peminjaman");
		$this->db->join('pembayaran', 'peminjaman.Id_Peminjamanan = pembayaran.Id_Peminjaman');
		$this->db->where('status',$condition);
		/*$this->db->where('pembayaran.keterangan', "Tunai"); 
		$this->db->or_where('pembayaran.keterangan', "Debit"); 
		$this->db->or_where('pembayaran.keterangan', "Transfer"); 
		$this->db->or_where('pembayaran.keterangan', "Lunas"); */
		return $this->db->get();
	}
	//menampilkan data pengembalian
	public function k(){
		$condition = "Kembali";
		$this->db->select("*");
		$this->db->from("peminjaman");
		$this->db->join('pengembalian', 'peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan');
		$this->db->where('status',$condition);
		return $this->db->get();
	}

	//sort tanggal pengembalian
	function sort_tanggal($tgl_1, $tgl_2){
		$condition = "Kembali";
		$this->db->select("*")
		->from("peminjaman")
		->join('pengembalian', 'peminjaman.Id_Peminjamanan = pengembalian.Id_Peminjamanan')
		->where('status',$condition)
		->where('Tanggal_kembali >=', $tgl_1)
		->where('Tanggal_kembali <=', $tgl_2);

		return $this->db->get();
	}

	public function ldp(){
		$condition = "masihdp";
		$this->db->select("*");
		$this->db->from("peminjaman");
		$this->db->join('pembayaran', 'peminjaman.Id_Peminjamanan = pembayaran.Id_Peminjaman');
		$this->db->where('status',$condition);
		$this->db->where('pembayaran.keterangan', "Dp"); 
		$this->db->order_by('peminjaman.Tanggal', "DESC"); 
		return $this->db->get();
	}

	public function glp($id_peminjaman){
		$this->db->where('id_peminjamanan', $id_peminjaman);
		$this->db->select("*");
		$this->db->from("peminjaman");
		return $this->db->get();
	}

	public function maxid(){
		$this->db->select_max('id_peminjamanan');
		$query = $this->db->get('peminjaman');
	     if ($query->num_rows() > 0) {
	         return $query->row()->id_peminjamanan;
	     }
	     return false;
	}

	public function liatdata($id_peminjaman){
		$this->db->where('Id_Peminjamanan', $id_peminjaman);
		$this->db->select("*");
		$this->db->from("peminjaman");
		return $this->db->get();
	}
	//lihat anggota
	public function lihatanggota($id_peminjaman){
		
		$this->db->select("*");
		$this->db->from("peminjaman");
		$this->db->join("detail_guide", "detail_guide.id_peminjamanan");
		$this->db->join('anggota', 'anggota.id_anggota = detail_guide.id_angg');
		$this->db->where('detail_guide.id_peminjamanan', $id_peminjaman);
		$this->db->where('peminjaman.Id_Peminjamanan', $id_peminjaman);

		return $this->db->get();
	}
}