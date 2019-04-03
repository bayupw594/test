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
			<li class="active"><a href="home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
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
						<a class="" href="<?php echo base_url();?>admin/peminjamandp">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman DP
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/peminjamanlunas">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman Lunas
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
						<a class="" href="<?php echo base_url();?>admin/kelola_motor">
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
						<a class="" href="<?php echo base_url(); ?>laporan/laporan_pengembalian">
							<span class="glyphicon glyphicon-share-alt"></span> Laporan Pengembalian
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
				<li class="active">Peminjaman Dp</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Peminjaman Dp</h1>
				<div class="panel panel-default">
					<div class="panel-heading">Pilih Menu Yang Ingin Anda Kelola : </div>
					<div class="panel-body">
				        <div class="tab-content"> <!-- tab data barang start !-->
				        	<!--div id="view_barang" class="tab-pane fade in active"> <!-- tab view_barang start !-->
				        		<div class="col-md-12">
				        			<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns=
				        			"true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name=
				        			"name" data-sort-order="desc">
							            <thead>
							                <tr>
							                    <th data-field="no" data-checkbox="true">No.</th>
							                    <th data-field="nama" data-sortable="true"> Nama Peminjam</th>
							                    <th data-field="no_ktp"  data-sortable="true"> Nomer KTP</th>
							                    <th data-field="tgl"  data-sortable="true"> Tanggal Pinjam</th>
							                    <th data-field="dp"  data-sortable="true"> Jumlah Dp</th>
							                    <th data-field="sisa"  data-sortable="true"> Sisa Dp</th>
							                    <th data-field="manage"  data-sortable="false"> Manage</th>
							                    
							                </tr>
							            </thead>
							            <tbody>
							                <?php
							                    $i = 1 ;
							                    foreach ($cp->result() as $row) {
							                ?>
							                    <tr>
							                        <td><?=$i?></td>
							                        <td><?=$row->Nama_Peminjam?></td>
							                        <td><?=$row->No_KTP?></td>
							                        <td><?=$row->Tanggal?></td>
							                        <td><?=$row->nominal_pertama?></td>
							                        <td><?=$row->sisa?></td>
							                        <td>
							                            <a type="button" data-toggle="modal" data-target="#lihat" href="<?php echo base_url(); ?>admin/verifikasipinjaman/lihat/<?php echo $row->Id_Peminjamanan?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span></a>
							               				<!--a type="button" data-toggle="modal" data-target="#konf" href="<?php echo base_url(); ?>admin/pengembalian/detpin/<?php echo $row->Id_Peminjamanan?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok"></span></a-->
							                        </td>
							                    </tr>
							                <?php
							                    $i++;
							                    }
							                ?>   
							            </tbody> 
							        </table> 
							        <div class="modal fade" id="lihat" role="dialog"> <!-- pop up lihat start-->
							        	<div class="modal-dialog modal-md">
							        		<div class="modal-content">
    
							        		</div>
							        	</div>
							        </div><!-- pop up lihat end-->

							        <div class="modal fade" id="konf" role="dialog" > <!-- pop up update motor start-->
							        	<div class="modal-dialog modal-md">
							        		<div class="modal-content">
							        			
							        		</div>
							        	</div>
							        </div> <!-- pop up update motor end-->
				        		</div>
				        	<!--/div> <!-- tab view_barang end !-->
				        </div> <!-- tab data barang end !-->
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
	<script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2013-02-14 10:00",
            minuteStep: 10
        });
    </script>
</body>

</html>
