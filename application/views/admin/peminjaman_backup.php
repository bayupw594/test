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
							<li><a href="<?php echo base_url();?>ganti_pass"><span class="glyphicon glyphicon-wrench"></span> Ganti Password</a></li>
							<li><a href="<?php echo base_url();?>admin/tambah_user"><span class="glyphicon glyphicon-plus"></span> Manage User</a></li>
							<li><a href="<?php echo base_url();?>home/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
						<a class="" href="<?php echo base_url();?>admin/peminjaman">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/peminjaman_view">
							<span class="glyphicon glyphicon-share-alt"></span> Lihat Pinjaman
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/pengembalian">
							<span class="glyphicon glyphicon-share-alt"></span> Pengembalian
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/anggota">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Anggota
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kelola_motor/">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Motor
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kelola_harga_sewa">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Harga Motor
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kelola_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Apparel
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kelola_harga_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Harga Apparel
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/maintanence">
							<span class="glyphicon glyphicon-share-alt"></span> Maintanence
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kas">
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
						<a class="" href="<?php echo base_url();?>laporan/laporan_pengembalian">
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
				<li><a href="home"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Admin</li>
				<li class="active">Peminjaman</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Peminjaman</h1>
					<div class="panel panel-default">
						<div class="panel-heading"></div>
						<div class="panel-body">
							<?php echo validation_errors() ?>
							<?php echo form_open('admin/peminjaman/ps'); ?><!--form method="post" action="<?= base_url()?>admin/peminjaman/ps">
								<!--start nama dan sim-->
								<div class="form-group row">
								    <label for="ktp" class="col-sm-2 form-control-label">Nama</label>
								    <div class="col-sm-4">
								      	<input type="text" id="napem" class="form-control" name="napem" value="<?php echo set_value('napem'); ?>" placeholder="">
								    </div>
								    	<label for="sim" class="col-sm-1 form-control-label">No.Hp</label>
									    <div class="col-sm-4">
									    	<input class="form-control" type="text" value="<?php echo set_value('sim'); ?>" name="sim" >
										</div>
								</div>
								<!--end nama dan sim-->
								<!--start no ktp dan klxs-->
								<div class="form-group row">
								    <label for="napem" class="col-sm-2 form-control-label">No KTP</label>
								    <div class="col-sm-4">
								    	<input class="form-control" value="<?php echo set_value('ktp'); ?>" type="text" name="ktp">
								    </div>
								        <label for="s" class="col-sm-1 form-control-label">KLX S</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demo">
													Show Motor<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
					                            </div>
					                            <div id="demo" class="collapse">
					                            	<div id="scroll">
													   <?php
						                                    foreach ($dmotors->result() as $motors) {
						                                ?>
						                                	<?php echo form_checkbox('klxs[]', $motors->No_Registrasi, set_checkbox('klxs[]', $motors->No_Registrasi) ); echo $motors->No_Registrasi; ?>     
						                                    &nbsp;
						                                <?php
						                                    }
						                                ?>
					                             	</div>
												</div>
					                    </div>
								</div>
								<!--end np ktp dan klxs-->
								<!--start alamat dan klxl-->
								<div class="form-group row">
								    <label for="alm" class="col-sm-2 form-control-label">Alamat</label>
								    <div class="col-sm-4">
								      <textarea type="text" id="alm" class="form-control" value="<?php echo set_value('alm','0') ?>" name="alm" placeholder=""></textarea>
								    </div>
								        <label for="l" class="col-sm-1 form-control-label">KLX L</label>
									   <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demol">
													Show Motor<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demol" class="collapse">
					                            	<div id="scroll">
					                            		<?php
						                                    foreach ($dmotorl->result() as $motorl) {
						                                ?>
						                                    <?php echo form_checkbox('klxl[]', $motorl->No_Registrasi, set_checkbox('klxl[]', $motorl->No_Registrasi) ); echo $motorl->No_Registrasi; ?>
						                                    &nbsp;
						                                <?php
						                                    }
						                                ?>
						                            </div>
					                            </div>
					                    </div>
								</div>
								<!--end alamat dan klxl-->
								<!--start jaminan dan klx g-->
								<div class="form-group row">
								    <label for="jaminan" class="col-sm-2 form-control-label">Jaminan</label>
								    <div class="col-sm-4">
								      <input type="text" value="<?php echo set_value('jaminan'); ?>" class="form-control" name="jaminan" />
								    </div>
								        <label for="g" class="col-sm-1 form-control-label">KLX G</label>
									    <div class="col-sm-4">
									    		<div class="form-control" data-toggle="collapse" data-target="#demog">
													Show Motor<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
					                            </div>
					                            <div id="demog" class="collapse">
					                            	<div id="scroll">
													   <?php
						                                    foreach ($dmotorg->result() as $motorg) {
						                                ?>
						                                    <?php echo form_checkbox('klxg[]', $motorg->No_Registrasi, set_checkbox('klxg[]', $motorg->No_Registrasi) ); echo $motorg->No_Registrasi; ?>
						                                    &nbsp;
						                                <?php
						                                    }
						                                ?>
					                            	</div>
												</div>
					                    </div>
								</div>
								<!--end jaminan dan klxg-->
								<!--start waktu sewa dan klxbf-->
								<div class="form-group row">
								    <label for="paket" class="col-sm-2 form-control-label">Waktu Sewa</label>
								    <div class="col-sm-4">
								    	
								      	<select name="paket" class="form-control">
								      		<option value="1">Paket</option>
								      		<option value="1" <?php echo set_select('paket','1') ?>>12 Jam</option>
				                            <option value="2" <?php echo set_select('paket','2') ?>>24 Jam</option>
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
						                                    foreach ($dmotorbf->result() as $motorg) {
						                                ?>
						                                    <?php echo form_checkbox('klxbf[]', $motorg->No_Registrasi, set_checkbox('klxbf[]', $motorg->No_Registrasi) ); echo $motorg->No_Registrasi; ?>
						                                    &nbsp;
						                                <?php
						                                    }
						                                ?>
					                            	</div>
												</div>
					                    </div>
								</div>
								<!--end waktu sewa dan klxbf-->
								<!---->
								<div class="form-group row">
								 	<label for="tgl" class="col-sm-2 form-control-label">Tanggal Sewa</label>
									<div class="col-sm-4">
										<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
						                    <input class="form-control" value="<?php echo set_value('tgl'); ?>" name="tgl" type="text" value="" readonly>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                </div>
						                <input type="hidden" id="dtp_input1" value="" />
									</div>
									<label for="sim" class="col-sm-1 form-control-label">Marketing</label>
								    <div class="col-sm-4">
								    	<select name="namafeemarketing" class="form-control">
						                            <option value="">Nama Fee Marketing</option>
						                            <?php
						                            	foreach ($anggota->result() as $a) {
						                            ?>
						                                <option value="<?php echo $a->id_anggota; ?>" <?php echo set_select('namafeemarketing', $a->id_anggota) ?> ><?php echo $a->nama_anggota; ?></option>
						                        	<?php
						                        		}
						                        	?>
						                </select>
								    </div>	
								</div>
								<!---->
								<div class="form-group row">
									<label for="sim" class="col-sm-2 form-control-label">Guide</label>
									    <div class="col-sm-4">										    
								    		<div class="form-control" data-toggle="collapse" data-target="#demoangg">
												Show Guide<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
				                            </div>
				                            <div id="demoangg" class="collapse">
				                            	<div id="scroll">	
												   <?php
					                                    foreach ($anggota->result() as $anggota) {
					                                ?>
					                                	<?php echo form_checkbox('angg[]', $anggota->id_anggota, set_checkbox('angg[]', $anggota->id_anggota )); echo $anggota->nama_anggota; ?>
					                                    
					                                    <br>
					                                <?php
					                                    }
					                                ?>
				                             	</div>
											</div>						                    
									    </div>
									    <label for="libur" class="col-sm-1 form-control-label">Hari Libur</label>
									    <div class="col-sm-4">
									      <input type="checkbox" value="<?php echo set_checkbox('libur[]'); ?>" class="" name="libur[]" /><b> Centang Jika Hari Libur Saat Weekday</b>
									    </div>								    	
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Glove</label>
								    <!--div class="col-sm-2">
								    	<?php
				                        //foreach ($jpbper->result() as $jbp) {
				                            if($jpbper >= 1){
				                                foreach ($bpper->result() as $bp) {
				                        ?>
				                                <input type="checkbox" name="pinjaman2" value="<?php echo $bp->id_perlengkapan; ?>"><?php echo $bp->jenis_perlengkapan; ?>
				                        <?php
				                                }
				                            } else {    
				                        ?>
				                                <input type="checkbox" name="pinjaman2" value="" readonly="readonly"> Habis
				                        <?php        
				                            }
				                        //}
				                        ?>
								    </div-->
								    <div class="col-sm-4">												    	
				                        <?php
				                            //foreach ($jpbper->result() as $jbp) {
				                            if($jpbper >= 1){
				                        ?>
				                                    <input type="text" name="jumlah_pinjaman2" placeholder="Stok : <?php echo $jpbper; ?> " value="<?php echo set_value('jumlah_pinjaman2'); ?>" size="11" class="form-control">
				                                    <input type="hidden" name="JABP" value="<?php echo $jpbper; ?>">
				                                    <input type="hidden" name="pinjaman2" value="<?php echo $bp->id_perlengkapan; ?>">
				                        <?php
				                                }else {
				                        ?>
				                                    <input type="text" name="jumlah_pinjaman2" placeholder="Habis" size="11" readonly="readonly" class="form-control">
				                        <?php            
				                                }
				                            //}
				                        ?>
								    </div>
								    	<label for="pinjaman1" class="col-sm-1 form-control-label">Jersey</label>
									    <!--div class="col-sm-2">
									    	<?php
					                        //foreach ($jjper->result() as $jj) {
					                            if($jjper >= 1){
					                                foreach ($jper->result() as $jp) {
					                        ?>
					                                    <input type="checkbox" name="pinjaman4" value="<?php echo $jp->id_perlengkapan; ?>"><?php echo $jp->jenis_perlengkapan; ?> (Jersey)
					                        <?php
					                                }
					                            } else {
					                        ?>
					                                   <input type="checkbox" name="pinjaman4" value="" readonly="readonly"> Habis
					                        <?php        
					                            }
					                        //}
					                        ?>
									    </div-->
									    <div class="col-sm-4">
									    	<?php
					                            //foreach ($jjper->result() as $jj) {
					                            if($jjper >= 1){
					                        ?>
					                                    <input type="text" name="jumlah_pinjaman4" placeholder="Stok : <?php echo $jjper; ?> " value="<?php echo set_value('jumlah_pinjaman4'); ?>" size="11" class="form-control">
					                                    <input type="hidden" name="JAJ" value="<?php echo $jjper; ?>">
					                                    <input type="hidden" name="pinjaman4" value="<?php echo $jp->id_perlengkapan; ?>">
					                        <?php
					                                }else {
					                        ?>
					                                    <input type="text" name="jumlah_pinjaman4" placeholder="Habis" size="11" readonly="readonly" class="form-control">
					                        <?php            
					                                }
					                            //}
					                        ?>
									    </div>	
								</div>
								<div class="form-group row">
							    	<label for="pinjaman1" class="col-sm-2 form-control-label">Knee Protector</label>
								    <!--div class="col-sm-2">
				                        <?php
				                        //foreach ($jkper->result() as $jkp) {
				                            if($jkper >= 1){
				                                foreach ($kper->result() as $kp) {
				                        ?>
				                                <input type="checkbox" name="pinjaman3" value="<?php echo $kp->id_perlengkapan; ?>"><?php echo $kp->jenis_perlengkapan; ?> (Knee & Elbow Protector)
				                        <?php
				                                }
				                            } else {    
				                        ?>
				                                <input type="checkbox" name="pinjaman3" value="0" readonly="readonly"> Habis
				                        <?php        
				                            }
				                        //}
				                        ?>
								    </div-->
								    <div class="col-sm-4">
								    	<?php
				                            //foreach ($jkper->result() as $jkp) {
				                            if($jkper >= 1){
				                        ?>
				                                    <input type="text" name="jumlah_pinjaman3" placeholder="Stok : <?php echo $jkper; ?> " value="<?php echo set_value('jumlah_pinjaman3'); ?>" size="11" class="form-control">
				                                    <input type="hidden" name="JAKP" value="<?php echo $jkper; ?>">
				                                    <input type="hidden" name="pinjaman3" value="<?php echo $kp->id_perlengkapan; ?>">
				                        <?php
				                                }else {
				                        ?>
				                                    <input type="text" name="jumlah_pinjaman3" placeholder="Habis" size="11" readonly="readonly" class="form-control">
				                        <?php            
				                                }
				                            //}
				                        ?>
								    </div>
								    <label for="pinjaman1" class="col-sm-1 form-control-label">Google</label>
									    <!--div class="col-sm-2">
									    	<?php
					                        //foreach ($jgper->result() as $jg) {
					                            if($jgper >= 1){
					                                foreach ($gper->result() as $gp) {
					                        ?>
					                                <input type="checkbox" name="pinjaman5" value="<?php echo $gp->id_perlengkapan; ?>"><?php echo $gp->jenis_perlengkapan; ?> (Google)
					                        <?php
					                                }

					                            } else {
					                        ?>
					                            <input type="checkbox" name="pinjaman5" value="" readonly="readonly"> Habis
					                        <?php        
					                            }
					                        //}
					                        ?>
									    </div-->
									    <div class="col-sm-4">												    	
					                        <?php
					                            //foreach ($jgper->result() as $jg) {
					                            if($jgper >= 1){
					                        ?>
					                                    <input type="text" name="jumlah_pinjaman5" placeholder="Stok : <?php echo $jgper; ?> " value="<?php echo set_value('jumlah_pinjaman5'); ?>" size="11" class="form-control">
					                                    <input type="hidden" name="JAG" value="<?php echo $jgper; ?>">
					                                    <input type="hidden" name="pinjaman5" value="<?php echo $gp->id_perlengkapan; ?>">
					                        <?php
					                                }else {
					                        ?>
					                                    <input type="text" name="jumlah_pinjaman5" placeholder="Habis" size="11" readonly="readonly" class="form-control">
					                        <?php            
					                                }
					                            //}
					                        ?>
									    </div>
								</div>
								<div class="form-group row">
								    <label for="pinjaman1" class="col-sm-2 form-control-label">Boots</label>
								    <!--div class="col-sm-2">
								    	<?php
				                        //foreach ($jbper) {
				                            if($jbper >= 1){
				                                foreach ($bper->result() as $b) {
				                        ?>
				                                <input type="checkbox" name="pinjaman1" value="<?php echo $b->id_perlengkapan; ?>"><?php echo $b->jenis_perlengkapan; ?> (Boots) 
				                        <?php
				                                }
				                            }else {
				                        ?>
				                                <input type="checkbox" name="pinjaman1" value="" readonly="readonly">Habis
				                        <?php        
				                            }
				                        //}
				                        ?>
								    </div-->
								    <div class="col-sm-4">
								    	<?php
				                            //foreach ($jbper->result() as $jb) {
				                                if($jbper >= 1){
				                        ?>
				                                    <input type="text" value="<?php echo set_value('jumlah_pinjaman1'); ?>" name="jumlah_pinjaman1" placeholder="Stok : <?php echo $jbper; ?> " size="11" class="form-control">
				                                    <input type="hidden" name="JAB" value="<?php echo $jbper; ?>">
				                                    <input type="hidden" name="pinjaman1" value="<?php echo $b->id_perlengkapan; ?>">
				                        <?php
				                                }else {
				                        ?>
				                                    <input type="text" name="jumlah_pinjaman1" placeholder="Habis" size="11" readonly="readonly" class="form-control">
				                        <?php            
				                                }
				                          //  }
				                        ?>
								    </div>
								    <label for="sim" class="col-sm-1 form-control-label">Boot MX</label>
									<div class="col-sm-4">										    
							    		<div class="form-control" data-toggle="collapse" data-target="#demomx">
											Show Boot MX / O'neal<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col" >
			                            </div>
			                            <div id="demomx" class="collapse">
			                            	<div id="scroll">	
											   <?php
				                                    foreach ($boot_mx->result() as $bx) {
				                                ?>
				                                	<?php echo form_checkbox('boot_mx[]', $bx->id_boot, set_checkbox('boot_mx[]', $bx->id_boot )); echo $bx->nama; ?> &nbsp; <?php echo $bx->nama_anggota; ?>
				                                    
				                                    <br>
				                                <?php
				                                    }
				                                ?>
			                             	</div>
										</div>						                    
								    </div>
								</div>
								<div class="form-group row">
								    <label for="fullapparel" class="col-sm-2 form-control-label">Full Apparel</label>
								    <div class="col-sm-4">
								      	<input type="text" id="fullapparel" class="form-control" name="fullapparel" value="<?php echo set_value('fullapparel'); ?>" placeholder="">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="biayalain" class="col-sm-2 form-control-label">Biaya Lain</label>
								    <div class="col-sm-4">
								      	<input type="text" id="biayalain" class="form-control" name="biayalain" value="<?php echo set_value('biayalain'); ?>" placeholder="">
								    </div>
								    <label for="fullapparel" class="col-sm-1 form-control-label">Keterangan</label>
								    <div class="col-sm-4">
								      	<textarea id="keterangan" class="form-control" name="keterangan" value="<?php echo set_value('keterangan'); ?>" placeholder=""></textarea>
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
	<script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2016-01-01 10:00",
            minuteStep: 10
        });

        $('.form_datetime').datetimepicker('update', new Date());
    </script>
</body>

</html>
