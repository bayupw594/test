<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');

	class Peminjamanlunas extends CI_Controller {
		function __construct(){
			parent:: __construct();
			$this->load->model("p");
			$this->load->model("detp");
			$this->load->model("detailpm");
			$this->load->model("dm");
			$this->load->model("dp");	
			$this->load->model("mpengembalian");
			$this->load->model("pembayaran");
			$this->load->model("kass");
			$this->load->model("prosespengembalian");
			$this->load->model('hs');
			$this->load->model('hb');
			$this->load->model('h');
			$this->load->library( 'form_validation' );
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
		   	if(intval($user_data['level']) == 1 ) {
		    	$session_data = $this->session->userdata('logged_in');
		    	$data['username'] = $session_data['username'];
		    	$data['cp'] = $this->p->l();
		    	$this->load->view('admin/peminjamanlunas', $data);
		   	} else if (intval($user_data['level']) == 2){
		    	redirect('peminjamanlunas','refresh');
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		public function lihatpin($idpinjam) {
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			$data['motor'] = $this->detailpm->liatdata($idpinjam);
			$data['perlengkapan'] = $this->detp->liatdata($idpinjam);
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			$data['jmlbarang'] = $this->dp->getdata();
			$data['mx'] = $this->detp->dx($idpinjam);
			$data['anggota'] = $this->p->lihatanggota($idpinjam);
			$data['guide'] = $this->pembayaran->lihatguide( $idpinjam );
			$this->load->view('admin/lihatpin',$data);
		}

		public function detpin($idpinjam) {
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			$data['motor'] = $this->detailpm->liatdata($idpinjam);
			$data['perlengkapan'] = $this->detp->liatdata($idpinjam);
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			$this->load->view('admin/lihatpin',$data);
		}
		
		public function peng(){
			$session_data = $this->session->userdata('logged_in');
		    $username = $session_data['username'];
		    
			$idpinjam = $this->input->post('id_pinjam');
			
			$JB1      = $this->input->post('Boot');
			$JB2      = $this->input->post('Jml_Boot');
			$JJ1      = $this->input->post('Jersey');
			$JJ2      = $this->input->post('Jml_Jersey');
			$JBP1     = $this->input->post('Body_Protector');
			$JBP2     = $this->input->post('Jml_Body_Protector');
			$JKP1     = $this->input->post('Knee_Protector');
			$JKP2     = $this->input->post('Jml_Knee_Protector');
			$JG1      = $this->input->post('Google');
			$JG2      = $this->input->post('Jml_Google');
			$JB       = $JB1  + $JB2;
			$JJ       = $JJ1  + $JJ2;
			$JBP      = $JBP1 + $JBP2;
			$JKP      = $JKP1 + $JKP2;
			$JG       = $JG1  + $JG2;
			$cekklxs  = count($_POST['klxs']);
			$cekklxl  = count($_POST['klxl']);
			$cekklxg  = count($_POST['klxg']);
			$cekklxbf  = count($_POST['klxbf']);
			$cekbootmx = count($_POST['boot_mx']);
			$B        = "B";
			$J        = "J";
			$BP       = "GL";
			$KP       = "KP";
			$G        = "G";
			$kondisi  = "baik";

			//mengambil data harga marketing
			$data['harga'] = $this->pembayaran->liatdatadetail($idpinjam);
			foreach( $data['harga']->result() as $rego ){
				$marketing = $rego->harga_marketing;
			}

			//mengambil data weekday / weekend
			$data['peminjaman'] = $this->p->liatdata($idpinjam);
			foreach( $data['peminjaman']->result() as $pinjam ){
				$jenishari = $pinjam->jenis_hari;
			}
			
			$jumlah = $cekklxs + $cekklxl + $cekklxg + $cekklxbf;
			if( $jenishari == "Weekday" ){
				$kas = $jumlah * 20000;
				$fee = $jumlah * 10000;
			} else if ( $jenishari == "Weekend" ){
				$kas = $jumlah * 20000;
				$fee = $jumlah * 10000;
			}

			if($this->input->post('kembali',TRUE)){
				if($this->input->post('telat',TRUE)){ // jika telat
					//update klxs
					if($cekklxs > 0){
						foreach($_POST['klxs'] as $klxs) {
							$nomer_registrasi = $klxs;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxl
					if($cekklxl > 0){
						foreach($_POST['klxl'] as $klxl) {
							$nomer_registrasi = $klxl;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxg
					if($cekklxg > 0){
						foreach($_POST['klxg'] as $klxg) {
							$nomer_registrasi = $klxg;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxbf
					if($cekklxbf > 0){
						foreach($_POST['klxbf'] as $klxbf) {
							$nomer_registrasi = $klxbf;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update status data peminjaman
					$data = array(
						'status' => "Kembali"
					);
					$this->p->udpin($data,$idpinjam);
					//update jml barang
					//BOOT
					if($JB2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JB
						);
						$this->dp->updatedata($B,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JB,
							'Status' => "Ada"
						);
						$this->dp->updatedata($B,$kondisi,$data);
					}
					//JERSEY
					if($JJ2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JJ
						);
						$this->dp->updatedata($J,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JJ,
							'Status' => "Ada"
						);
						$this->dp->updatedata($J,$kondisi,$data);
					}
					//BODY PROTECTOR
					if($JBP2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JBP
						);
						$this->dp->updatedata($BP,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JBP,
							'Status' => "Ada"
						);
						$this->dp->updatedata($BP,$kondisi,$data);
					}
					//KNEE PROTECTOR
					if($JKP2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JKP
						);
						$this->dp->updatedata($KP,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JKP,
							'Status' => "Ada"
						);
						$this->dp->updatedata($KP,$kondisi,$data);
					}
					//GOOGLE
					if($JG2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JG
						);
						$this->dp->updatedata($G,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JG,
							'Status' => "Ada"
						);
						$this->dp->updatedata($G,$kondisi,$data);
					}
					//BOOT MX 
					if($cekbootmx > 0){
						foreach($_POST['boot_mx'] as $bx) {
							
							$data = array(
								'Status' => "Ada"
							);
							$this->detp->udx($bx,$data);
						}
					}

					//denda
					$lamatelat = $this->input->post("jam");
					$hargatelat = $this->input->post("harga_telat");
					$lain_lain = $this->input->post("lain_lain");
					$totaldenda = $lamatelat * $hargatelat + $lain_lain;
					$data = array(
						'Id_Peminjamanan' => $idpinjam,
						'Tanggal_kembali' => $this->input->post('tgl_kembali'),
						'Jam' => $lamatelat,
						'Harga' => $hargatelat,
						'Jumlah_Denda' => $totaldenda,
						'biaya_lain' => $this->input->post('biaya_lain_lain'),
						'keterangan' =>$this->input->post('ket_kembali')
					);

					//input kas
					$data_kas = [
						'jenis_kas' => "peminjaman",
						'kas_masuk' => $kas,
						'kas_sebelum' => $this->kass->kas_sebelum(),
						'total' => $kas + $this->kass->kas_sebelum(),
						'tanggal' => date("Y-m-d H:i"),
						'admin' => $username,
						'id_peminjamanan' => $idpinjam
					];
					$this->kass->kas_masuk($data_kas); //input kas

					//jika marketing kosong, di input ke kas
					if ( $marketing == "0" ){
						$data_marketing = [
							'jenis_kas' => "marketing",
							'kas_masuk' => $fee,
							'kas_sebelum' => $this->kass->kas_sebelum(),
							'total' => $fee + $this->kass->kas_sebelum(),
							'tanggal' => date("Y-m-d H:i"),
							'admin' => $username,
							'id_peminjamanan' => $idpinjam
						];
						$this->kass->kas_masuk($data_marketing); //input kas marketing
					}
					

					$data_denda =[
						'jenis_kas' => "denda",
						'kas_masuk' => $totaldenda,
						'kas_sebelum' => $this->kass->kas_sebelum(),
						'total' => $totaldenda + $this->kass->kas_sebelum(),
						'tanggal' => date("Y-m-d H:i"),
						'admin' => $username,
						'id_peminjamanan' => $idpinjam
					];
					
					$this->kass->kas_masuk($data_denda); //input denda
					$this->prosespengembalian->savedata($data);
					redirect('admin/pengembalian');
				} else { // jika tepat waktu
					//update klxs
					if($cekklxs > 0){
						foreach($_POST['klxs'] as $klxs) {
							$nomer_registrasi = $klxs;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxl
					if($cekklxl > 0){
						foreach($_POST['klxl'] as $klxl) {
							$nomer_registrasi = $klxl;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxg
					if($cekklxg > 0){
						foreach($_POST['klxg'] as $klxg) {
							$nomer_registrasi = $klxg;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxbf
					if($cekklxbf > 0){
						foreach($_POST['klxbf'] as $klxbf) {
							$nomer_registrasi = $klxbf;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update status data peminjaman
					$data = array(
						'status' => "Kembali"
					);
					$this->p->udpin($data,$idpinjam);
					//update jml barang
					//BOOT
					if($JB2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JB
						);
						$this->dp->updatedata($B,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JB,
							'Status' => "Ada"
						);
						$this->dp->updatedata($B,$kondisi,$data);
					}
					//JERSEY
					if($JJ2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JJ
						);
						$this->dp->updatedata($J,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JJ,
							'Status' => "Ada"
						);
						$this->dp->updatedata($J,$kondisi,$data);
					}
					//BODY PROTECTOR
					if($JBP2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JBP
						);
						$this->dp->updatedata($BP,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JBP,
							'Status' => "Ada"
						);
						$this->dp->updatedata($BP,$kondisi,$data);
					}
					//KNEE PROTECTOR
					if($JKP2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JKP
						);
						$this->dp->updatedata($KP,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JKP,
							'Status' => "Ada"
						);
						$this->dp->updatedata($KP,$kondisi,$data);
					}
					//GOOGLE
					if($JG2 > "0"){
						$data = array(
							'jumlah_perlengkapan' => $JG
						);
						$this->dp->updatedata($G,$kondisi,$data);
					} else {
						$data = array(
							'jumlah_perlengkapan' =>$JG,
							'Status' => "Ada"
						);
						$this->dp->updatedata($G,$kondisi,$data);
					}
					$data = array(
						'Id_Peminjamanan' => $idpinjam,
						'Tanggal_kembali' => $this->input->post('tgl_kembali'),
						'Jam' => "0",
						'Harga' => "0",
						'Jumlah_Denda' => "0",
						'biaya_lain' => $this->input->post('biaya_lain_lain'),
						'keterangan' =>$this->input->post('ket_kembali')
					);
					//input kas
					$data_kas = [
						'jenis_kas' => "peminjaman",
						'kas_masuk' => $kas,
						'kas_sebelum' => $this->kass->kas_sebelum(),
						'total' => $kas + $this->kass->kas_sebelum(),
						'tanggal' => date("Y-m-d H:i"),
						'admin' => $username,
						'id_peminjamanan' => $idpinjam
					];
					$this->kass->kas_masuk($data_kas); //input kas

					//jika marketing kosong, di input ke kas
					if ( $marketing == "0" ){
						$data_marketing = [
							'jenis_kas' => "marketing",
							'kas_masuk' => $fee,
							'kas_sebelum' => $this->kass->kas_sebelum(),
							'total' => $fee + $this->kass->kas_sebelum(),
							'tanggal' => date("Y-m-d H:i"),
							'admin' => $username,
							'id_peminjamanan' => $idpinjam
						];
						$this->kass->kas_masuk($data_marketing);
					}

					$this->prosespengembalian->savedata($data);
					redirect('admin/pengembalian');
				}
			} /*else {
				redirect('admin/peminjaman_view');
			}
			*/
			//ganti waktu sewa
			$date=$this->input->post('tgl_kembali');
			$namahari = date('l', strtotime($date));
			$jam = date('H', strtotime($date));
			$tmbhpkt = $this->input->post('tambahanpaket');
			$Weekday="Weekday";
			$Weekend="Weekend";
			$satu="12";
			$dua="24";
			$tiga="";
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
			$pakettotal = 0;
			$paket = $this->input->post('paket');
			$hargamotordua = 0;
			$hargatotal = 0;
			$hargaperlengkapan = $this->input->post('hargaperlengkapan');
			$hargamarketing = $this->input->post('hargamarketing');
			$hargaguide = $this->input->post('hargaguide');
			//start perpanjangan
			if($this->input->post('perpanjangan',TRUE)){
				echo "perpanjangan";
				//start hari libur
				if($this->input->post('libur',true)){
					$jenishari = "Weekend"; 
					if($tmbhpkt==1){
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
						$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
						$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
						
							
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
						
						$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
						$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
					}
				}  // end hari libur
				else {
					//start hari senin, kamis
					if($namahari=="Monday" ||$namahari=="Thursday" ){
						$jenishari = "Weekday"; 
						if($tmbhpkt==1){
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
							$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
							
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
							
							$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
							$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
						}
					} //end hari senin, kamis
					//start hari minggu
						if($namahari=="Sunday"){ 
							if( $jam < "18"){
								$jenishari = "Weekend";
								if($tmbhpkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekend,$satu);	
										echo "klxs : $hargaklxs";
									}
									if($this->input->post('klxl',TRUE)){
										$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekend,$satu);
										echo " klxl : $hargaklxl";
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekend,$satu);
										echo "klxg : $hargaklxg";
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekend,$satu);
										echo "klxbf : $hargaklxbf";
									}
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
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
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
								}
							} else {
								$jenishari = "Weekday";
								if($tmbhpkt==1){
									if($this->input->post('klxs',TRUE)){
										$cekklxs =count($_POST['klxs']);
										$hargaklxs=$this->hs->harga($tipeklxs,$Weekday,$satu);	
										echo "klxs : $hargaklxs";
									}
									if($this->input->post('klxl',TRUE)){
										$cekklxl =count($_POST['klxl']);
										$hargaklxl=$this->hs->harga($tipeklxl,$Weekday,$satu);
										echo " klxl : $hargaklxl";
									}
									if($this->input->post('klxg',TRUE)){
										$cekklxg =count($_POST['klxg']);
										$hargaklxg=$this->hs->harga($tipeklxg,$Weekday,$satu);
										echo "klxg : $hargaklxg";
									}
									if($this->input->post('klxbf',TRUE)){
										$cekklxbf =count($_POST['klxbf']);
										$hargaklxbf=$this->hs->harga($tipeklxbf,$Weekday,$satu);
										echo "klxbf : $hargaklxbf";
									}
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
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
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
								}
							}
						}		
						//start hari jum'at
						if($namahari=="Friday"){  
							if($jam <= "12"){
								$jenishari = "Weekday";
									if($tmbhpkt==1){
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
										$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
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
										$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
									}
							} else {
								$jenishari = "Weekend"; 
									if($tmbhpkt==1){
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
										$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
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
										$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
										$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
									}
								}
						} //end hari jum'at
						//start hari selasa, rabu
						if($namahari=="Tuesday" || $namahari=="Wednesday") {
							$jenishari = "Weekday"; 
								if($tmbhpkt==1){
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
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
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
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
								}
						} //end selasa, rabu
						//start hari sabtu
						else if($namahari!="Monday" && $namahari!="Thursday" && $namahari!="Tuesday" && $namahari!="Wednesday" && $namahari!="Sunday" && $namahari!="Friday"){
							$jenishari = "Weekend";
								if($tmbhpkt==1){
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
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
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
									$hargamotordua = ($cekklxs*$hargaklxs)+($cekklxl*$hargaklxl)+($cekklxg*$hargaklxg)+($cekklxbf*$hargaklxbf);
									$hargatotal = $hargaguide+$hargamarketing+$hargaperlengkapan+$hargamotordua;
								}
						} //end hari sabtu
				} //end selain hari libur
				$data = array(
					'harga_motor' => "$hargamotordua",
					'total' => "$hargatotal"
				);
				$this->pembayaran->update($data,$idpinjam);
				
				$data1 = array(
						'paket' => $tmbhpkt
				);
				$this->p->udpin($data1,$idpinjam);
				redirect('admin/peminjaman_view');
			}//end perpanjangan
		}
	}
	
?>