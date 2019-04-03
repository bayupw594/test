<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class H extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("harga");
		return $this->db->get();
	}

	public function savedata($data)
	{
		$this->db->insert('harga',$data);
	}

	public function liatdata(){
		$this->db->select("*");
		$this->db->from("harga");
		return $this->db->get();
	}

	public function delete($harga){
		$this->db->where('id', $harga);
		$this->db->delete("harga");
	}

	public function lihat($id) {
		$this->db->where('Id_Peminjaman', $id);
		$this->db->from('pembayaran');
		return $this->db->get();
	}
}