<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sawojajar - Dashboard</title>

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">

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
			<li class="parent">
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
				<li class="active">Ganti Password</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ganti Password</h1>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-lg-12">
							<?php $validasi = strlen( validation_errors() ); if ( !empty( $validasi) ): ?>
								<p class="alert bg-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign"></span>
  									<span>Error: <br /> 
  									<?php echo str_replace("<p>", "<span>",
  										str_replace("</p>", "</span><br />", validation_errors())); ?></span>
								</p>
							<?php endif; ?>	
							<?php if($this->session->flashdata('msg')): ?>
							    <p class="alert bg-success" role="alert">
							    	<span class="glyphicon glyphicon-check"></span>
							    	<span><?php echo $this->session->flashdata('msg'); ?></span>
							    </p>
							<?php endif; ?>						
						</div>
						<div class="col-lg-12">
							<?php echo form_open('ganti_pass/ganti_pass'); ?>
								<div class="form-group row">
								    <label for="username" class="col-sm-2 form-control-label">Username</label>
								    <div class="col-sm-10">
								      <input type="text" value="<?php echo $username;?>" id="username" class="form-control" name="username" placeholder="Nama Parts" readonly="readonly"/>
								    </div>
								 </div>
								 <div class="form-group row">
								    <label for="pass_lama" class="col-sm-2 form-control-label">Password Lama</label>
								    <div class="col-sm-10">
								      <input type="password" id="pass_lama" class="form-control" name="pass_lama" placeholder="Password Lama"/>
								    </div>
								 </div>
								 <div class="form-group row">
								    <label for="pass_baru" class="col-sm-2 form-control-label">Password Baru</label>
								    <div class="col-sm-10">
								      <input type="password" id="pass_baru" class="form-control" name="pass_baru" placeholder="Password Baru"/>
								    </div>
								 </div>
								 <div class="form-group row">
								    <label for="ulangi" class="col-sm-2 form-control-label">Ulangi Password</label>
								    <div class="col-sm-10">
								      <input type="password" id="ulangi" class="form-control" name="ulangi" placeholder="Ulangi Password"/>
								    </div>
								 </div>
								<input type="submit" class="btn btn-primary" value="Submit" />
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</body>

</html>
