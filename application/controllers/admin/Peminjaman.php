<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');

	class Peminjaman extends CI_Controller {
		public function __construct() {
			parent:: __construct();
			$this->load->model('dm');
			$this->load->model('dp');
			$this->load->model('p');
			$this->load->model('detp');
			$this->load->model('detailpm');
			$this->load->model('mpengembalian');
			$this->load->model('hs');
			$this->load->model('hb');
			$this->load->model('h');
			$this->load->model('manggota');

			#master motor
			$this->load->model('master_motor');
			$this->load->model('master_perlengkapan');
			$this->load->library( 'form_validation' );
		}

		function index() {
			
			$user_data = $this->session->userdata('logged_in');
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];

		    	$object['controller']=$this; 
		    	$data['d_motor'] = $this->master_motor->get_data_motor();
		    	$data['d_mobil'] = $this->master_motor->get_data_mobil();

		    	/*$data['dmotors'] = $this->dm->nms();
				$data['dmotorl'] = $this->dm->nml();
				$data['dmotorg'] = $this->dm->nmg();
				$data['dmotorbf'] = $this->dm->nmbf();
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
				$data['boot_mx'] = $this->dp->lihat_mx();
				$data['anggota'] = $this->manggota->lihat_anggota();
				#master motor
				$data['motor'] = $this->master_motor->get_kategori_motor(1);
				$data['mobil'] = $this->master_motor->get_kategori_motor(2);
				$data['perlengkapan'] = $this->master_perlengkapan->get_data();*/
		    	$this->load->view('admin/peminjaman', $data, $object);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('peminjaman','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		public function ps(){
			#untuk menentukan weekend dan weekday
			$date=$this->input->post('tgl_berangkat');
			$hari = date('D', strtotime($date));
			if($hari=="sun" || $hari=="sat"){
				$jenishari="Weekend";
			} else {
				$jenishari="Weekday";
			}
			/*if($hari=="sun"){
				$jenishari="Minggu";
			} else if($hari=="mon"){
				$jenishari="Senin";
			} else if($hari=="Tue"){
				$jenishari="Selasa";
			} else if($hari=="wed"){
				$jenishari="Rabu";
			} else if($hari=="Thu"){
				$jenishari="Kamis";
			} else if($hari=="Fri"){
				$jenishari="Jumat";
			} else {
				$jenishari="Sabtu";
			}*/
				/*$this->form_validation->set_rules('napem', 'Nama Peminjam', 'required|trim|xss_clean');
		    	$this->form_validation->set_rules('sim', 'Nomer HP', 'required|trim|xss_clean');
		    	$this->form_validation->set_rules('ktp', 'Nomer Ktp', 'trim|xss_clean');
		    	$this->form_validation->set_rules('alm', 'Alamat Peminjam', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jaminan', 'Jaminan Peminjam', 'trim|xss_clean');
		    	$this->form_validation->set_rules('paket', 'Paket Peminjaman', 'required|trim|xss_clean');
		    	$this->form_validation->set_rules('tgl', 'Tanggal Peminjaman', 'required|trim|xss_clean');
		    	$this->form_validation->set_rules('namafeemarketing', 'Nama Fee Marketing', 'trim|xss_clean');
		    	$this->form_validation->set_rules('klxs[]', 'klxs', 'trim|xss_clean');
		    	$this->form_validation->set_rules('klxl[]', 'klxl', 'trim|xss_clean');
		    	$this->form_validation->set_rules('klxg[]', 'klxg', 'trim|xss_clean');
		    	$this->form_validation->set_rules('klxbf[]', 'klxbf', 'trim|xss_clean');
		    	$this->form_validation->set_rules('angg[]', "Anggota", "trim|xss_clean");
		    	$this->form_validation->set_rules('jumlah_pinjaman1', 'Boots', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman2', 'Body Protector', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman3', 'Knee Protector', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman4', 'Jersey', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman5', 'Google', 'trim|xss_clean');
		    	$this->form_validation->set_rules('fullapparel', 'Full Appparel', 'trim|xss_clean');
		    	$this->form_validation->set_rules('libur[]', 'Hari Libur', 'trim|xss_clean|isset');
		    	$this->form_validation->set_rules("boot_mx[]", "Boot MX / Oneal", "trim|xss_clean");
		    	$this->form_validation->set_rules("keterangan", "Keterangan", "trim|xss_clean");

		    	if($this->form_validation->run() == FALSE) {
		    		$session_data = $this->session->userdata( 'logged_in' );
		    		$data['username'] = $session_data['username'];
		    		$data['dmotors'] = $this->dm->nms();
					$data['dmotorl'] = $this->dm->nml();
					$data['dmotorg'] = $this->dm->nmg();
					$data['dmotorbf'] = $this->dm->nmbf();
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
					$data['anggota'] = $this->manggota->lihat_anggota();
		    		$this->load->view('admin/peminjaman',$data);
		    	} else {
					$date=$this->input->post('tgl');
					$namahari = date('l', strtotime($date));
					$jam = date('H', strtotime($date));
					$pkt = $this->input->post('paket');
					$Weekday="Weekday";
					$Weekend="Weekend";
					$satu="12";
					$dua="24";
					$tipeklxs="KLXS";
					$tipeklxl="KLXL";
					$tipeklxg="KLXG";
					$tipeklxbf="KLXBF";
					$hargaklxs=0;
					$hargaklxl=0;
					$hargaklxg=0;
					$hargaklxbf=0;
					$cekklxs = 0;
					$cekklxl = 0;
					$cekklxg = 0;
					$cekklxbf = 0;

					$cekguide = 0;
					$total_guide = 0;
					$total_mx = 0;
					$cekmx = 0;
					$hargaguide = 350000;
					$hargamx = 50000;
					$biayalain = $this->input->post("biayalain");
					$B  = "B";
					$J  = "J";
					$G  = "G";
					$KP = "KP";
					$BP = "GL";
					$FA = "FA";
					$hargaB  = 0;
					$hargaJ  = 0;
					$hargaG  = 0;
					$hargaKP = 0;
					$hargaBP = 0;
					$hargaFA = 0;
					$jmlp1 = 0;
					$jmlp2 = 0;
					$jmlp3 = 0;
					$jmlp4 = 0;
					$jmlp5 = 0;
					$jmlp6 = 0;
					$jmlb = $this->input->post('JAB');
					$jmlj = $this->input->post('JAJ');
					$jmlg = $this->input->post('JAG');
					$jmlbp = $this->input->post('JABP');
					$jmlkp = $this->input->post('JAKP');
					
					$hargafeemarketing = 0;
					$jenishari = "";
					$namafeemarketing = $this->input->post('namafeemarketing');

					if($this->input->post('jumlah_pinjaman1')!=0){
						$jmlp1 = $this->input->post('jumlah_pinjaman1');
						$hargaB=$this->hb->harga($B);
					}
					if($this->input->post('jumlah_pinjaman2')!=0){
						$jmlp2 = $this->input->post('jumlah_pinjaman2');
						$hargaBP=$this->hb->harga($BP);
					}
					if($this->input->post('jumlah_pinjaman3')!=0){
						$jmlp3 = $this->input->post('jumlah_pinjaman3');
						$hargaKP=$this->hb->harga($KP);
					}
					if($this->input->post('jumlah_pinjaman4')!=0){
						$jmlp4 = $this->input->post('jumlah_pinjaman4');
						$hargaJ=$this->hb->harga($J);
					}
					if($this->input->post('jumlah_pinjaman5')!=0){
						$jmlp5 = $this->input->post('jumlah_pinjaman5');
						$hargaG=$this->hb->harga($G);
					}
					if($this->input->post('fullapparel')!=0){
						$jmlp6 = $this->input->post('fullapparel');
						$hargaFA = $this->hb->harga($FA);
					}

					if( $this->input->post('libur',TRUE ) ){
						$jenishari = "Weekend";
						if($pkt==1){
							if($this->input->post('klxs',TRUE)){
								$cekklxs =count($_POST['klxs']);
								$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$satu);
							}
							if($this->input->post('klxl',TRUE)){
								$cekklxl =count($_POST['klxl']);
								$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$satu);
							}
							if($this->input->post('klxg',TRUE)){
								$cekklxg =count($_POST['klxg']);
								$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$satu);
							}
							if($this->input->post('klxbf',TRUE)){
								$cekklxbf =count($_POST['klxbf']);
								$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$satu);
							}
							if( $this->input->post('angg', TRUE)){
								$cekguide = count($_POST['angg']);
								$total_guide = $hargaguide * $cekguide;
							}
							if( $this->input->post('boot_mx', TRUE)){
								$cekmx = count($_POST['boot_mx']);
								$total_mx = $hargamx * $cekmx;
							}

							$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
							$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
						} else {
							if($this->input->post('klxs',TRUE)){
								$cekklxs =count($_POST['klxs']);
								$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$dua);
							}
							if($this->input->post('klxl',TRUE)){
								$cekklxl =count($_POST['klxl']);
								$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$dua);
							}
							if($this->input->post('klxg',TRUE)){
								$cekklxg =count($_POST['klxg']);
								$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$dua);
							}
							if($this->input->post('klxbf',TRUE)){
								$cekklxbf =count($_POST['klxbf']);
								$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$dua);
							}
							if( $this->input->post('angg', TRUE)){
								$cekguide = count($_POST['angg']);
								$total_guide = $hargaguide * $cekguide;
							}
							if( $this->input->post('boot_mx', TRUE)){
								$cekmx = count($_POST['boot_mx']);
								$total_mx = $hargamx * $cekmx;
							}
							$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
							$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
						}
						if ( $namafeemarketing == "" ){
							$hargafeemarketing = 0;
						} else {
							$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 20000;
						}
					} else {
						//start hari senin, kamis
						if($namahari=="Monday" ||$namahari=="Thursday" ){
							$jenishari = "Weekday"; 
								if($pkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$satu);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$satu);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$satu);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$satu);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								} else {
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$dua);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$dua);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$dua);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$dua);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 10000;
								}
						}
						//start hari minggu
						if($namahari=="Sunday"){  
							if ( $jam < "18") {
								$jenishari = "Weekend";
								if($pkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$satu);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$satu);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$satu);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$satu);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								} else {
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$dua);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$dua);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$dua);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$dua);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								}
							} else {
								$jenishari = "Weekday";
								if($pkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$satu);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$satu);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$satu);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$satu);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								} else {
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$dua);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$dua);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$dua);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$dua);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								}
							}
							 
							if ( $namafeemarketing == "" ){
								$hargafeemarketing = 0;
							} else {
								$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 20000;
							}
						}		
						//start hari jum'at
						if($namahari=="Friday"){  
							if($jam <= "12"){
								$jenishari = "Weekday";
								if($pkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$satu);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$satu);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$satu);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$satu);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								} else {
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$dua);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$dua);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$dua);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$dua);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 10000;
								}
							} else {
								$jenishari = "Weekend"; 
									if($pkt==1){
										if($this->input->post('klxs',TRUE)){
											$cekklxs =count($_POST['klxs']);
											$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$satu);
										}
										if($this->input->post('klxl',TRUE)){
														$cekklxl =count($_POST['klxl']);
											$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$satu);
										}
										if($this->input->post('klxg',TRUE)){
											$cekklxg =count($_POST['klxg']);
											$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$satu);
										}
										if($this->input->post('klxbf',TRUE)){
											$cekklxbf =count($_POST['klxbf']);
											$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$satu);
										}
										if( $this->input->post('angg', TRUE)){
											$cekguide = count($_POST['angg']);
											$total_guide = $hargaguide * $cekguide;
										}
										if( $this->input->post('boot_mx', TRUE)){
											$cekmx = count($_POST['boot_mx']);
											$total_mx = $hargamx * $cekmx;
										}
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
									} else {
										if($this->input->post('klxs',TRUE)){
											$cekklxs =count($_POST['klxs']);
											$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$dua);
										}
										if($this->input->post('klxl',TRUE)){
														$cekklxl =count($_POST['klxl']);
											$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$dua);
										}
										if($this->input->post('klxg',TRUE)){
											$cekklxg =count($_POST['klxg']);
											$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$dua);
										}
										if($this->input->post('klxbf',TRUE)){
											$cekklxbf =count($_POST['klxbf']);
											$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$dua);
										}
										if( $this->input->post('angg', TRUE)){
											$cekguide = count($_POST['angg']);
											$total_guide = $hargaguide * $cekguide;
										}
										if( $this->input->post('boot_mx', TRUE)){
											$cekmx = count($_POST['boot_mx']);
											$total_mx = $hargamx * $cekmx;
										}
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
									}
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 20000;
								}
						} 
						//start hari selasa, rabu
						if($namahari=="Tuesday" || $namahari=="Wednesday") {
							$jenishari = "Weekday"; 
								if($pkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$satu);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$satu);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$satu);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$satu);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								} else {
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$dua);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$dua);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$dua);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$dua);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 10000;
								}
						} 
						//start hari sabtu
						else if($namahari!="Monday" && $namahari!="Thursday" && $namahari!="Tuesday" && $namahari!="Wednesday" && $namahari!="Sunday" && $namahari!="Friday"){
							$jenishari = "Weekend";
							if($pkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$satu);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$satu);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$satu);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$satu);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								} else {
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$dua);
									}
									if($this->input->post('klxl',TRUE)){
													$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$dua);
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$dua);
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$dua);
									}
									if( $this->input->post('angg', TRUE)){
										$cekguide = count($_POST['angg']);
										$total_guide = $hargaguide * $cekguide;
									}
									if( $this->input->post('boot_mx', TRUE)){
										$cekmx = count($_POST['boot_mx']);
										$total_mx = $hargamx * $cekmx;
									}
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+($jmlp6*$hargaFA)+$total_mx;
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 20000;
								}
						}
					}
					
					$session_data = $this->session->userdata('logged_in');
		    		$data['username'] = $session_data['username'];
					//nama
					$Nama_Peminjam = $this->input->post('napem');
					$this->session->set_userdata('Nama_Peminjam', $Nama_Peminjam);
					//sim
					$No_SIM = $this->input->post('sim');
					$this->session->set_userdata('No_SIM', $No_SIM);
					//ktp
					$No_KTP = $this->input->post('ktp');
					$this->session->set_userdata('No_KTP', $No_KTP);
					//klxs
					if($this->input->post('klxs',TRUE)){
						$this->session->set_userdata('dataklxs', $_POST['klxs']);
					} else {
						$this->session->set_userdata('dataklxs',$this->input->post('klxs'));
					}
					//alamat
					$alamat = $this->input->post('alm');
					$this->session->set_userdata('alamat', $alamat);
					//klxl
					if($this->input->post('klxl',TRUE)){
						$this->session->set_userdata('dataklxl', $_POST['klxl']);
					} else {
						$this->session->set_userdata('dataklxl',$this->input->post('klxl'));
					}
					//jaminan
					$jaminan = $this->input->post('jaminan');
					$this->session->set_userdata('jaminan', $jaminan);
					//klxg
					if($this->input->post('klxg',TRUE)){
						$this->session->set_userdata('dataklxg', $_POST['klxg']);
					} else {
						$this->session->set_userdata('dataklxg',$this->input->post('klxg'));
					}
					//waktu sewa
					$this->session->set_userdata('paket', $pkt);
					//klxbf
					if($this->input->post('klxbf',TRUE)){
						$this->session->set_userdata('dataklxbf', $_POST['klxbf']);
					} else {
						$this->session->set_userdata('dataklxbf',$this->input->post('klxbf'));
					}
					//jaminan
					$tgl = $this->input->post('tgl');
					$this->session->set_userdata('tgl', $tgl);
					//marketing
					$this->session->set_userdata('marketing', $namafeemarketing);
					//harga guide
					$hargag = $this->input->post('hargaguide');
					$this->session->set_userdata('hargaguide', $hargag);

					//guide
					if($this->input->post('angg',TRUE)){
						$this->session->set_userdata('dataangg', $_POST['angg']);
					} else {
						$this->session->set_userdata('dataangg',$this->input->post('angg'));
					}
					//libur
					if($this->input->post('libur',TRUE)){
						$this->session->set_userdata('libur', $_POST['libur']);
					} else {
						$this->session->set_userdata('libur',$this->input->post('libur'));
					}
					//glove
					$glove = $this->input->post('jumlah_pinjaman2');
					$this->session->set_userdata('glove', $glove);
					//jersey
					$jersey = $this->input->post('jumlah_pinjaman4');
					$this->session->set_userdata('jersey', $jersey);
					//knee protector
					$knee_protector = $this->input->post('jumlah_pinjaman3');
					$this->session->set_userdata('knee_protector', $knee_protector);
					//google
					$google = $this->input->post('jumlah_pinjaman5');
					$this->session->set_userdata('google', $google);
					//boot
					$boot = $this->input->post('jumlah_pinjaman1');
					$this->session->set_userdata('boot', $boot);
					//bootmx
					$this->session->set_userdata('hargasatuanbootmx', $hargamx);
					if($this->input->post('boot_mx',TRUE)){
						$this->session->set_userdata('databootmx', $_POST['boot_mx']);
					} else {
						$this->session->set_userdata('databootmx',$this->input->post('boot_mx'));
					}
					//full apparel
					$fullA = $this->input->post('fullapparel');
					$this->session->set_userdata('fullapparel', $fullA);
					//biaya lain
					$this->session->set_userdata('biayalain', $biayalain);
					//jenis hari
					$this->session->set_userdata('jenishari', $jenishari);
					//harga total
					$this->session->set_userdata('hargabootmx', $total_mx);
					$this->session->set_userdata('total_guide', $total_guide);
					$this->session->set_userdata('hargamotor', $hargamotor);
					$this->session->set_userdata('hargaperlengkapan', $hargaperlengkapan);
					$this->session->set_userdata('hargatotal', $hargatotal);
					$this->session->set_userdata('hargafeemarketing', $hargafeemarketing);

					$keterangan = $this->input->post('keterangan');
					$this->session->set_userdata('keterangan', $keterangan);
					redirect('admin/verifikasipinjaman');
				}*/

		}

		public function Detail_Kendaraan($id){
			$detail_kendaraan=$this->master_motor->m_detail_kendataan($id);
			return $detail_kendaraan;
		}
		/*public function odp($id_perlengkapan){
			$this->dp->ddp($id_perlengkapan);
			redirect('admin/kelola_barang');
		}*/
		
	}
?>