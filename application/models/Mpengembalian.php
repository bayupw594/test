<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mpengembalian extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->db->from("pengembalian");
		return $this->db->get();
	}
	public function prosespengembalian($data){
		$this->db->insert('pengembalian',$data);
	}
}

