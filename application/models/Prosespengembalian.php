<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prosespengembalian extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("pengembalian");
		return $this->db->get();
	}

	public function savedata($data)
	{
		$this->db->insert('pengembalian',$data);
	}

	public function liatdata($id){
		$this->db->where('Id_Peminjamanan', $id);
		$this->db->select("*");
		$this->db->from("pengembalian");
		return $this->db->get();
	}

	/*public function delete($harga){
		$this->db->where('id', $harga);
		$this->db->delete("harga");
	}*/
}
?>