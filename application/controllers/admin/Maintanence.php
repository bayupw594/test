<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');

	class Maintanence extends CI_Controller {
		private $id_maintanence;
		function __construct() {
			parent:: __construct();
			$this->load->database(); 
			$this->load->helper('form');
			$this->load->model('parts');
			$this->load->model('maintenis');
			$this->load->library("form_validation");
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');

		    	$data = [
		    		'username' => $session_data['username'],
		    		'getparts' => $this->parts->getparts(),
		            'action' => site_url('admin/maintanence'),
		            'dd_parts' => $this->parts->parts_maintanence(),
		            'dd_noreg' => $this->parts->noreg_maintanence(),
		            'noreg_selected' => $this->input->post('nama_noreg') ? $this->input->post('nama_noreg') : '',
		            'parts_selected' => $this->input->post('nama_parts') ? $this->input->post('nama_parts') : ''
				];

		    	$this->load->view('admin/maintanence', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('maintanence','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function ins_parts() {
			$data = array (
				'nama_parts' => $this->input->post('nama_parts'),
				'jenis_parts' => $this->input->post('jenis_parts'),
				'harga_parts' => $this->input->post('harga_parts')
			);
			$this->parts->ins_parts($data);
			redirect("admin/maintanence", "refresh");
		}

		function ins_maintanence() {
			$data = [
				'no_motor' => $this->input->post('nama_noreg'),
				'admin' => $this->input->post('admin'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'pengerja' =>$this->input->post('pengerja'),
				'service' => $this->input->post('service'),
				'grand_sub' => preg_replace("/[^A-Za-z0-9\-]/", "", $this->input->post('total_semua')),
				'tanggal' => $this->input->post('tanggal')
			];

			$this->id_maintanence = $this->maintenis->ins_maintanence($data);
		}

		function ins_det_maintanence(){
			$data = [
				'id_maintanence' => $this->maintenis->fetch_id(),
				'nama_parts' => $this->input->post('nama_parts'),
				'harga_satuan' => $this->input->post('harga'),
				'jumlah_parts' => $this->input->post('jumlah_parts'),
				'service_detail' => $this->input->post('service'),
				'sub_total' => $this->input->post('subtotal'),
				'tanggal' => $this->input->post('tanggal'),
				'grand_sub_detail' => preg_replace("/[^A-Za-z0-9\-]/", "", $this->input->post('total_semua'))
			];

			$this->maintenis->ins_det_maintanence($data);
			redirect('admin/maintanence');
		}
	

		public function get_data_sparepart() {
		    $term = $this->input->get('term');
		    // variable lain bisa dipake dari view yang diset
		    // $datalain = $this->input->get('datalain');

		    // load data ke model
		    $data_sparepart = $this->parts->get_sparepart_by($term,'id_parts,nama_parts, harga_parts');

		    // keluarkan dalam bentuk json
		    echo json_encode($data_sparepart);  
		}

		public function wkwk() {
			$r = $this->parts->get_sparepart_by_nama_parts($this->input->post("nama_parts"));

			echo json_encode( $r );
		}

		public function updt_parts($id_parts){
			$data['listparts'] = $this->parts->update_parts($id_parts);
			$this->load->view('admin/updateparts', $data);
		}

		public function update_parts(){
			$id_parts = $this->input->post('id_parts');

			$data = [
				'id_parts' => $this->input->post('id_parts'),
				'nama_parts' => $this->input->post('nama_parts'),
				'harga_parts' => $this->input->post('harga_parts')
			];

			$this->parts->update_($data, $id_parts);
			redirect('admin/maintanence', 'refresh');
		}

		public function delete_parts($id_parts){
			$this->maintenis->delete_parts($id_parts);
			redirect('admin/maintanence');
		}
	}
	
?>