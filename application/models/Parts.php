<?php if ( ! defined ( 'BASEPATH' ) ) exit ('No Direct Script Access Allowed');
	
	class Parts extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->db->from("parts");
			$this->db->from("motor");
			return $this->db->get();
		}

		function getparts() {
			$this->db->select("*");
			$this->db->from("parts");
			return $this->db->get();
		}

		function update_parts($id_parts) {
			$this->db->select("*");
			$this->db->from("parts");
			$this->db->where('id_parts', $id_parts);
			return $this->db->get();
		}

		function update_($data, $id_parts){
			$this->db->where('id_parts', $id_parts);
			$this->db->update('parts', $data);
		}
		function ins_parts($data) {
			$this->db->insert("parts",$data);
		}

		function noreg_maintanence(){
			$condition = "Ada";
			$conditio1 = "KLXS"; $conditio2 = "KLXL"; $conditio3 = "KLXG"; $conditio4 = "KLXBF";
			$this->db->where('Status',$condition);
			$this->db->where('Type',$conditio1);
			$this->db->or_where('Type',$conditio2);
			$this->db->or_where('Type',$conditio3);
			$this->db->or_where('Type',$conditio4);
			$this->db->select("No_Registrasi");
			$this->db->order_by('No_Registrasi', 'asc');
			$result = $this->db->get('motor');

			$dd[''] = '';
			if ($result->num_rows() > 0) {
	            foreach ($result->result() as $row) {
	            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
	                $dd[$row->No_Registrasi] = $row->No_Registrasi;
	            }
	        }
	        return $dd;
		}

		function parts_maintanence(){
			$result = $this->db->get('parts');			
			$dd[''] = '';
			if ($result->num_rows() > 0) {
	            foreach ($result->result() as $row) {
	            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
	                $dd[$row->nama_parts] = $row->nama_parts;
	            }
	        }
	        return $dd;
		}

		function get_sparepart_by($term, $column='*') {
		    $this->db->select($column);
		    $this->db->like('id_parts',$term);
		    $this->db->or_like('nama_parts',$term);
		    $data = $this->db->from('parts')->get();
		    return $data->result_array();
		}

		public function get_sparepart_by_nama_parts( $nama_parts ) {
			if ( !$nama_parts || empty( $nama_parts ) )
				return ( false );

			$r = $this->db->where("nama_parts", $nama_parts)->get("parts");

			if ( $r->num_rows() !== 1 )
				return ( false );

			$container = array();

			array_push($container, $r->result()[0]->id_parts);
			array_push($container, $r->result()[0]->nama_parts);
			array_push($container, $r->result()[0]->jenis_parts);
			array_push($container, $r->result()[0]->harga_parts);

			// freeing the resource after... "use it.."
			$r->free_result();

			return ($container);
		}
	}
?>