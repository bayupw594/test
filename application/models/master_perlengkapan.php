<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Master_Perlengkapan extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("master_perlengkapan");
		return $this->db->get();
    }
    public function get_data(){
		$this->db->select("*");
		$this->db->from("master_perlengkapan");
		return $this->db->get();
	}
	/*public function adp($data){
		$this->db->insert('perlengkapan',$data);
	}

	public function getdp(){
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	public function getdata(){
		$condition = "baik";
		$this->db->where('kondisi',$condition);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	public function updatedata($jenis, $kondisi, $data){
		$this->db->where('jenis_perlengkapan',$jenis);
		$this->db->where('kondisi',$kondisi);
		$this->db->update('perlengkapan', $data);
	}
	
	public function gpu($id_perlengkapan){
		$this->db->where('id_perlengkapan', $id_perlengkapan);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	public function udp($data, $condition){
		$this->db->where('id_perlengkapan',$condition);
		$this->db->update('perlengkapan', $data);
	}

	public function ddp($condition){
		$this->db->where('id_perlengkapan',$condition);
		$this->db->delete('perlengkapan');
	}

	public function jp(){
		
		$condition > "0";
		$this->db->where('jumlah_perlengkapan',$condition);
		$this->db->select("jenis_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
	}
	//peminjaman
	//kondisi baik
	//perlengkapan b 
	public function b(){
		$condition = "B";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}
	public function jb(){
		$condition = "B";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("jumlah_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
		//return $this->db->get();
	}
	public function hb(){
		$condition = "B";
		$conditio = "baik";
		$this->db->where('*',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("harga");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	//perlengkapan bp
	public function bp(){
		$condition = "GL";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}
	public function jbp(){
		$condition = "GL";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("jumlah_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
		//return $this->db->get();
	}
	public function hbp(){
		$condition = "GL";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("harga");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	//perlengkapan kp
	public function kp(){
		$condition = "KP";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}
	public function jkp(){
		$condition = "KP";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("jumlah_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
		//return $this->db->get();
	}
	public function hkp(){
		$condition = "KP";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("harga");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	//perlengkapan j
	public function j(){
		$condition = "J";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}
	public function jj(){
		$condition = "j";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->select("jumlah_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
	}
	public function hj(){
		$condition = "J";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("harga");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	//perlengkapan j
	public function g(){
		$condition = "G";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("*");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}
	public function jg(){
		$condition = "G";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("jumlah_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
	}
	public function hg(){
		$condition = "G";
		$conditio = "baik";
		$this->db->where('jenis_perlengkapan',$condition);
		$this->db->where('kondisi',$conditio);
		$this->db->select("harga");
		$this->db->from("perlengkapan");
		return $this->db->get();
	}

	public function ujp($id_perlengkapan,$condition)
	{
		$this->db->where('jenis_perlengkapan',$id_perlengkapan);
		$this->db->update('perlengkapan',$condition);
	}

	public function uppe($id_perlengkapan,$jumlah)
	{
		$this->db->where('id_perlengkapan',$id_perlengkapan);
		$this->db->update('perlengkapan',$jumlah);
	}

	public function jumuppe($id_perlengkapan)
	{
		$this->db->where('id_perlengkapan',$id_perlengkapan);
		$this->db->select("jumlah_perlengkapan");
		$this->db->from("perlengkapan");
		$query = $this->db->get();
	     if ($query->num_rows() > 0) {
	         return $query->row()->jumlah_perlengkapan;
	     }
	     return false;
	}		

	function is_exists($jenis_exists, $kondisi_exists) {
		$jenis_exists = $this->db->field_exists('jenis_perlengkapan','perlengkapan');
		$kondisi_exists = $this->db->field_exists('kondisi','perlengkapan');

		return $jenis_exists and $kondisi_exists;
	}

	//lihat data boot mx / oneal
	function lihat_boot(){
		$this->db->select("*")
		->from("boot_oneal")
		->join("anggota", "anggota.id_anggota = boot_oneal.id_anggota");

		return $this->db->get();
	}

	function lihat_mx(){
		$pinjam = "Ada";
		$this->db->select("*")
		->from("boot_oneal")
		->join("anggota", "anggota.id_anggota = boot_oneal.id_anggota")
		->where("status", $pinjam );
		return $this->db->get();
	}

	function upd_oneal($no_boot){
		$this->db->select("*")
		->from("boot_oneal")
		->join("anggota", "anggota.id_anggota = boot_oneal.id_anggota")
		->where("id_boot", $no_boot);

		return $this->db->get();
	}

	//insert boot mx / oneal
	function ins_oneal($data){
		$this->db->insert('boot_oneal',$data);
	}

	//update boot mx / oneal
	function update_oneal( $id_boot, $data ){
		$this->db->where("id_boot", $id_boot);
		$this->db->update('boot_oneal', $data);	
	}

	function del_mx( $id_boot ){
		$this->db->where( 'id_boot',$id_boot );
		$this->db->delete( 'boot_oneal' );
	}*/
}