<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hb extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("hargasewaperlengkapan");
		return $this->db->get();
	}

	public function savedata($data)
	{
		$this->db->insert('hargasewaperlengkapan',$data);
	}

	public function showdata(){
		$this->db->select("*");
		$this->db->from("hargasewaperlengkapan");
		return $this->db->get();
	}

	public function delete($condition){
		$this->db->where('id_harga',$condition);
		$this->db->delete('hargasewaperlengkapan');
	}

	public function liatdata($condition){
		$this->db->where('id_harga', $condition);
		$this->db->select("*");
		$this->db->from("hargasewaperlengkapan");
		return $this->db->get();
	}

	public function update($data, $condition){
		$this->db->where('id_harga',$condition);
		$this->db->update('hargasewaperlengkapan', $data);
		
	}

	//mulai pengambilan harga sewa
	public function harga($nama_barang)
	{
		$this->db->where('nama_barang', $nama_barang);
		$this->db->select("harga");
		$this->db->from("hargasewaperlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->harga;
	     }
	     return false;
	     //return $this->db->get();
	}
	//akhir pengambilan harga sewa

	function is_exists($jenis_exists, $kondisi_exists) {
		$tipe_motor_exists = $this->db->field_exists('tipe_motor','hargasewamotor');
		$harga_sewa_exists = $this->db->field_exists('harga_sewa','hargasewamotor');

		return $tipe_motor_exists and $harga_sewa_exists;
	}
}