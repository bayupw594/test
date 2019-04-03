<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detailpm extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("detailpinjammotor");
		$this->db->from("motor");
		$this->db->from("peminjaman");
		return $this->db->get();
	}
	public function sdp($data){
		$this->db->insert('detailpinjammotor',$data);
	}	

	public function dp($id_peminjaman)
	{
		$this->db->select('*');
		$this->db->from('motor');
		$this->db->join('detailpinjammotor', 'detailpinjammotor.nomer_registrasi = motor.nomer_registrasi');
		$this->db->join('peminjaman', 'peminjaman.id_peminjamanan = detailpinjammotor.Id_peminjamanan');
		$this->db->where('peminjaman.Id_Peminjamanan', $id_peminjaman); 
		/*$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jenis_perlengkapan;
	     }
	     return false;*/
	     return $this->db->get();
	}

	public function ddp($id_peminjaman)
	{
		$this->db->where('Id_Peminjamanan', $id_peminjaman);
		$this->db->select("*");
		$this->db->from("detailpeminjaman");
		return $this->db->get();
	}

	public function liatdata($id_peminjaman){
		$this->db->where('Id_Peminjamanan', $id_peminjaman);
		$this->db->select("*");
		$this->db->from("detailpinjammotor");
		return $this->db->get();
	}
}