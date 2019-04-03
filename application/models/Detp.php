<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Detp extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("detailpeminjaman");
		$this->db->from("perlengkapan");
		$this->db->from("peminjaman");
		return $this->db->get();
	}
	function idg( $data ){
		$this->db->insert('detail_guide', $data);
	}

	function idm( $data ){
		$this->db->insert('detailbootmx', $data);
	}

	function dx( $id_peminjaman ){
		$this->db->select("*")
		->from('detailbootmx')
		->join('boot_oneal', "boot_oneal.id_boot = detailbootmx.id_boot")
		->join('anggota', "anggota.id_anggota = boot_oneal.id_anggota")
		->where('id_peminjamanan', $id_peminjaman);

		return $this->db->get();
	}

	function udx( $id_boot, $status ){
		$this->db->where("id_boot", $id_boot);
		$this->db->update("boot_oneal", $status);
	}
	public function sdp($data){
		$this->db->insert('detailpeminjaman',$data);
	}
	//menampilkan nama dari jenis perlengkapan
	public function dp($id_peminjaman)
	{
		$this->db->select('*');
		$this->db->from('perlengkapan');
		$this->db->join('detailpeminjaman', 'detailpeminjaman.id_perlengkapan = perlengkapan.id_perlengkapan');
		$this->db->join('peminjaman', 'peminjaman.id_peminjamanan = detailpeminjaman.id_peminjamanan');
		$this->db->where('peminjaman.id_peminjamanan', $id_peminjaman); 
		/*$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jenis_perlengkapan;
	     }
	     return false;*/
	     return $this->db->get();
	}

	public function jdp($id_peminjaman)
	{
		$this->db->select('*');
		$this->db->from('perlengkapan');
		$this->db->join('detailpeminjaman', 'detailpeminjaman.jenis_perlengkapan = perlengkapan.jenis_perlengkapan');
		$this->db->join('peminjaman', 'peminjaman.id_peminjamanan = detailpeminjaman.id_peminjamanan');
		$this->db->where('peminjaman.id_peminjamanan', $id_peminjaman); 
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
		$this->db->where('id_peminjamanan', $id_peminjaman);
		$this->db->select("*");
		$this->db->from("detailpeminjaman");
		return $this->db->get();
	}

	
}