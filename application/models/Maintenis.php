<?php if ( ! defined ( 'BASEPATH' ) ) exit ("No Direct Script Access Allowed");

	class Maintenis extends CI_Model {
		function __construct(){
			parent:: __construct();
			$this->db->from("detailmaintanence");
			return $this->db->get();
		}

		function ins_maintanence($data) {
			$this->db->from("maintanence");
			$this->db->insert("maintanence",$data);
			$last_id = $this->db->insert_id();
			return $last_id;
		}

		function ins_det_maintanence($data) {
			$this->db->insert('detailmaintanence',$data);
		}

		function fetch_id() {
			$query = $this->db->select('id_maintanence')->from('maintanence')->order_by('id_maintanence','desc')->limit('1')->get();

			if($query->num_rows != 1){
				return ( false );
			} 

			$id = $query->result()[0]->id_maintanence;
			return $id;
		}

		function delete_parts($condition){
			$this->db->where('id_parts',$condition);
			$this->db->delete('parts');
		}
	}
?>