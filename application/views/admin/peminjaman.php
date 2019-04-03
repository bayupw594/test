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

<style>
.hiden {
	display: none;
}
</style>
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
							<?php echo form_open('admin/peminjaman/ps'); ?>
								<div class="form-group row">
								 	<label for="tgl" class="col-sm-2 form-control-label">Tanggal Sewa</label>
									<div class="col-sm-4">
										<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
						                    <input class="form-control" value="<?php echo set_value('tgl_berangkat'); ?>" name="tgl_berangkat" type="text" value="" readonly>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                </div>
						                <input type="hidden" id="dtp_input1" value="" />
									</div>
									<label for="tgl" class="col-sm-1 form-control-label">Tanggal Kembali</label>
									<div class="col-sm-4">
										<div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
						                    <input class="form-control" value="<?php echo set_value('tgl_kembali'); ?>" name="tgl_kembali" type="text" value="">
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                </div>
						                <input type="hidden" id="dtp_input1" value="" />
									</div>
								</div>
								<div class="form-group row">
								 	<label for="tgl" class="col-sm-2 form-control-label">
									 Motor
									</label>
									<div class="col-sm-4">
										<input type="radio" name="jenis_kendaraan" onclick="show1();">
									</div>
									<label for="tgl" class="col-sm-1 form-control-label">
										Mobil
									</label>
									<div class="col-sm-4">
										<input type="radio" name="jenis_kendaraan" onclick="show2();">
									</div>
								</div>
								<!---->
								<div class="form-group row" id="div2">
									<?php
						                foreach ($d_motor->result() as $motors) {
						            ?>
									<label for="sim" class="col-sm-2 form-control-label"><?php echo $motors->type_motor;?></label>
										<div class="col-sm-4">										    
											<div class="form-control" data-toggle="collapse" data-target="#demo1">
															Show Motor<img src="<?php echo "base_url();img/down.png";?>" width="25" class="col" >
											</div>
												
												<div id="demo1" class=\"collapse">
													<div id="scroll">
														<input type="checkbox" value="<?php echo "set_checkbox('libur[]')";?>" class="" name="libur[]" /><b> <?php echo $motors->nopol;?><br>
													</div>
												</div>
												</div>
									<?php
						                }
						            ?>
								</div>
								<div class="form-group row" id="div1">
									<?php
						                foreach ($d_mobil->result() as $mobils) {
						            ?>
									<label for="sim" class="col-sm-2 form-control-label"><?php echo $mobils->type_motor;?></label>
												<div class="col-sm-4">										    
													<div class="form-control" data-toggle="collapse\" data-target="<?php echo "#demo1";?>">
															Show Mobil<img src="<?php echo "base_url();img/down.png";?>" width="25" class="col" >
													</div>
												
												<div id="demo1" class=\"collapse">
													<div id="scroll">
														<input type="checkbox" value="<?php echo "set_checkbox('libur[]')";?>" class="" name="libur[]" /><b> Motor 1<br>
														<input type="checkbox" value="<?php echo "set_checkbox('libur[]')";?>" class="" name="libur[]" /><b> Motor 2<br>
													</div>
												</div>
												</div>
									<?php
						                }
						            ?>
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
            format: "yyyy-mm-dd",
            autoclose: true,
            todayBtn: true,
            startDate: "2016-01-01 10:00",
            minuteStep: 10
        });

        $('.form_datetime').datetimepicker('update', new Date());
    </script>
	<script type="text/javascript">
		function show1(){
			document.getElementById('div1').style.display ='none';
			document.getElementById('div2').style.display ='block';
		}
		function show2(){
			document.getElementById('div1').style.display = 'block';
			document.getElementById('div2').style.display ='none';
		}
	</script>
</body>

</html>
