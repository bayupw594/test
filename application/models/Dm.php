<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dm extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("motor");
		return $this->db->get();
	}
	public function adm($data){
		$query = "SELECT nama_anggota FROM anggota WHERE id_anggota = ? ";
		$result = $this->db->query($query, $data['id_anggota']);
		$data['Nama_Pemilik'] = $result->result()[0]->nama_anggota;
		
		$this->db->insert('motor',$data);
	}

	public function getdm(){
		$this->db->select("*");
		$this->db->from("motor");
		return $this->db->get();
	}

	public function gmu($no_motor){
		$this->db->where('No_Registrasi', $no_motor);
		$this->db->select("*");
		$this->db->from("motor");
		return $this->db->get();
	}
	
	public function uudm($data, $condition){
		$query = "SELECT nama_anggota FROM anggota WHERE id_anggota = ? ";
		$result = $this->db->query($query, $data['id_anggota']);
		$data['Nama_Pemilik'] = $result->result()[0]->nama_anggota;
		
		$this->db->where('No_Registrasi',$condition);
		$this->db->update('motor',$data);
	}

	public function udm($data, $condition){
		$this->db->where('No_Registrasi',$condition);
		$this->db->update('motor',$data);
	}


	public function pdm($idmotor,$data, $condition){
		$this->db->where('No_Registrasi',$idmotor);
		$this->db->where('Type',$condition);
		$this->db->update('motor',$data);
	}

	public function ddm($condition){
		$this->db->where('No_Registrasi',$condition);
		$this->db->delete('motor');
	}

	public function type($tipe){
		$condition = "Ada";
		$this->db->where('Type',$tipe);
		$this->db->where('Status',$condition);
		$this->db->select("No_Registrasi");
		$this->db->from("motor");
		return $this->db->get();
	}

	public function nms(){
		$condition = "Ada";
		$conditio = "KLXS";
		$this->db->where('Status',$condition);
		$this->db->where('Type',$conditio);
		$this->db->select("No_Registrasi");
		$this->db->from("motor");
		return $this->db->get();
	}

	public function nml(){
		$condition = "Ada";
		$conditio = "KLXL";
		$this->db->where('Status',$condition);
		$this->db->where('Type',$conditio);
		$this->db->select("No_Registrasi");
		$this->db->from("motor");
		return $this->db->get();
	}

	public function nmg(){
		$condition = "Ada";
		$conditio = "KLXG";
		$this->db->where('Status',$condition);
		$this->db->where('Type',$conditio);
		$this->db->select("No_Registrasi");
		$this->db->from("motor");
		return $this->db->get();
	}	

	public function nmbf(){
		$condition = "Ada";
		$conditio = "KLXBF";
		$this->db->where('Status',$condition);
		$this->db->where('Type',$conditio);
		$this->db->select("No_Registrasi");
		$this->db->from("motor");
		return $this->db->get();
	}

	public function update($data, $condition){
		$this->db->where('No_Registrasi',$condition);
		$this->db->update('motor', $data);	
	}

	public function modal_maintenance( $No_Registrasi ){
		$query = $this->db->select('*')
		->from("motor")
		->where("No_Registrasi ", $No_Registrasi)->get();

		return $query;
	}

	public function laporan_maintenance( $No_Registrasi, $tgl_1, $tgl_2 ){
		$query = $this->db->select('*')
		->from('maintanence')
		->join('detailmaintanence', 'detailmaintanence.id_maintanence = maintanence.id_maintanence')
		->where('maintanence.no_motor', $No_Registrasi)
		->where('detailmaintanence.tanggal >=', $tgl_1)
		->where('detailmaintanence.tanggal <=', $tgl_2)->get();

		return $query;
	}
}