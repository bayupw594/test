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
				<a class="navbar-brand" href="home"><span>Sawojajar</span> Dashboard</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $username ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url();?>ganti_pass"><span class="glyphicon glyphicon-pencil"></span> Ganti Password</a></li>
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
			<li class=""><a href="home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
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
				<li class="active">Admin</li>
				<li class="active">Kelola Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Kelola Barang</h1>
				<div class="panel panel-default">
					<div class="panel-heading">Berikut Adalah Data Barang </div>
					<div class="panel-body">				        
		        		<div class="col-md-12">
		        			<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns=
		        			"true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name=
		        			"name" data-sort-order="desc">
					            <thead>
					                <tr>
					                    <th data-field="no" data-checkbox="true">No.</th>
					                    <th data-field="no-barang" data-sortable="true"> Id Perlengkapan</th>
					                    <th data-field="jenis-barang"  data-sortable="true"> Jenis Perlengkapan</th>
					                    <th data-field="jumlah-barang"  data-sortable="true"> Jumlah Perlengkapan</th>
					                    <th data-field="kondisi-barang"  data-sortable="true"> Kondisi</th>
					                </tr>
					            </thead>
					            <tbody>
					                <?php
					                    $i = 0 ;
					                    foreach ($listperlengkapan->result() as $row) {
					                ?>
					                    <tr>
					                        <td><?=$i?></td>
					                        <td><?=$row->id_perlengkapan?></td>
					                        <td><?=$row->jenis_perlengkapan?></td>
					                        <td><?=$row->jumlah_perlengkapan?></td>
					                        <td><?=$row->kondisi?></td>			                        
					                    </tr>
					                <?php
					                    $i++;
					                    }
					                ?>   
					            </tbody> 
					        </table>
		        		</div>
					</div>	
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-table.js"></script>
	<script type="text/javascript">
		$('body').on('hidden.bs.modal', '.modal', function () {
		  $(this).removeData('bs.modal');
		});
	</script>	
</body>

</html>
