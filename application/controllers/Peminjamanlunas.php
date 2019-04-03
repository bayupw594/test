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
			$this->load->model("prosespengembalian");
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['cp'] = $this->p->l();
		   	if(intval($user_data['level']) == 1 ) {
	    		redirect('admin/peminjamanlunas', 'refresh');
		   	} else if (intval($user_data['level']) == 2){
		    	$this->load->view('peminjamanlunas', $data);
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
			$BP       = "BP";
			$KP       = "KP";
			$G        = "G";
			$kondisi  = "baik";

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
							$nomer_registrasi = $klxl;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxbf
					if($cekklxbf > 0){
						foreach($_POST['klxbf'] as $klxg) {
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
					//denda
					$lamatelat = $this->input->post("jam");
					$hargatelat = $this->input->post("harga_telat");
					$totaldenda = $lamatelat * $hargatelat;
					$data = array(
							'Id_Peminjamanan' => $idpinjam,
							'Tanggal_kembali' => $this->input->post('tgl_kembali'),
							'Jam' => $lamatelat,
							'Harga' => $hargatelat,
							'Jumlah_Denda' => $totaldenda
					);
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
							$nomer_registrasi = $klxl;
							$data = array(
								'Status' => "Ada"
							);
							$this->dm->update($data,$nomer_registrasi);
						}
					}
					//update klxbf
					if($cekklxbf > 0){
						foreach($_POST['klxbf'] as $klxg) {
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
							'Jumlah_Denda' => "0"
					);
					$this->prosespengembalian->savedata($data);
					redirect('admin/peminjaman_view');
				}
			} else {
				redirect('admin/peminjaman_view');
			}
		}
	}
	
?>