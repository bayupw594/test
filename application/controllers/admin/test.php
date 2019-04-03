<?php 
	class Test extends CI_Controller {
		function __construct(){
			parent:: __construct();
			$this->load->model('parts');
		}
		
		function index(){
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];

		    	$this->load->view('admin/test', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('home','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function get_data_sparepart() {
		    $term = $this->input->get('term');
		    // variable lain bisa dipake dari view yang diset
		    // $datalain = $this->input->get('datalain');

		    // load data ke model
		    $data_sparepart = $this->parts->get_sparepart_by($term,'sparepart_id,sparepart_code,sparepart_name, sparepart_hargajual');

		    // keluarkan dalam bentuk json
		    echo json_encode($data_sparepart);  
		}
	}
?>