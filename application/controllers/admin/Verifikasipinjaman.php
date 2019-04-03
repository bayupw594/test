<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	class Verifikasipinjaman extends CI_Controller {
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
			$this->load->model('pembayaran');
			$this->load->model('manggota');
			$this->load->library( 'form_validation' );
		}

		function index() {
			$user_data = $this->session->userdata('logged_in');
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
				$id = $this->p->maxid();
				$data['peminjaman'] = $this->p->liatdata($id);
				$data['motor'] = $this->detailpm->liatdata($id);
				$data['perlengkapan'] = $this->detp->liatdata($id);
				$data['harga'] = $this->h->liatdata();
				$data['mx'] = $this->detp->dx($id);
				$data['anggota'] = $this->p->lihatanggota($id);
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
				$data['m_anggota'] = $this->manggota->lihat_anggota();
				
				$data['napem'] = $this->session->userdata('Nama_Peminjam');
				$data['ktp'] = $this->session->userdata('No_KTP');
				$data['sim'] = $this->session->userdata('No_SIM');
				$data['dataklxs'] = $this->session->userdata('dataklxs');
				$data['alamat'] = $this->session->userdata('alamat');
				$data['dataklxl'] = $this->session->userdata('dataklxl');
				$data['jaminan'] = $this->session->userdata('jaminan');
				$data['dataklxg'] = $this->session->userdata('dataklxg');
				$data['paket'] = $this->session->userdata('paket');
				$data['dataklxbf'] = $this->session->userdata('dataklxbf');
				$data['tanggal'] = $this->session->userdata('tgl');
				$data['marketing'] = $this->session->userdata('marketing');
				$data['hargaguide'] = $this->session->userdata('hargaguide');
				$data['dataangg'] = $this->session->userdata('dataangg');
				$data['libur'] = $this->session->userdata('libur');
				$data['glove'] = $this->session->userdata('glove');
				$data['jersey'] = $this->session->userdata('jersey');
				$data['knee_protector'] = $this->session->userdata('knee_protector');
				$data['google'] = $this->session->userdata('google');
				$data['boot'] = $this->session->userdata('boot');
				$data['fullapparel'] = $this->session->userdata('fullapparel');
				$data['databootmx'] = $this->session->userdata('databootmx');
				$data['hargasatuanbootmx'] = $this->session->userdata('hargasatuanbootmx');
				$data['biayalain'] = $this->session->userdata('biayalain');
				$data['jenishari'] = $this->session->userdata('jenishari');
				$data['total_guide'] = $this->session->userdata('total_guide');
				$data['hargabootmx'] = $this->session->userdata('hargabootmx');
				$data['hargamotor'] = $this->session->userdata('hargamotor');
				$data['hargaperlengkapan'] = $this->session->userdata('hargaperlengkapan');
				$data['hargatotal'] = $this->session->userdata('hargatotal');
				$data['hargafeemarketing'] = $this->session->userdata('hargafeemarketing');
				$data['keterangan'] = $this->session->userdata('keterangan');
				//
		    	$this->load->view('admin/verifikasipinjaman', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('verifikasipinjaman','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		public function proses(){
				$this->session->unset_userdata('Nama_Peminjam');
				$this->session->unset_userdata('No_KTP');
				$this->session->unset_userdata('No_SIM');
				$this->session->unset_userdata('dataklxs');
				$this->session->unset_userdata('alamat');
				$this->session->unset_userdata('dataklxl');
				$this->session->unset_userdata('jaminan');
				$this->session->unset_userdata('dataklxg');
				$this->session->unset_userdata('paket');
				$this->session->unset_userdata('dataklxbf');
				
				$this->session->unset_userdata('dataklxs');
				$this->session->unset_userdata('marketing');
				$this->session->unset_userdata('hargaguide');
				$this->session->unset_userdata('dataangg');
				$this->session->unset_userdata('libur');
				$this->session->unset_userdata('glove');
				$this->session->unset_userdata('jersey');
				$this->session->unset_userdata('knee_protector');
				$this->session->unset_userdata('google');
				$this->session->unset_userdata('boot');
				$this->session->unset_userdata('databootmx');
				$this->session->unset_userdata('hargasatuanbootmx');
				$this->session->unset_userdata('biayalain');
				$this->session->unset_userdata('fullapparel');
				$this->session->unset_userdata('jenishari');
				$this->session->unset_userdata('total_guide');
				$this->session->unset_userdata('hargabootmx');
				$this->session->unset_userdata('hargamotor');
				$this->session->unset_userdata('hargaperlengkapan');
				$this->session->unset_userdata('hargatotal');
				$this->session->unset_userdata('hargafeemarketing');
				$this->session->unset_userdata('keterangan');
			if($this->input->post('hitungulang',TRUE)){
				//start prose hitung
				$date=$this->input->post('tgl');
					$this->session->unset_userdata('tgl');
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
					$FA = 0;
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
						$FA = $this->input->post('fullapparel');
						$hargaFA = $FA * 50000;
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

							$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
							$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
							$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
							$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
										$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
										$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
									$hargatotal = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf)+($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_guide+$total_mx+$biayalain+$hargaFA;
									$hargamotor = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargaperlengkapan = ($jmlp1*$hargaB)+($jmlp2*$hargaBP)+($jmlp3*$hargaKP)+($jmlp4*$hargaJ)+($jmlp5*$hargaG)+$total_mx+$hargaFA;
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
					//jaminan
					$marketing = $this->input->post('namafeemarketing');
					$this->session->set_userdata('marketing', $marketing);
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
				//end proses hitung
			} else {
				$this->session->unset_userdata('tgl');
				$pkt = $this->input->post('paket');
				$B  = "B";
				$J  = "J";
				$G  = "G";
				$KP = "KP";
				$BP = "GL";
				$jmlb = $this->input->post('JAB');
				$jmlj = $this->input->post('JAJ');
				$jmlg = $this->input->post('JAG');
				$jmlbp = $this->input->post('JABP');
				$jmlkp = $this->input->post('JAKP');
				$jmlp1 = $this->input->post('jumlah_pinjaman1');
				$jmlp2 = $this->input->post('jumlah_pinjaman2');
				$jmlp3 = $this->input->post('jumlah_pinjaman3');
				$jmlp4 = $this->input->post('jumlah_pinjaman4');
				$jmlp5 = $this->input->post('jumlah_pinjaman5');
				$hargaguide = 350000;
				$hargamx = 50000;


				if($this->input->post('tunai',TRUE) ){
					//
					$data = array(
						'Nama_Peminjam' => $this->input->post('napem'),
						'No_KTP' => $this->input->post('ktp'),
						'No_SIM' => $this->input->post('sim'),
						'Alamat' => $this->input->post('alm'),
						'paket' => $pkt,
						'jaminan' => $this->input->post('jaminan'),
						'Tanggal' => $this->input->post('tgl'),
						'jenis_hari' => $this->input->post('jenishari'),
						'guide' => $this->input->post('namaguide'),
						'marketing' => $this->input->post('namafeemarketing'),
						'status' => "pinjam",
						'keterangan' => $this->input->post('keterangan')
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
					//
					$data = array(
						'Id_Peminjaman' => $idpinjam,
						'tgl_pembayaran_satu' => $this->input->post('tgl'),
						'total' => $this->input->post('hargatotaltunai'),
						'harga_motor' => $this->input->post('hargamotor'),
						'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
						'harga_boot_mx' => $this->input->post('hargabootmx'),
						'harga_guide' => $this->input->post('hargatotalguide'),
						'harga_marketing' => $this->input->post('hargamarketing'),
						'biaya_lain' => $this->input->post('biayalain'),
						'keterangan' => "Tunai"
					);
					$this->pembayaran->savedata($data);
					redirect('admin/peminjaman_view');
				} else if($this->input->post('debit',TRUE) ){
					$this->form_validation->set_rules('nomertransaksi', 'Id Transaksi', 'required|trim|xss_clean');
					if($this->form_validation->run() == FALSE) {
						redirect('admin/verifikasipinjaman');
					} else {
						//
						$data = array(
							'Nama_Peminjam' => $this->input->post('napem'),
							'No_KTP' => $this->input->post('ktp'),
							'No_SIM' => $this->input->post('sim'),
							'Alamat' => $this->input->post('alm'),
							'paket' => $pkt,
							'jaminan' => $this->input->post('jaminan'),
							'Tanggal' => $this->input->post('tgl'),
							'jenis_hari' => $this->input->post('jenishari'),
							'guide' => $this->input->post('namaguide'),
							'marketing' => $this->input->post('namafeemarketing'),
							'status' => "pinjam",
							'keterangan' => $this->input->post('keterangan')
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
						//
						$data = array(
							'Id_Peminjaman' => $idpinjam,
							'tgl_pembayaran_satu' => $this->input->post('tgl'),
							'Nomer_Rekening' => $this->input->post('nomertransaksi'),
							'total' => $this->input->post('hargatotal'),
							'harga_motor' => $this->input->post('hargamotor'),
							'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
							'harga_boot_mx' => $this->input->post('hargabootmx'),
							'harga_guide' => $this->input->post('hargatotalguide'),
							'harga_marketing' => $this->input->post('hargamarketing'),
							'biaya_lain' => $this->input->post('biayalain'),
							'keterangan' => "Debit"
						);

						$this->pembayaran->savedata($data);
						$this->kass->kas_masuk($data_kas);
						redirect('admin/peminjaman_view');
					}	
				} else if($this->input->post('dp',TRUE)){
					$this->form_validation->set_rules('nominal_satudp', 'Nominal Dp Pertama', 'required|trim|xss_clean');
					if($this->form_validation->run() == FALSE) {
						redirect('admin/verifikasipinjaman');
					} else {
						//
						$data = array(
							'Nama_Peminjam' => $this->input->post('napem'),
							'No_KTP' => $this->input->post('ktp'),
							'No_SIM' => $this->input->post('sim'),
							'Alamat' => $this->input->post('alm'),
							'paket' => $pkt,
							'jaminan' => $this->input->post('jaminan'),
							'Tanggal' => $this->input->post('tgl'),
							'jenis_hari' => $this->input->post('jenishari'),
							'guide' => $this->input->post('namaguide'),
							'marketing' => $this->input->post('namafeemarketing'),
							'status' => "pinjam",
							'keterangan' => $this->input->post('keterangan')
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
							foreach($_POST['klxbf'] as $klxbf) {
								$condition = $klxbf;
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
						//
						$total = $this->input->post('hargatotal');
						$bayar = $this->input->post('nominal_satudp');
						$sisa  = $total - $bayar;
						$data = array(
							'Id_Peminjaman' => $idpinjam,
							'tgl_pembayaran_satu' => $this->input->post('tgl'),
							'nominal_pertama' => $this->input->post('nominal_satudp'),
							'harga_motor' => $this->input->post('hargamotor'),
							'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
							'harga_boot_mx' => $this->input->post('hargabootmx'),
							'harga_guide' => $this->input->post('hargatotalguide'),
							'harga_marketing' => $this->input->post('hargamarketing'),
							'biaya_lain' => $this->input->post('biayalain'),
							'sisa' => $sisa,
							'keterangan' => "Dp"
						);
						$this->pembayaran->savedata($data);
						$data = array(
							'status' => "masihdp"
						);
						$this->p->udpin($data,$idpinjam);
						redirect('admin/peminjaman_view');
					}
				} else if($this->input->post('transfer',TRUE) ){
					$this->form_validation->set_rules('nomer_rekening', 'Id Transaksi', 'required|trim|xss_clean');
					if($this->form_validation->run() == FALSE) {
						redirect('admin/verifikasipinjaman');
					} else {
						//
						$data = array(
							'Nama_Peminjam' => $this->input->post('napem'),
							'No_KTP' => $this->input->post('ktp'),
							'No_SIM' => $this->input->post('sim'),
							'Alamat' => $this->input->post('alm'),
							'paket' => $pkt,
							'jaminan' => $this->input->post('jaminan'),
							'Tanggal' => $this->input->post('tgl'),
							'jenis_hari' => $this->input->post('jenishari'),
							'guide' => $this->input->post('namaguide'),
							'marketing' => $this->input->post('namafeemarketing'),
							'status' => "pinjam",
							'keterangan' => $this->input->post('keterangan')
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
								$condition = $klxbf;
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
						//
						$data = array(
							'Id_Peminjaman' => $idpinjam,
							'tgl_pembayaran_satu' => $this->input->post('tgl'),
							'Nomer_Rekening' => $this->input->post('nomer_rekening'),
							'total' => $this->input->post('hargatotaltransfer'),
							'harga_motor' => $this->input->post('hargamotor'),
							'harga_perlengkapan' => $this->input->post('hargaperlengkapan'),
							'harga_boot_mx' => $this->input->post('hargabootmx'),
							'harga_guide' => $this->input->post('hargatotalguide'),
							'harga_marketing' => $this->input->post('hargamarketing'),
							'biaya_lain' => $this->input->post('biayalain'),
							'keterangan' => "Transfer"
						);
						$this->pembayaran->savedata($data);
						redirect('admin/peminjaman_view');
					}
				} else {
					redirect('admin/verifikasipinjaman');
				}
			}
		}
		
		public function lihat($idpinjam) {
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			$data['motor'] = $this->detailpm->liatdata($idpinjam);
			$data['perlengkapan'] = $this->detp->liatdata($idpinjam);
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			$data['jmlbarang'] = $this->dp->getdata();
			$data['guide'] = $this->pembayaran->lihatguide( $idpinjam );
			$data['mx'] = $this->detp->dx($idpinjam);
			$data['anggota'] = $this->p->lihatanggota($idpinjam);
			$this->load->view('admin/lihatdp',$data);
		}
		
	}
	
?>