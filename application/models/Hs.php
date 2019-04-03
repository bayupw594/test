<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hs extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("hargasewamotor");
		return $this->db->get();
	}

	public function savedata($data){
		$this->db->insert('hargasewamotor',$data);
	}

	public function showdata(){
		$this->db->select("*");
		$this->db->from("hargasewamotor");
		return $this->db->get();
	}

	public function delete($condition){
		$this->db->where('kode_harga',$condition);
		$this->db->delete('hargasewamotor');
	}

	public function liatdata($condition){
		$this->db->where('kode_harga', $condition);
		$this->db->select("*");
		$this->db->from("hargasewamotor");
		return $this->db->get();
	}

	public function update($data, $condition){
		$this->db->where('kode_harga',$condition);
		$this->db->update('hargasewamotor', $data);
		
	}

	//mulai pengambilan harga sewa
	public function harga($tipe,$hari,$jam)
	{
		$this->db->where('tipe_motor', $tipe);
		$this->db->where('hari', $hari);
		$this->db->where('jam', $jam);
		$this->db->select("harga_sewa");
		$this->db->from("hargasewamotor");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->harga_sewa;
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