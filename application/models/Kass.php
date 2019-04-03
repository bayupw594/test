<?php if ( ! defined ( 'BASEPATH' ) ) exit ('No Direct Script Access Allowed');

	class Kass extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->db->from( "anggota" );
			return $this->db->get();
		}

		function lihat() {
			$jenis_kas = "0";
			$this->db->select('*')->from('kas')->where('jenis_kas !=', $jenis_kas);
			return $this->db->get();
		}

		function denda($idpinjam){
			$this->db->where('id_peminjamanan', $idpinjam);
			$this->db->select("*");
			$this->db->from("pengembalian");
			return $this->db->get();
		}
		function total_kas() {
			$total = $this->db->select("id_kas,total")
			->from("kas")
			->order_by("id_kas","DESC")->get();

			$result = $total->result()[0]->total;
			return $result;
		}

		function kas_sebelum() {
			$total = $this->db->select("id_kas,total")
			->from("kas")
			->order_by("id_kas","DESC")->get();

			if ( $total->num_rows() > 0 ){
				return $total->row()->total;
			}
			return false;
		}

		function kas_masuk($data) {
			$this->db->insert('kas', $data);
		}
	}
?>