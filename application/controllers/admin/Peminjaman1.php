<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	class Peminjaman extends CI_Controller {
		public function __construct() {
			parent:: __construct();
			$this->load->model('dm');
			$this->load->model('dp');
			$this->load->model('p');
			$this->load->model('detp');
			$this->load->model('mpengembalian');
		}

		public function pinjam() {
			
		}

		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];

		    	$data['dmotors'] = $this->dm->nms();
				$data['dmotorl'] = $this->dm->nml();
				$data['dmotorg'] = $this->dm->nmg();
				$data['bper'] = $this->dp->b();
				$data['jbper'] = $this->dp->jb();
				$data['bpper'] = $this->dp->bp();
				$data['jpbper'] = $this->dp->jbp();
				$data['kper'] = $this->dp->kp();
				$data['jkper'] = $this->dp->jkp();
				$data['jper'] = $this->dp->j();
				$data['jjper'] = $this->dp->jj();
				$data['gper'] = $this->dp->g();
				$data['jgper'] = $this->dp->jg();

		    	$this->load->view('admin/peminjaman', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('home','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}
		public function ps(){

		$date=$this->input->post('tgl');
		$namahari = date('l', strtotime($date));
		$jam = date('h', strtotime($date));
		$pkt = $this->input->post('paket');
		$klxs = $this->input->post('s');
		$klxl = $this->input->post('l');
		$klxg = $this->input->post('g');
		
		if($namahari=="Monday" ||$namahari=="Thursday" ){ //senin, kamis, 
			//echo "Weekday";
			if($pkt==1){
				//echo "Weekday/12jam";
				
			}
		}
			//sabtu,minggu
		else if($namahari=="‎Saturday" ||$namahari=="Sunday" ){  
			//echo "Weekday";
			if($pkt==1){
				//echo "Weekday/12jam";
				
			}
		}		
			//jum'at
		else if($namahari=="Friday" ){  
			if($h<=21){
				if($pkt==1){
						//echo "Weekday/12jam";	
					} 
			} 
			else if($h>21){
				if($pkt==1){
					//echo "Weekday/12jam";
				}		
			}
		}
		//selasa,rabu
		else {
			if($pkt==1){
				//echo "Weekday/12jam";
			}
		}
			
	}
		
}
	
?>