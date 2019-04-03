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
			$this->load->library( 'form_validation' );
		}

		function index() {
			
			$user_data = $this->session->userdata('logged_in');
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
		   	if(intval($user_data['level']) == 1 ) {
		    	redirect('admin/peminjaman','refresh');
		   	} else if (intval($user_data['level']) == 2){
		    	$session_data = $this->session->userdata('logged_in');
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
				$data['boot_mx'] = $this->dp->lihat_mx();
				$data['anggota'] = $this->manggota->lihat_anggota();
		    	$this->load->view('peminjaman', $data);
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}
		public function ps(){
				
				$this->form_validation->set_rules('napem', 'Nama Peminjam', 'required|trim|xss_clean');
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
		    	$this->form_validation->set_rules('hargaguide', "Harga Guide", "trim|xss_clean");
		    	$this->form_validation->set_rules('jumlah_pinjaman1', 'Boots', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman2', 'Body Protector', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman3', 'Knee Protector', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman4', 'Jersey', 'trim|xss_clean');
		    	$this->form_validation->set_rules('jumlah_pinjaman5', 'Google', 'trim|xss_clean');
		    	$this->form_validation->set_rules('libur[]', 'Hari Libur', 'trim|xss_clean|isset');
		    	$this->form_validation->set_rules("boot_mx[]", "Boot MX / Oneal", "trim|xss_clean");
		    	$this->form_validation->set_rules("hargamx", "Harga Boot MX", "trim|xss_clean");

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
					$hargaguide = $this->input->post('hargaguide');
					$hargamx = $this->input->post("hargamx");
					$biayalain = $this->input->post("biayalain");
					$B  = "B";
					$J  = "J";
					$G  = "G";
					$KP = "KP";
					$BP = "GL";
					$hargaB  =0;
					$hargaJ  =0;
					$hargaG  =0;
					$hargaKP =0;
					$hargaBP =0;
					$jmlp1 = 0;
					$jmlp2 = 0;
					$jmlp3 = 0;
					$jmlp4 = 0;
					$jmlp5 = 0;
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

							$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
							$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
							$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
							$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 10000;
								}
						}
						//start hari minggu
						if($namahari=="Sunday"){  
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx;
								}
								if ( $namafeemarketing == "" ){
									$hargafeemarketing = 0;
								} else {
									$hargafeemarketing = ( $cekklxs + $cekklxl + $cekklxg + $cekklxbf ) * 20000;
								}
						}
					}
					//insert to tabel peminjaman
					$data = array(
									'Nama_Peminjam' => $this->input->post('napem'),
									'No_KTP' => $this->input->post('ktp'),
									'No_SIM' => $this->input->post('sim'),
									'Alamat' => $this->input->post('alm'),
									'paket' => $pkt,
									'jaminan' => $this->input->post('jaminan'),
									'Tanggal' => $this->input->post('tgl'),
									'jenis_hari' => $jenishari,
									'guide' => $this->input->post('namaguide'),
									'marketing' => $this->input->post('namafeemarketing'),
									'status' => "pinjam"
								);
					$idpinjam =$this->p->prosespinjam($data);
					$det1 = array(
						'Id_Peminjamanan' => $idpinjam,
						'jenis_perlengkapan' => $B,
						'jumlah_perlengkapan' => $jmlp1
					);
					$this->detp->sdp($det1);
					$det2 = array(
						'Id_Peminjamanan' => $idpinjam,
						'jenis_perlengkapan' => $BP ,
						'jumlah_perlengkapan' => $jmlp2
			 		);
					$this->detp->sdp($det2);
					$det3 = array(
						'Id_Peminjamanan' => $idpinjam,
						'jenis_perlengkapan' => $KP ,
						'jumlah_perlengkapan' => $jmlp3
					);
					$this->detp->sdp($det3);
					$det4 = array(
						'Id_Peminjamanan' => $idpinjam,
						'jenis_perlengkapan' => $J ,
						'jumlah_perlengkapan' => $jmlp4
					);
					$this->detp->sdp($det4);
					$det5 = array(
						'Id_Peminjamanan' => $idpinjam,
						'jenis_perlengkapan' => $G ,
						'jumlah_perlengkapan' => $jmlp5
					);
					$this->detp->sdp($det5);
					if($this->input->post('jumlah_pinjaman1')!=0){
						//mengurangi jml b
						$jap1 = $jmlb-$jmlp1;
						$jumlahb = array(
							'jumlah_perlengkapan' => $jap1
						);
						$this->dp->ujp($B,$jumlahb);
					}
					if($this->input->post('jumlah_pinjaman2')!=0){
						//mengurangi jml bp
						$jap2 = $jmlbp-$jmlp2;
						$jumlahbp = array(
							'jumlah_perlengkapan' => $jap2
						);
						$this->dp->ujp($BP,$jumlahbp);
					}
					if($this->input->post('jumlah_pinjaman3')!=0){
						//mengurangi jml kp
						$jap3 = $jmlkp-$jmlp3;
						$jumlahkp = array(
							'jumlah_perlengkapan' => $jap3
						);
						$this->dp->ujp($KP,$jumlahkp);
					}
					if($this->input->post('jumlah_pinjaman4')!=0){
						//mengurangi jml j
						$jap4 = $jmlj-$jmlp4;
						$jumlahj = array(
							'jumlah_perlengkapan' => $jap4
						);
						$this->dp->ujp($J,$jumlahj);
					}
					if($this->input->post('jumlah_pinjaman5')!=0){
						//mengurangi jml g
						$jap5 = $jmlg-$jmlp5;
						$jumlahg = array(
							'jumlah_perlengkapan' => $jap5
						);
						$this->dp->ujp($G,$jumlahg);
					}
						
					//ganti status di motor
					$status = array(
						'Status' => "Pinjam"
					);
					if($this->input->post('klxs',TRUE)){
						foreach($_POST['klxs'] as $klxs) {
							$condition = $klxs;
							$this->dm->udm($status,$condition);
							$dataklxs = array(
								'Id_Peminjamanan' => $idpinjam,
								'nomer_registrasi' => $condition,
								'tipe_motor' => "KLXS"
							);
							$this->detailpm->sdp($dataklxs);
						}
					}
					if($this->input->post('klxl',TRUE)){
						foreach($_POST['klxl'] as $klxl) {
							$condition = $klxl;
							$this->dm->udm($status,$condition);
							$dataklxl = array(
								'Id_Peminjamanan' => $idpinjam,
								'nomer_registrasi' => $condition,
								'tipe_motor' => "KLXL"
							);
							$this->detailpm->sdp($dataklxl);
						}
					}
					if($this->input->post('klxg',TRUE)){
						foreach($_POST['klxg'] as $klxg) {
							$condition = $klxg;
							$this->dm->udm($status,$condition);
							$dataklxg = array(
								'Id_Peminjamanan' => $idpinjam,
								'nomer_registrasi' => $condition,
								'tipe_motor' => "KLXG"
							);
							$this->detailpm->sdp($dataklxg);
						}
					}
					if($this->input->post('klxbf',TRUE)){
						foreach($_POST['klxbf'] as $klxg) {
							$condition = $klxg;
							$this->dm->udm($status,$condition);
							$dataklxbf = array(
								'Id_Peminjamanan' => $idpinjam,
								'nomer_registrasi' => $condition,
								'tipe_motor' => "KLXBF"
							);
							$this->detailpm->sdp($dataklxbf);
						}
					}
					if($this->input->post('klxbf',TRUE)){
						foreach($_POST['klxbf'] as $klxg) {
							$condition = $klxg;
							$this->dm->udm($status,$condition);
							$dataklxbf = array(
								'Id_Peminjamanan' => $idpinjam,
								'nomer_registrasi' => $condition,
								'tipe_motor' => "KLXBF"
							);
							$this->detailpm->sdp($dataklxbf);
						}
					}

					//insert detail guide
					if( $this->input->post('angg', TRUE)){
						foreach( $_POST['angg'] as $anggota){
							$dataguide = [
								'id_peminjamanan' => $idpinjam,
								'id_angg' => $anggota,
								'harga_per_orang' => $hargaguide
							];
							$this->detp->idg($dataguide);
						}
					}

					if( $this->input->post('boot_mx', TRUE)){
						foreach( $_POST['boot_mx'] as $bx){
							$this->detp->udx($bx, $status);
							$datamx = [
								'id_peminjamanan' => $idpinjam,
								'id_boot' => $bx,
								'harga_per_boot' => $hargamx
							];
							$this->detp->idm($datamx);
						}
					}	

					//insert harga sementara
					$hargasementara = array(
						'harga' => $hargatotal,
						'harga_motor' => $hargamotor,
						'harga_perlengkapan' => $hargaperlengkapan,
						'harga_boot_mx' => $harga_boot_mx,
						'harga_guide' => $hargaguide,
						'harga_marketing' => $hargafeemarketing,
						'biaya_lain' => $biayalain
					);
					$this->h->savedata($hargasementara);
					redirect('admin/verifikasipinjaman');
				}
		}
		
	}
	
?>