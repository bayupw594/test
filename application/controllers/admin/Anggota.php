<?php if ( ! defined( 'BASEPATH')) exit('No Direct Script Access Allowed !');
	
	class Anggota extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('manggota');
			$this->load->library('form_validation');
		}
		
		function index() {
			$user_data = $this->session->userdata('logged_in');
			$session_data = $this->session->userdata('logged_in');
	    	$data['username'] = $session_data['username'];
	    	$data['anggota'] = $this->manggota->lihat_anggota();
	    	$data['nama'] = $this->manggota->kel_motor();

			if( intval( $user_data['level'] ) == 1 ) {
		    	$this->load->view( 'admin/anggota', $data );
		   	} else if ( intval($user_data['level']) == 2 ){
		    	redirect( 'anggota', 'refresh' );
		   	} else {
		   		redirect( 'login' , 'refresh' );
		   	}
		}

		function ins_anggota(){
			$this->form_validation->set_rules('nama_anggota', "Nama Anggota", "required|trim|xss_clean");
			$this->form_validation->set_rules('nomor_hp', "Nomor HP", "required|trim|xss_clean");
			$this->form_validation->set_rules('jenis', "Jenis Keanggotaan", "required|trim|xss_clean");

			if ( $this->form_validation->run('admin/anggota/ins_anggota') == FALSE ){
				redirect('admin/anggota');
			} else {
				$data = [
					'nama_anggota' => $this->input->post('nama_anggota'),
					'nomor_hp' => $this->input->post('nomor_hp'),
					'jenis' => $this->input->post('jenis')
				];

				$this->manggota->ins_anggota($data);
				$this->session->set_flashdata('msg', 'Anggota Baru Berhasil Di Input');
				redirect('admin/anggota');
				return TRUE;
			}
		}

		function l_update_anggota($id) {
			$data['listanggota'] = $this->manggota->l_update_anggota($id);
			$this->load->view('admin/updateanggota', $data);
		}

		function update_anggota($id_anggota){
			$data = [
				'id_anggota' => $this->input->post('id_anggota'),
				'nama_anggota' => $this->input->post('nama_anggota'),
				'nomor_hp' => $this->input->post('nomor_hp'),
				'jenis' => $this->input->post('jenis')
			];

			$condition = $this->input->post('id_anggota');
			$this->manggota->update($data, $condition);
			echo '<script>alert("Data Berhasil Di Update");</script>';
			redirect('admin/anggota');
			return TRUE;					
		}

		function del($id_anggota) {
			$this->manggota->delete($id_anggota);
			redirect('admin/anggota');
		}

		function lihat_profit( $id_anggota ){
			$lapor['listanggota'] = $this->manggota->modal_anggota( $id_anggota );
			$this->load->view( "admin/modal_anggota", $lapor );
		}

		function gaji_pegawai( $id_anggota ){
			$lapor['listanggota'] = $this->manggota->modal_anggota( $id_anggota );
			$this->load->view( "admin/modal_gaji", $lapor);
		}

		function ngeprint_gaji(){
			$data = [
				'id_anggota' => $this->input->post('nama_anggota'),
				'tgl_1' => $this->input->post('tgl_1'),
				'tgl_2' => $this->input->post('tgl_2')
			];

			$nama = $data['id_anggota'];
			$tgl_1 = $data['tgl_1'];
			$tgl_2 = $data['tgl_2'];

			$lapor['tgl'] = array($tgl_1, $tgl_2);
			$lapor['anggota'] = $this->manggota->anggota($nama);
			$lapor['jumlah_motor'] = $this->manggota->jumlah_motor($nama, $tgl_1, $tgl_2);

			// untuk anggota
			foreach ($lapor['anggota']->result() as $angg){
				$nama_anggota = $angg->nama_anggota;
				$nomor_hp = $angg->nomor_hp;
				$profit = $angg->profit;
				$jenis = $angg->jenis;
			}

			//untuk kalkulasi harga motor dan kas
			$klxs = 0;
			$klxl = 0;
			$klxg = 0;
			$klxbf = 0;
			$kas = 0;
			$fee_anggota_lain = 0;

			foreach ($lapor['jumlah_motor']->result() as $motor) {
				if( $motor->paket == "1" ){
					if( $motor->tipe_motor == "KLXS" ) {
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("12", "KLXS", "Weekday");		
							$klxs += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("12", "KLXS", "Weekend");		
							$klxs += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == ""){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} else if ( $motor->tipe_motor == "KLXL" ){
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("12", "KLXL", "Weekday");		
							$klxl += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("12", "KLXL", "Weekend");		
							$klxl += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} else if ( $motor->tipe_motor == "KLXG" ){
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("12", "KLXG", "Weekday" );		
							$klxg += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("12", "KLXG", "Weekend");		
							$klxg += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} else if ( $motor->tipe_motor == "KLXBF"){
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("12", "KLXBF", "Weekday");		
							$klxbf += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == ""){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("12", "KLXBF", "Weekend");		
							$klxbf += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == ""){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} //end if 12 jam
				} else if( $motor->paket == "2" ){
					if( $motor->tipe_motor == "KLXS" ) {
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("24", "KLXS", "Weekday");		
							$klxs += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("24", "KLXS", "Weekend");		
							$klxs += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == ""){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} else if ( $motor->tipe_motor == "KLXL" ){
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("24", "KLXL", "Weekday");		
							$klxl += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("24", "KLXL", "Weekend");		
							$klxl += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} else if ( $motor->tipe_motor == "KLXG" ){
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("24", "KLXG", "Weekday" );		
							$klxg += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("24", "KLXG", "Weekend");		
							$klxg += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == "" ){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					} else if ( $motor->tipe_motor == "KLXBF"){
						if ( $motor->jenis_hari == "Weekday" ){
							$harga_m = $this->manggota->harga_motor("24", "KLXBF", "Weekday");		
							$klxbf += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == ""){
								$kas += 10000;
							} else {
								$fee_anggota_lain += 10000;
							}
						} else {
							$harga_m = $this->manggota->harga_motor("24", "KLXBF", "Weekend");		
							$klxbf += $harga_m;
							$kas += 20000;
							if ( $motor->marketing == ""){
								$kas += 20000;
							} else {
								$fee_anggota_lain += 20000;
							}
						}
					}
				} //end if 24 jam
								
				$total = $klxs + $klxl + $klxg + $klxbf;
			}
			
			$lapor['harga_motor'] = $total - $kas - $fee_anggota_lain;
			$lapor['gaji_pegawai'] = $lapor['harga_motor'] * 0.1;
			
			$this->load->view('laporan/print_gaji', $lapor);

		}
		
		function ngeprint() {
			$this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim|xss_clean');
			$this->form_validation->set_rules('tgl_1', 'Dari', 'required|trim|xss_clean');
			$this->form_validation->set_rules('tgl_2', 'Hingga', 'required|trim|xss_clean');

			if ($this->form_validation->run('admin/anggota/ngeprint') == FALSE ){
				redirect('admin/anggota', 'refresh');
			} else {
				$data = [
					'id_anggota' => $this->input->post('nama_anggota'),
					'tgl_1' => $this->input->post('tgl_1'),
					'tgl_2' => $this->input->post('tgl_2')
				];

				$nama = $data['id_anggota'];
				$tgl_1 = $data['tgl_1'];
				$tgl_2 = $data['tgl_2'];

				$lapor['tgl'] = array($tgl_1, $tgl_2);
				$lapor['anggota'] = $this->manggota->anggota($nama);
				$lapor['jumlah_motor'] = $this->manggota->jumlah_motor($nama, $tgl_1, $tgl_2);
				$lapor['maintanence'] = $this->manggota->maintanence($nama, $tgl_1, $tgl_2);
				$lapor['detail_maintanence'] = $this->manggota->detail_maintanence($nama, $tgl_1, $tgl_2);
				$lapor['guide'] = $this->manggota->guide($nama, $tgl_1, $tgl_2);
				$lapor['marketing'] = $this->manggota->marketing($nama, $tgl_1, $tgl_2);
				$lapor['boot_mx'] = $this->manggota->boot_mx($nama, $tgl_1, $tgl_2);
				
				$total = 0;
				$fee_anggota_lain = 0;
				$kas = 0;
				$fee = 0;

				// untuk anggota
				foreach ($lapor['anggota']->result() as $angg){
					$nama_anggota = $angg->nama_anggota;
					$nomor_hp = $angg->nomor_hp;
					$profit = $angg->profit;
					$jenis = $angg->jenis;
				}

				//kalkulasi jumlah pendapatan, fee marketing, kas dan fee untuk anggota lain
				$klxs = 0;
				$klxl = 0;
				$klxg = 0;
				$klxbf = 0;
				$kas = 0;

				foreach ($lapor['jumlah_motor']->result() as $motor) {
					//jika peminjaman 12 jam
					if( $motor->paket == "1" ){
						if( $motor->tipe_motor == "KLXS" ) {
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("12", "KLXS", "Weekday");		
								$klxs += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("12", "KLXS", "Weekend");		
								$klxs += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == ""){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} else if ( $motor->tipe_motor == "KLXL" ){
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("12", "KLXL", "Weekday");		
								$klxl += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("12", "KLXL", "Weekend");		
								$klxl += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} else if ( $motor->tipe_motor == "KLXG" ){
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("12", "KLXG", "Weekday" );		
								$klxg += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("12", "KLXG", "Weekend");		
								$klxg += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} else if ( $motor->tipe_motor == "KLXBF"){
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("12", "KLXBF", "Weekday");		
								$klxbf += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == ""){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("12", "KLXBF", "Weekend");		
								$klxbf += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == ""){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} //end if 12 jam
					} else if( $motor->paket == "2" ){
						if( $motor->tipe_motor == "KLXS" ) {
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("24", "KLXS", "Weekday");		
								$klxs += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("24", "KLXS", "Weekend");		
								$klxs += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == ""){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} else if ( $motor->tipe_motor == "KLXL" ){
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("24", "KLXL", "Weekday");		
								$klxl += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("24", "KLXL", "Weekend");		
								$klxl += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} else if ( $motor->tipe_motor == "KLXG" ){
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("24", "KLXG", "Weekday" );		
								$klxg += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("24", "KLXG", "Weekend");		
								$klxg += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == "" ){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						} else if ( $motor->tipe_motor == "KLXBF"){
							if ( $motor->jenis_hari == "Weekday" ){
								$harga_m = $this->manggota->harga_motor("24", "KLXBF", "Weekday");		
								$klxbf += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == ""){
									$kas += 10000;
								} else {
									$fee_anggota_lain += 10000;
								}
							} else {
								$harga_m = $this->manggota->harga_motor("24", "KLXBF", "Weekend");		
								$klxbf += $harga_m;
								$kas += 20000;
								if ( $motor->marketing == ""){
									$kas += 20000;
								} else {
									$fee_anggota_lain += 20000;
								}
							}
						}
					} //end if 24 jam
					
					$total = $klxs + $klxl + $klxg + $klxbf;
				} 

				//untuk kalkulasi biaya maintanence
				$maintenis = 0;
				foreach ($lapor['maintanence']->result() as $maintain) {
					$maintenis += $maintain->service;					
				}

				foreach ($lapor['detail_maintanence']->result() as $maintain) {
					$maintenis += $maintain->sub_total;					
				}
				//untuk kalkulasi pendapatan guide
				$harga_guide = 0;
				foreach( $lapor['guide']->result() as $guide) {
					$harga_guide += $guide->harga_per_orang;
				}
				//untuk kalkulasi pendapatan marketing
				foreach( $lapor['marketing']->result() as $market){
					$fee += $market->harga_marketing;
				}
				//untuk kalkulasi pendapatan bootmx
				$harga_boot = 0;
				foreach( $lapor['boot_mx']->result() as $bx){
					$harga_boot += $bx->harga_per_boot;
				}

				$lapor['harga_motor'] = $total;
				$lapor['kas'] = $kas;
				$lapor['fee'] = $fee;
				$lapor['fee_anggota_lain'] = $fee_anggota_lain;
				$lapor['sub_pendapatan'] = $total - $lapor['kas'] + $fee - $fee_anggota_lain;
				$lapor['sub_maintain'] = $maintenis;
				$lapor['sub_guide'] = $harga_guide;
				$lapor['sub_boot'] = $harga_boot;
				$lapor['kekurangan'] = $profit;
				$lapor['grand_total'] = $lapor['sub_pendapatan'] - $lapor['sub_maintain'] + $lapor['sub_guide'] + $lapor['sub_boot'] + $lapor['kekurangan'];

				//kalkulasi jika grand_total hasilnya minus
				if( $lapor['grand_total'] < 0 ){
					$profit = $lapor['grand_total'];
					$data = [
						'id_anggota' => $nama,
						'nama_anggota' => $nama_anggota,
						'nomor_hp' => $nomor_hp,
						'profit' => $profit
					];
					$this->manggota->grand_minus($nama, $data);
				} else if ( $lapor['grand_total'] >= 0 && $profit < 0 ){
					$profit = '0';
					$data = [
						'id_anggota' => $nama,
						'nama_anggota' => $nama_anggota,
						'nomor_hp' => $nomor_hp,
						'profit' => $profit
					];
					$this->manggota->grand_minus($nama, $data);
				}

				// jika investor
				if ($jenis == "Investor") {
					$invest = 0;
					$lapor['jumlah_motor'] = $this->manggota->profit_investor( $nama );
					$lapor['maintanence'] = $this->manggota->maintanence($nama, $tgl_1, $tgl_2);

					foreach ($lapor['jumlah_motor']->result() as $inv) {
						$invest += count($inv->No_Registrasi) * 750000;
					}

					//untuk kalkulasi biaya maintanence
					$maintenis = 0;
					foreach ($lapor['maintanence']->result() as $maintain) {
						$maintenis += $maintain->sub_total;					
					}

					$lapor['sub_maintain'] = $maintenis;
					$lapor['harga_motor'] = $invest - $maintenis;
					$this->load->view('laporan/print_investor', $lapor);
				} else { // jika anggota 
					$this->load->view('laporan/print_profit1', $lapor);
				}
			}
		}
	}
	
?>