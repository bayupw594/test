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
							<li><a href=""><span class="glyphicon glyphicon-plus"></span> Manage User</a></li>
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
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman DP
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman Lunas
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/anggota">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Anggota
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Motor
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Harga Motor
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Apparel
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola harga Apparel
						</a>
					</li>
					<li>
						<a class="" href="">
							<span class="glyphicon glyphicon-share-alt"></span> Maintanence
						</a>
					</li>
					<li>
						<a class="" href="">
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
						<a class="" href="">
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
							<?php echo validation_errors() ?>
							<?php echo form_open('admin/verifikasipinjaman/proses'); ?><!--form method="post" action="<?= base_url()?>admin/verifikasipinjaman/proses"-->
			                	<div class="form-group row">
				                	<label for="ktp" class="col-sm-2 form-control-label">Nama</label>
									    <div class="col-sm-4">
									    	<input type="text" id="napem" class="form-control" value="<?php echo $napem; ?>" name="napem">
									    </div>
									   	<label for="ktp" class="col-sm-1 form-control-label">No. HP</label>
									    <div class="col-sm-4">
									    	<input type="text" id="sim" class="form-control" value="<?php echo $sim; ?>" name="sim">
									    </div>
								</div>
								<div class="form-group row">
								 	<label for="napem" class="col-sm-2 form-control-label">No KTP</label>
								    <div class="col-sm-4">
								    	<input class="form-control" type="text" value="<?php echo $ktp; ?>" name="ktp">
								    </div>
								   	<label for="s" class="col-sm-1 form-control-label">KLX S</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demo">
													Show Motor Dipinjam<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                            </div>
					                            <div id="demo" class="collapse">
					                            	<div id="scroll">
					                            		<?php
					                            		if(!empty($dataklxs)){
										                    foreach ($dataklxs as $klxss) {
										                ?>
								                        <input checked="checked" type="checkbox" name="klxs[]" value="<?php echo $klxss; ?>"><?php echo  $klxss; ?>
														<br>
														<?php
															}
														} 
															
															foreach ($dmotors->result() as $motors) {
														?>
														<input type="checkbox" name="klxs[]" value="<?php echo  $motors->No_Registrasi; ?>"><?php echo  $motors->No_Registrasi; ?>
														<br>
														<?php
															}
														
														?>
													</div>
												</div>
					                    </div>
								</div>
								<div class="form-group row">
								    <label for="alm" class="col-sm-2 form-control-label">Alamat</label>
								    <div class="col-sm-4">
								      <textarea type="text" id="alm" class="form-control" value="<?php echo $alamat;?>" name="alm" ><?php echo $alamat;?></textarea>
								    </div>
								        <label for="l" class="col-sm-1 form-control-label">KLX L</label>
									   <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demol">
													Show Motor<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demol" class="collapse">
					                            	<div id="scroll">
					                            		<?php
					                            		if(!empty($dataklxl)){
										                    foreach ($dataklxl as $klxll) {
										                ?>
								                        <input checked="checked" type="checkbox" name="klxl[]" value="<?php echo $klxll; ?>"><?php echo  $klxll; ?>
														<br>
														<?php
															}
														} 
															foreach ($dmotorl->result() as $motorl) {
														?>
														<input type="checkbox" name="klxl[]" value="<?php echo  $motorl->No_Registrasi; ?>"><?php echo  $motorl->No_Registrasi; ?>
														<br>
														<?php
															}
														?>
						                            </div>
					                            </div>
					                    </div>
								</div>
								<div class="form-group row">
								    <label for="jaminan" class="col-sm-2 form-control-label">Jaminan</label>
								    <div class="col-sm-4">
								      <input type="text" value="<?php echo $jaminan; ?>" class="form-control" name="jaminan" />
								    </div>
								        <label for="g" class="col-sm-1 form-control-label">KLX G</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demog">
													Show Motor<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demog" class="collapse">
					                            	<div id="scroll">
													    <?php
					                            		if(!empty($dataklxg)){
										                    foreach ($dataklxg as $klxgg) {
										                    	 foreach ($dmotorg->result() as $motorg) {
										                    	 	if($klxgg==$motorg->No_Registrasi) {
										                ?>
								                        <input checked="checked" type="checkbox" name="klxg[]" value="<?php echo $motorg->No_Registrasi; ?>"><?php echo  $motorg->No_Registrasi; ?>
														<br>
														<?php
																	}else {
														?>
														<input type="checkbox" name="klxg[]" value="<?php echo  $motorg->No_Registrasi; ?>"><?php echo  $motorg->No_Registrasi; ?>
														<br>
														<?php
																	}
																}
															}
														} else {
															foreach ($dmotorg->result() as $motorg) {
														?>
														<input type="checkbox" name="klxg[]" value="<?php echo  $motorg->No_Registrasi; ?>"><?php echo  $motorg->No_Registrasi; ?>
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
								    <label for="paket" class="col-sm-2 form-control-label">Waktu Sewa</label>
								    <div class="col-sm-4">
								    	
								      	<select name="paket" class="form-control">
								      		<?php
								      			if($paket==1){
								      		?>
								      				<option value="1">12 Jam</option>
								      		<?php
								      			} else if($paket==2){
								      		?>
								      				<option value="2">24 Jam</option>
								      		<?php
								      			} else {
								      		?>
								      				<option value="">Paket</option>
								      		<?php
								      			}
								      		?>
								      		<option value="1">12 Jam</option>
				                            <option value="2">24 Jam</option>
				                        </select>
				                        
								    </div>
								        <label for="g" class="col-sm-1 form-control-label">KLX BF</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demobf">
													Show Motor<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demobf" class="collapse">
					                            	<div id="scroll">
													   <?php
					                            		if(!empty($dataklxbf)){
										                    foreach ($dataklxbf as $klxbff) {
										                    	 
										                ?>
								                        <input checked="checked" type="checkbox" name="klxbf[]" value="<?php echo $klxbff; ?>"><?php echo  $klxbff; ?>
														<br>
														<?php
															}
														}
															foreach ($dmotorbf->result() as $motorbf) {
														?>
														<input type="checkbox" name="klxbf[]" value="<?php echo  $motorbf->No_Registrasi; ?>"><?php echo  $motorbf->No_Registrasi; ?>
														<br>
														<?php
															}
														?>
					                            	</div>
												</div>
					                    </div>
								</div>
								<div class="form-group row">
								 	<label for="tgl" class="col-sm-2 form-control-label">Tanggal Sewa</label>
									<div class="col-sm-4">
										<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
						                    <input class="form-control" value="<?php echo $tanggal; ?>" name="tgl" type="text" value="" readonly>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                </div>
						                <input type="hidden" id="dtp_input1" value="" />
						            </div>
									<label for="sim" class="col-sm-1 form-control-label">Marketing</label>
								    <div class="col-sm-4">
								    	<select name="namafeemarketing" class="form-control">
								    			<?php
								    				if(!empty($marketing)){
								    					foreach ($m_anggota->result() as $a) {
								    						if($marketing == $a->id_anggota){
								    			?>
								    							<option value="<?php echo $a->id_anggota?>">Nama Marketing : <?php echo $a->nama_anggota ;?></option>
								    			<?php
								    						}
								    					}
								    				} else {
								    			?>
								    					<option value="">Nama Fee Marketing : </option>
								    			<?php
								    				}
								    				
								    				foreach ($m_anggota->result() as $a) {
						                        ?>
						                                <option value="<?php echo $a->id_anggota; ?>" ><?php echo $a->nama_anggota; ?></option>
						                       	<?php
						                        	}
						                        ?>
						                </select>
								    </div>	
								</div>
								<div class="form-group row">
									<label for="sim" class="col-sm-2 form-control-label">Guide</label>
									    <div class="col-sm-4">	
									    	<div class="form-control" data-toggle="collapse" data-target="#guid">
													Show Detail Guide<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                        </div>
					                            <div id="guid" class="collapse">		
					                            									    	
							                        <div id="scroll">
							                        	<?php
						                            		if(!empty($dataangg)){
						                            			foreach ($dataangg as $da) {
											                    	foreach ($m_anggota->result() as $m_a) {
											                    		if($da==$m_a->id_anggota ) {
											        	?>
											        						<input checked="checked" type="checkbox" name="angg[]" value="<?php echo $m_a->id_anggota ; ?>"><?php echo  $m_a->nama_anggota; ?>
														<br>
									                    <?php
									                    				}
									                    			}
									                    		}
															} 
															foreach ($m_anggota->result() as $m_a) {
														?>
																<input type="checkbox" name="angg[]" value="<?php echo $m_a->id_anggota ; ?>"><?php echo  $m_a->nama_anggota; ?>
																<br>
														<?php
															}
														?>
													</div>
					                        	</div>
									    </div>
									    <label for="libur" class="col-sm-1 form-control-label">Hari Libur</label>
									    <div class="col-sm-4">
									    	<?php
								    			if(!empty($libur)){
								    		?>
									      			<input type="checkbox" class="" name="libur[]" checked="checked"/><b> Centang Jika Hari Libur Saat Weekday</b>
									    	<?php
									    		} else {
									    	?>
									    			<input type="checkbox" class="" name="libur[]" /><b> Centang Jika Hari Libur Saat Weekday</b>
									    	<?php
									    		}
									    	?>
									    </div>								    	
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Glove</label>
								    <div class="col-sm-4">	
								    	<div class="form-control" data-toggle="collapse" data-target="#glove">
												Show Glove<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="glove" class="collapse">											    	
						                        <?php
						                            foreach ($bpper->result() as $bp) {
						                            	if($jpbper >= 1){
						                        ?>
						                        			<label for="pinjaman1">Stok : <?php echo $jpbper; ?> </label>
						                                    <input type="text" name="jumlah_pinjaman2" value="<?php echo $glove?>" size="11" class="form-control">
						                                    <input type="hidden" name="JABP" value="<?php echo $jpbper; ?>">
						                                    <input type="hidden" name="pinjaman2" value="<?php echo $bp->id_perlengkapan; ?>">
						                        <?php
						                                }else {
						                        ?>
						                                    <input type="text" name="jumlah_pinjaman2" placeholder="Habis" size="11" readonly="readonly" class="form-control">
						                        <?php            
						                                }
						                            }
						                        ?>
				                        	</div>
								    </div>
								    <label for="pinjaman1" class="col-sm-1 form-control-label">Jersey</label>
								    <div class="col-sm-4">	
								    	<div class="form-control" data-toggle="collapse" data-target="#jersey">
												Show Jersey<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="jersey" class="collapse">											    	
						                        <?php
						                            foreach ($jper->result() as $jp) {
						                            	if($jjper >= 1){
						                        ?>
						                        			<label for="pinjaman1">Stok : <?php echo $jjper; ?> </label>
						                                    <input type="text" name="jumlah_pinjaman4" value="<?php echo $jersey; ?>" size="11" class="form-control">
						                                    <input type="hidden" name="JAJ" value="<?php echo $jjper; ?>">
						                                    <input type="hidden" name="pinjaman4" value="<?php echo $jp->id_perlengkapan; ?>">
						                        <?php
						                                }else {
						                        ?>
						                                    <input type="text" name="jumlah_pinjaman4" placeholder="Habis" size="11" readonly="readonly" class="form-control">
						                        <?php            
						                                }
						                            }
						                        ?>
				                        	</div>
								    </div>
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Knee Protector</label>
								    <div class="col-sm-4">	
								    	<div class="form-control" data-toggle="collapse" data-target="#kp">
												Show Knee Protector<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="kp" class="collapse">											    	
						                        <?php
						                            foreach ($kper->result() as $kp) {
						                            	if($jkper >= 1){
						                        ?>
						                        			<label for="pinjaman1">Stok : <?php echo $jkper; ?> </label>
						                                    <input type="text" name="jumlah_pinjaman3" value="<?php echo $knee_protector; ?>" size="11" class="form-control">
						                                    <input type="hidden" name="JAKP" value="<?php echo $jkper; ?>">
						                                    <input type="hidden" name="pinjaman3" value="<?php echo $kp->id_perlengkapan; ?>">
						                        <?php
						                                }else {
						                        ?>
						                                    <input type="text" name="jumlah_pinjaman3" placeholder="Habis" size="11" readonly="readonly" class="form-control">
						                        <?php            
						                                }
						                            }
						                        ?>
				                        	</div>
								    </div>
								    <label for="pinjaman1" class="col-sm-1 form-control-label">Google</label>
								    <div class="col-sm-4">	
								    	<div class="form-control" data-toggle="collapse" data-target="#google">
												Show Google<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="google" class="collapse">											    	
						                        <?php
						                           foreach ($gper->result() as $gp) {
						                            	 if($jgper >= 1){
						                        ?>
						                        			<label for="pinjaman1">Stok : <?php echo $jgper; ?> </label>
						                                    <input type="text" name="jumlah_pinjaman5" value="<?php echo $google; ?>" size="11" class="form-control">
						                                    <input type="hidden" name="JAG" value="<?php echo $jgper; ?>">
						                                    <input type="hidden" name="pinjaman5" value="<?php echo $gp->id_perlengkapan; ?>">
						                        <?php
						                                }else {
						                        ?>
						                                    <input type="text" name="jumlah_pinjaman5" placeholder="Habis" size="11" readonly="readonly" class="form-control">
						                        <?php            
						                                }
						                            }
						                        ?>
				                        	</div>
								    </div>
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Boots</label>
								    <div class="col-sm-4">	
								    	<div class="form-control" data-toggle="collapse" data-target="#boots">
												Show Boots<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="boots" class="collapse">											    	
						                        <?php
						                            foreach ($bper->result() as $b) {
						                            	if($jbper >= 1){
						                        ?>
						                        			<label for="pinjaman1">Stok : <?php echo $jbper; ?> </label>
						                                    <input type="text" value="<?php echo $boot; ?>" name="jumlah_pinjaman1" size="11" class="form-control">
						                                    <input type="hidden" name="JAB" value="<?php echo $jbper; ?>">
						                                    <input type="hidden" name="pinjaman1" value="<?php echo $b->id_perlengkapan; ?>">
						                        <?php
						                                }else {
						                        ?>
						                                    <input type="text" name="jumlah_pinjaman1" placeholder="Habis" size="11" readonly="readonly" class="form-control">
						                        <?php            
						                                }
						                            }
						                        ?>
				                        	</div>
								    </div>
								    <label for="pinjaman1" class="col-sm-1 form-control-label">Boot MX</label>
								    <div class="col-sm-4">	
								    	<div class="form-control" data-toggle="collapse" data-target="#bmx">
												Show Boot MX<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="bmx" class="collapse">								    	
						                        <div id="scroll">
						                        	<?php
					                            		if(!empty($databootmx)){
										                    foreach ($databootmx as $b_mx) {
										                    	 foreach ($boot_mx->result() as $b) {
										                    	 	if($b_mx==$b->id_boot ) {
										        	?>
								                        <input checked="checked" type="checkbox" name="boot_mx[]" value="<?php echo $b->id_boot ; ?>"><?php echo  $b->nama; ?> &nbsp; <?php echo $b->nama_anggota; ?>
														<br>
													<?php
																	}
																}
															}
														} 
															foreach ($boot_mx->result() as $b) {
													?>
														<input type="checkbox" name="boot_mx[]" value="<?php echo  $b->id_boot ; ?>"><?php echo  $b->nama; ?> &nbsp; <?php echo $b->nama_anggota; ?>
														<br>
													<?php
															}
													?>
												</div>
				                        	</div>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="biayalain" class="col-sm-2 form-control-label">Biaya Lain</label>
								    <div class="col-sm-4">
								      	<input type="text" id="biayalain" class="form-control" name="biayalain" value="<?php echo $biayalain; ?>" placeholder="">
								    </div>
								    <label for="fullappparel" class="col-sm-1 form-control-label">Full Apparel</label>
								    <div class="col-sm-4">
								      	<input type="text" id="fullapparel" class="form-control" name="fullapparel" value="<?php echo $fullapparel; ?>" placeholder="">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="biayalain" class="col-sm-2 form-control-label">Harga Perlengkapan</label>
								    <div class="col-sm-4">
								      	<input type="text" id="biayalain" class="form-control" name="hargaperlengkapan" value="<?php echo $hargaperlengkapan; ?>" readonly="readonly">
								    </div>
								    <label for="sim" class="col-sm-1 form-control-label">Harga Motor</label>
								    <div class="col-sm-4">
								    	<input type="text" class="form-control" name="hargamotor" value="<?php echo $hargamotor; ?>" readonly="readonly"/>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="biayalain" class="col-sm-2 form-control-label">Harga Guide</label>
								    <div class="col-sm-4">
								      	<input type="text" id="biayalain" class="form-control" name="hargatotalguide" value="<?php echo $total_guide; ?>" readonly="readonly">
								    </div>
								    <label for="sim" class="col-sm-1 form-control-label">Harga BootMX</label>
								    <div class="col-sm-4">
								    	<input type="text" class="form-control" name="hargabootmx" value="<?php echo $hargabootmx; ?>" readonly="readonly"/>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="biayalain" class="col-sm-2 form-control-label">Harga Total</label>
								    <div class="col-sm-4">
								      	<input type="text" id="biayalain" class="form-control" name="hargatotal" value="<?php echo $hargatotal; ?>" readonly="readonly">
								    </div>
								    <label for="sim" class="col-sm-1 form-control-label">Harga Marketing</label>
								    <div class="col-sm-4">
								    	<input type="text" class="form-control" name="hargamarketing" value="<?php echo $hargafeemarketing; ?>" readonly="readonly"/>
								    </div>
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label"><input type="checkbox" name="dp[]" value="" readonly="readonly" data-attr="pilihan-bayar">Bayar Dp</label>
								    <div class="col-sm-4">
				                        <div class="form-control" data-toggle="collapse" data-target="#dp">
											Nominal Yang Dibayar<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                    </div>
			                            <div id="dp" class="collapse">
					                        <input class="form-control" type="text" name="nominal_satudp" placeholder="Masukan Nominal DP">
					                    </div>
							        </div>
								    <label for="pinjaman1" class="col-sm-1 form-control-label"><input type="checkbox" name="tunai[]" value="" readonly="readonly" data-attr="pilihan-bayar">Bayar Tunai</label>
								    <div class="col-sm-4">
				                        <input type="text" class="form-control" name="hargatotaltunai" value="<?php echo $hargatotal; ?>" readonly="readonly"/>
									</div>
								</div>
								<div class="form-group row">
								    	<label for="pinjaman1" class="col-sm-2 form-control-label"><input type="checkbox" name="debit[]" value="" readonly="readonly" data-attr="pilihan-bayar">Bayar Debit</label>
									    <div class="col-sm-4">
									    	<div class="form-control" data-toggle="collapse" data-target="#debit">
											Nomer Transaksi<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                    	</div>
					                            <div id="debit" class="collapse">
							                        <input class="form-control" type="text" name="nomertransaksi" placeholder="">
							                        <input type="text" class="form-control" name="hargatotaldebit" value="<?php echo $hargatotal; ?>" readonly="readonly"/>
												</div>
										</div>
										<label for="pinjaman1" class="col-sm-1 form-control-label"><input type="checkbox" name="transfer[]" value="" readonly="readonly" data-attr="pilihan-bayar">Bayar Transfer</label>
									    <div class="col-sm-4">
					                        <div class="form-control" data-toggle="collapse" data-target="#transfer">
												Nomer Transaksi<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
						                    </div>
				                            <div id="transfer" class="collapse">
				                            	<input type="text" class="form-control" name="nomer_rekening" placeholder=""/>
						                        <input type="text" class="form-control" name="hargatotaltransfer" value="<?php echo $hargatotal; ?>" readonly="readonly"/>
										    </div>
									   	</div>
										<!--div class="col-sm-4">
											<input type="text" class="form-control" name="hargamarketing" value="<?php echo $hargafeemarketing; ?>" readonly="readonly"/>
									    </div-->
								</div>
								<div class="form-group row">
									<label for="pinjaman1" class="col-sm-6 form-control-label"><input type="checkbox" name="hitungulang[]" >&nbsp;Hitung Ulang</label>
									<label for="fullapparel" class="col-sm-1 form-control-label">Keterangan</label>
								    <div class="col-sm-4">
								      	<textarea id="keterangan" class="form-control" name="keterangan" value="<?php echo $keterangan; ?>" placeholder=""><?php echo $keterangan; ?></textarea>
								    </div>
								</div>
								<input type="hidden" id="biayalain" class="form-control" name="jenishari" value="<?php echo $jenishari; ?>">
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
		  $('[data-attr="pilihan-bayar"]').bind('click',function() {
		    $('[data-attr="pilihan-bayar"]').not(this).prop("checked", false);
		  }); 
		});

		$('form').submit(function() {
			var field = $("input[type=checkbox]").serializeArray();
			if (field.length == 0){
				alert('Anda Harus Memilih Salah Satu Metode Pembayaran');
				return false;
			}
		});

		$(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2016-01-01 10:00",
            minuteStep: 10
        });
	</script>
</body>

</html>
