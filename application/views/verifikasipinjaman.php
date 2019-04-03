<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sawojajar - Dashboard</title>

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/collapse.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Sawojajar</span> Dashboard</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $username ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href=""><span class="glyphicon glyphicon-wrench"></span> Ganti Password</a></li>
							<li><a href=""><span class="glyphicon glyphicon-plus"></span> Tambah User</a></li>
							<li><a href=""><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Administrasi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children" id="sub-item-1">
					<li>
						<a class="" href="<?php echo base_url();?>peminjaman_view">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Pinjaman
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>pengembalian">
							<span class="glyphicon glyphicon-share-alt"></span> Pengembalian
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>anggota">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Data Anggota
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>kelola_motor">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Data Motor
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>kelola_harga_sewa">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Harga Motor
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>kelola_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Data Barang
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>kelola_harga_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Harga Barang
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>kas">
							<span class="glyphicon glyphicon-share-alt"></span> Kas
						</a>
					</li>
				</ul>
			</li>
			<li class="parent">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Laporan <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="<?php echo base_url(); ?>laporan/laporan_pengembalian">
							<span class="glyphicon glyphicon-share-alt"></span> Laporan Omset
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Admin / Verifikasi Peminjaman & Pembayaran</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Verifikasi</h1>
				<div class="panel panel-default">
					<!--div class="panel-heading"></div-->
					<div class="panel-body">
						<input type="checkbox">
							<input type="checkbox">
							<input type="checkbox">
							<?php echo validation_errors() ?>
							<?php echo form_open('verifikasipinjaman/proses'); ?><!--form method="post" action="<?= base_url()?>admin/verifikasipinjaman/proses"-->
			                	<div class="form-group row">
			                		<?php
					                    foreach ($peminjaman->result() as $pinjam) {
					                ?>
								    <label for="ktp" class="col-sm-2 form-control-label">Nama</label>
								    <div class="col-sm-4">
								      	<input type="text" id="napem" class="form-control" placeholder="<?php echo $pinjam->Nama_Peminjam; ?>" readonly="readonly">
								    </div>
								    
								    	<label for="sim" class="col-sm-1 form-control-label">No HP</label>
									    <div class="col-sm-4">
									    	<input class="form-control" type="text" placeholder="<?php echo $pinjam->No_SIM; ?>" readonly="readonly">
									    </div>
									
								</div>
			                    <div class="form-group row">
								 	<label for="napem" class="col-sm-2 form-control-label">No KTP</label>
								    <div class="col-sm-4">
								    	<input class="form-control" type="text" placeholder="<?php echo $pinjam->No_KTP; ?>" readonly="readonly">
								    </div>
								    <?php
								    	}
								    ?>
								    
										<label for="s" class="col-sm-1 form-control-label">KLX S</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#klxss">
													Show Motor Dipinjam<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                            </div>
					                            <div id="klxss" class="collapse">
					                            	<div id="scroll">
								                        <?php
									                        foreach ($motor->result() as $detailmotor) {
									                        	if($detailmotor->tipe_motor=="KLXS"){
									                    ?>
															   <input class="form-control" type="text" placeholder="Nomer Registrasi Motor: <?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
									                     <?php
									                     		} 
									                        }
									                    ?>
									                </div>
												</div>
					                    </div>
									
								</div>
			                    <div class="form-group row">
								    <label for="alm" class="col-sm-2 form-control-label">Alamat</label>
								    <div class="col-sm-4">
								    	<?php
						                    foreach ($peminjaman->result() as $pinjam) {
						                ?>
								      		<textarea type="text" id="alm" class="form-control" placeholder="<?php echo $pinjam->Alamat; ?>" readonly="readonly"></textarea>
								    	<?php
								    		}
								    	?>
								    </div>
								    
									    <label for="l" class="col-sm-1 form-control-label">KLX L</label>
									   <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demol">
													Show Motor Dipinjam<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demol" class="collapse">
					                            	<div id="scroll">
														<?php
									                        foreach ($motor->result() as $detailmotor) {
									                        	if($detailmotor->tipe_motor=="KLXL"){
									                    ?>
															   <input class="form-control" type="text" placeholder="Nomer Registrasi Motor: <?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
									                     <?php
									                     		} 
									                        }
									                    ?>
									                </div>
												</div>
					                    </div>
									
								</div>
								<div class="form-group row">
								    <label for="jaminan" class="col-sm-2 form-control-label">Jaminan</label>
								    <div class="col-sm-4">
								    	<?php
						                    foreach ($peminjaman->result() as $pinjam) {
						                ?>
								      		<input type="text" class="form-control" placeholder="<?php echo $pinjam->jaminan; ?>" readonly="readonly"/>
								     	<?php
								    		}
								    	?>
								    </div>
								    
									    <label for="g" class="col-sm-1 form-control-label">KLX G</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demog">
													Show Motor Dipinjam<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demog" class="collapse">
					                            	<div id="scroll">
													   <?php
									                        foreach ($motor->result() as $detailmotor) {
									                        	if($detailmotor->tipe_motor=="KLXG"){
									                    ?>
															   <input class="form-control" type="text" placeholder="Nomer Registrasi Motor: <?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
									                     <?php
									                     		} 
									                        }
									                    ?>
									                </div>
												</div>
					                    </div>
									
								</div> 
			                    <div class="form-group row">
								    <label for="paket" class="col-sm-2 form-control-label">Waktu Sewa</label>
								    <div class="col-sm-4">
								      	<?php
						                    foreach ($peminjaman->result() as $pinjam) {
						                    	if($pinjam->paket==1){
						                ?>
								      				<input type="text" class="form-control" placeholder="12 Jam" readonly="readonly"/>
								      				<input type="hidden" name="paket" value="<?php echo $pinjam->jaminan; ?>">
								     	<?php
								     			} else {
								    	?>
								    				<input type="text" class="form-control" placeholder="24 Jam" readonly="readonly"/>
								    				<input type="hidden" name="paket" value="<?php echo $pinjam->jaminan; ?>">
								    	<?php
								     			}
								     		}
								    	?>		
								    </div>
								    
										<label for="g" class="col-sm-1 form-control-label">KLX BF</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demobf">
													Show Motor Dipinjam<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demobf" class="collapse">
					                            	<div id="scroll">
													   <?php
									                        foreach ($motor->result() as $detailmotor) {
									                        	if($detailmotor->tipe_motor=="KLXBF"){
									                    ?>
															   <input class="form-control" type="text" placeholder="Nomer Registrasi Motor: <?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
															   <br>
									                     <?php
									                     		} 
									                        }
									                    ?>
								                	</div>
												</div>
					                    </div>
									
								</div>
								<div class="form-group row">
								 	<label for="tgl" class="col-sm-2 form-control-label">Tanggal Sewa</label>
								 		<div class="col-sm-4">
											<?php
							                    foreach ($peminjaman->result() as $pinjam) {
							                ?>
									      				<input type="text" class="form-control" name="tgl" value="<?php echo $pinjam->Tanggal; ?>" readonly="readonly"/>
									      	<?php
									     		}
									    	?>
										</div>
									
								    	<label for="pinjaman1" class="col-sm-1 form-control-label">Boots</label>
									    <div class="col-sm-4">
									    	<?php
							                    foreach ($perlengkapan->result() as $barang) {
							                    	if($barang->jenis_perlengkapan == "B" && $barang->jumlah_perlengkapan>0){
							                ?>
									      				<input type="text" class="form-control" placeholder="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
									      	<?php
									     			} else if($barang->jenis_perlengkapan == "B" && $barang->jumlah_perlengkapan<=0){
									    	?>
									    				<input type="text" class="form-control" readonly="readonly"/>
									    	<?php
									     			}
									     		}
									    	?>	
									    </div>
									
								</div>
			                    <div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Jersey</label>
									    <div class="col-sm-4">
									    	<?php
							                    foreach ($perlengkapan->result() as $barang) {
							                    	if($barang->jenis_perlengkapan == "J" && $barang->jumlah_perlengkapan>0){
							                ?>
									      				<input type="text" class="form-control" placeholder="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
									      	<?php
									     			} else if($barang->jenis_perlengkapan == "J" && $barang->jumlah_perlengkapan<=0){
									    	?>
									    				<input type="text" class="form-control" readonly="readonly"/>
									    	<?php
									     			}
									     		}
									    	?>
									    </div>
									
								    	<label for="pinjaman1" class="col-sm-1 form-control-label">Body Protector</label>
									    <div class="col-sm-4">
									    	<?php
							                    foreach ($perlengkapan->result() as $barang) {
							                    	if($barang->jenis_perlengkapan == "BP" && $barang->jumlah_perlengkapan>0){
							                ?>
									      				<input type="text" class="form-control" placeholder="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
									      	<?php
									     			} else if($barang->jenis_perlengkapan == "BP" && $barang->jumlah_perlengkapan<=0){
									    	?>
									    				<input type="text" class="form-control" readonly="readonly"/>
									    	<?php
									     			}
									     		}
									    	?>
									    </div>
									
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Google</label>
									    <div class="col-sm-4">
									    	<?php
							                    foreach ($perlengkapan->result() as $barang) {
							                    	if($barang->jenis_perlengkapan == "G" && $barang->jumlah_perlengkapan>0){
							                ?>
									      				<input type="text" class="form-control" placeholder="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
									      	<?php
									     			} else if($barang->jenis_perlengkapan == "G" && $barang->jumlah_perlengkapan<=0){
									    	?>
									    				<input type="text" class="form-control" readonly="readonly"/>
									    	<?php
									     			}
									     		}
									    	?>
									    </div>
								   
								    	<label for="pinjaman1" class="col-sm-1 form-control-label">Knee Protector</label>
									    <div class="col-sm-4">
					                        <?php
							                    foreach ($perlengkapan->result() as $barang) {
							                    	if($barang->jenis_perlengkapan == "KP" && $barang->jumlah_perlengkapan>0){
							                ?>
									      				<input type="text" class="form-control" placeholder="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
									      	<?php
									     			} else if($barang->jenis_perlengkapan == "KP" && $barang->jumlah_perlengkapan<=0){
									    	?>
									    				<input type="text" class="form-control" readonly="readonly"/>
									    	<?php
									     			}
									     		}
									    	?>
									    </div>
									
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Harga Total</label>
									    <div class="col-sm-4">
					                        <?php
							                    foreach ($harga->result() as $hrga) {
							                ?>
									      				<input type="text" class="form-control" name="hargatotal" value="<?php echo $hrga->harga; ?>" readonly="readonly"/>
									      	<?php
									     		} 
									    	?>
									    </div>
								    
								    	<label for="sim" class="col-sm-1 form-control-label">Harga Guide</label>
									    <div class="col-sm-4">
									    	<?php
				                                foreach ($harga->result() as $hrga) {
				                                    if($hrga->harga_guide != "") {
				                            ?>
				                                        <input type="text" class="form-control" name="hargaguide" value="<?php echo $hrga->harga_guide; ?>" readonly="readonly"/>
				                                        <?php
				                                            foreach ($anggota->result() as $ang) {
				                                        ?>
				                                            <input type="text" class="form-control" name="namaguide" value="<?php echo $ang->nama_anggota; ?>" readonly="readonly"/>
				                                        <?php
				                                            }
				                                        ?>
				                            <?php
				                                    } else {
				                            ?>
				                                        <input type="text" class="form-control" name="hargaguide" value="Rp.0" readonly="readonly"/>
				                            <?php
				                                    }
				                                } 
				                            ?>
									    </div>
									
								</div>
								<div class="form-group row">
							    		<label for="sim" class="col-sm-2 form-control-label">Harga Perlengkapan</label>
									    <div class="col-sm-4">
									    	<?php
							                    foreach ($harga->result() as $hrga) {
							                ?>
									      				<input type="text" class="form-control" name="hargaperlengkapan" value="<?php echo $hrga->harga_perlengkapan; ?>" readonly="readonly"/>
									      	<?php
									     		} 
									    	?>
									    </div>
									    <label for="pinjaman1" class="col-sm-1 form-control-label">Harga Motor</label>
									    <div class="col-sm-4">
					                        <?php
							                    foreach ($harga->result() as $hrga) {
							                ?>
									      				<input type="text" class="form-control" name="hargamotor" value="<?php echo $hrga->harga_motor; ?>" readonly="readonly"/>
									      	<?php
									     		} 
									    	?>
									    </div>
									
								</div>
								<div class="form-group row">
									<label for="sim" class="col-sm-2 form-control-label">Harga Marketing</label>
									    <div class="col-sm-4">
									    	<?php
							                    foreach ($harga->result() as $hrga) {
							                ?>
									      				<input type="text" class="form-control" name="hargamarketing" value="<?php echo $hrga->harga_marketing; ?>" readonly="readonly"/>
									      	<?php
									     		} 
									    	?>
									    </div>
									<label for="pinjaman1" class="col-sm-1 form-control-label"><input type="checkbox" name="tunai[]" value="" readonly="readonly">Bayar Tunai</label>
									    <div class="col-sm-4">
					                        
								                        <?php
										                    foreach ($harga->result() as $hrga) {
										                ?>
												      				<input type="text" class="form-control" name="hargatotaltunai" value="<?php echo $hrga->harga; ?>" readonly="readonly"/>
												      	<?php
												     		} 
												    	?>
								                        <?php
										                    foreach ($peminjaman->result() as $pinjam) {
										                ?>
										                <input class="form-control" type="hidden" name="id_peminjamant" value="<?php echo $pinjam->Id_Peminjamanan; ?>">
										                <?php
										                	}
										                ?>
									    		 		<?php
										                    foreach ($harga->result() as $hrga) {
										                ?>
												      				<input type="hidden" class="form-control" name="idharga" value="<?php echo $hrga->id; ?>" readonly="readonly"/>
												      	<?php
												     		} 
												    	?>
									    </div>
							    </div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label"><input type="checkbox" name="dp[]" value="" readonly="readonly">Bayar Dp</label>
								    <div class="col-sm-4">
				                        <div class="form-control" data-toggle="collapse" data-target="#dp">
											Nominal Yang Dibayar<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                    </div>
					                            <div id="dp" class="collapse">
							                        <input class="form-control" type="text" name="nominal_satudp" placeholder="">
							                        <?php
									                    foreach ($peminjaman->result() as $pinjam) {
									                ?>
									                <input class="form-control" type="hidden" name="id_peminjamandp" value="<?php echo $pinjam->Id_Peminjamanan; ?>">
									                <?php
									                	}
									                ?>
									                <?php
										                    foreach ($harga->result() as $hrga) {
										                ?>
												      				<input type="hidden" class="form-control" name="hargatotaldp" value="<?php echo $hrga->harga; ?>" readonly="readonly"/>
												      	<?php
												     		} 
												    	?>
								            	</div>
							        </div>
								    
								    	<label for="pinjaman1" class="col-sm-1 form-control-label"><input type="checkbox" name="transfer[]" value="" readonly="readonly">Bayar Transfer</label>
									    <div class="col-sm-4">
					                        <div class="form-control" data-toggle="collapse" data-target="#transfer">
												Nomer Transaksi<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
						                            </div>
						                            <div id="transfer" class="collapse">
						                            	<input type="text" class="form-control" name="nomer_rekening" placeholder=""/>
								                        <?php
										                    foreach ($harga->result() as $hrga) {
										                ?>
												      				<input type="text" class="form-control" name="hargatotaltransfer" value="<?php echo $hrga->harga; ?>" readonly="readonly"/>
												      	<?php
												     		} 
												    	?>
								                        <?php
										                    foreach ($peminjaman->result() as $pinjam) {
										                ?>
										                <input class="form-control" type="hidden" name="id_peminjamantransfer" value="<?php echo $pinjam->Id_Peminjamanan; ?>">
										                <?php
										                	}
										                ?>
									            </div>
									    </div>
									
								</div>
								<div class="form-group row">
								    	<label for="pinjaman1" class="col-sm-2 form-control-label"><input type="checkbox" name="debit[]" value="" readonly="readonly">Bayar Debit</label>
									    <div class="col-sm-4">
									    	<div class="form-control" data-toggle="collapse" data-target="#debit">
											Nomer Transaksi<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                    	</div>
					                            <div id="debit" class="collapse">
							                        <input class="form-control" type="text" name="nomertransaksi" placeholder="">
							                        <?php
											                foreach ($harga->result() as $hrga) {
											            ?>
													      		<input type="text" class="form-control" name="hargatotaldebit" value="<?php echo $hrga->harga; ?>" readonly="readonly"/>
													    <?php
													     	} 
													    ?>
								                        <?php
										                    foreach ($peminjaman->result() as $pinjam) {
										                ?>
										                <input class="form-control" type="hidden" name="id_peminjamandebit" value="<?php echo $pinjam->Id_Peminjamanan; ?>">
										                <?php
										                	}
										                ?>
								            	</div>
											</div>
									</div>
								<input class="btn btn-primary" type="submit" />
							</form>
						</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
		$(function() { 
		  $('input[type="checkbox"]').bind('click',function() {
		    $('input[type="checkbox"]').not(this).prop("checked", false);
		  }); 
		});

		$('form').submit(function() {
			var field = $("input[type=checkbox]").serializeArray();
			if (field.length == 0){
				alert('Anda Harus Memilih Salah Satu Metode Pembayaran');
				return false;
			} else { 
				window.open('<?php echo base_url(); ?>laporan/laporan_transaksi','popup','width=1024, height=800,scrollbars=yes');
			}
		});

		setTimeout(submit, 5000);
	</script>
</body>

</html>
