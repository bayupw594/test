<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pembayaran extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("pembayaran");
		$this->db->from("detail_guide");
		return $this->db->get();
	}

	public function savedata($data)
	{
		$this->db->insert('pembayaran',$data);
	}

	public function liatdata(){
		$this->db->select("*");
		$this->db->from("pembayaran");
		return $this->db->get();
	}

	public function lihatguide( $id_peminjaman){
		$this->db->select('*');
		$this->db->from('detail_guide');
		$this->db->join('anggota', 'anggota.id_anggota = detail_guide.id_angg');
		$this->db->where('id_peminjamanan', $id_peminjaman);

		return $this->db->get();
	}
	public function liatdatadetail( $id_peminjaman ){
		$this->db->select("*");
		$this->db->from("pembayaran");
		$this->db->where('pembayaran.Id_Peminjaman', $id_peminjaman);

		return $this->db->get();
	}

	public function ddp($id_peminjaman)
	{
		$this->db->where('Id_Peminjaman', $id_peminjaman);
		$this->db->select("*");
		$this->db->from("pembayaran");
		return $this->db->get();
	}

	public function update($data, $condition){
		$this->db->where('Id_Peminjaman',$condition);
		$this->db->update('pembayaran',$data);
	}
}