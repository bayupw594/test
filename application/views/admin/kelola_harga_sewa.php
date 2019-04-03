<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sawojajar - Dashboard</title>

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
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
							<li><a href="<?php echo base_url();?>admin/tambah_user"><span class="glyphicon glyphicon-plus"></span> Manage User</a></li>
							<li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
			<li class="active"><a href="<?php echo base_url(); ?>home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
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
				<li class="active">Kelola Harga Sewa Motor</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Kelola Harga Sewa Motor</h1>
				<div class="panel panel-default">
					<div class="panel-heading">Pilih Menu Yang Ingin Anda Kelola : </div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-justified" style="">
				            <li class="active"><a data-toggle="tab" href="#view_motor">Lihat Data Harga Sewa</a></li> 
				            <li><a data-toggle="tab" href="#input_motor">Input Data Harga Sewa</a></li>     
				        </ul>
				        <div class="tab-content"> <!-- tab data motor start !-->
				        	<div id="view_motor" class="tab-pane fade in active"> <!-- view data motor start !-->
			        			<div class="table-responsive"> <!--tabel responsive-->
					        		<div class="col-md-12">
					        			<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns=
					        			"true" data-search="true" data-select-item-name="toolbar1" data-sort-name=
					        			"name" data-sort-order="desc">
								            <thead>
								                <tr>
								                    <th data-field="no" data-checkbox="true">No.</th>
								                    <th data-field="nama-pemilik"  data-sortable="true"> Type Motor</th>
								                    <th data-field="type"  data-sortable="true"> Hari Sewa</th>
								                    <th data-field="no-rangka"  data-sortable="true"> Lama Sewa</th>
								                    <th data-field="no-regist" data-sortable="true"> Harga Sewa</th>
								                    <th data-field="manage"  data-sortable="true"> Manage</th>
								                </tr>
								            </thead>
								            <tbody>
								                <?php
								                    $i = 0 ;
								                   foreach ($listhargasewa->result() as $row) {
								                ?>
								                    <tr>
								                        <td><?=$i?></td>
								                        <td><?=$row->tipe_motor?></td>
								                        <td><?=$row->hari?></td>	
								                        <td><?=$row->jam?> jam</td>
								                        <td>Rp.<?=$row->harga_sewa?></td>
								                        <td>
								                        	<a type="button" data-toggle="modal" data-target="#konf_update" href="<?php echo base_url(); ?>admin/kelola_harga_sewa/update/<?php echo $row->kode_harga?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
								                        	<a type="button" onclick="return confirm('apakah anda yakin ingin menghapus?');" href="<?php echo base_url(); ?>admin/kelola_harga_sewa/hapus/<?php echo $row->kode_harga?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								                        </td>
								                    </tr>
								                <?php
								                    $i++;
								                    }
								                ?>
								                   
								            </tbody> 
								        </table> 
								        
								        <div class="modal fade" id="konf_del" role="dialog"> <!-- pop up delete motor start-->
								        	<div class="modal-dialog modal-sm">
								        		<div class="modal-content">
								        			<div class="modal-header">
								        				<button type="button" class="close" data-dismiss="modal">&times;</button>
	          											<h4 class="modal-title">Peringatan !</h4>
								        			</div>		
								        			<div class="modal-body">
								        				<p>Apakah Anda Yakin Ingin Menghapus?</p>
								        			</div>
								        			<div class="modal-footer">
								        				<a type="button" class="btn btn-default" href="">Ya</a>
											          	<a type="button" class="btn btn-default" data-dismiss="modal">Tidak</a>
											        </div>
								        		</div>
								        	</div>
								        </div><!-- pop up delete motor end-->

								        <div class="modal fade in" id="konf_update" role="dialog" > <!-- pop up update motor start-->
								        	<div class="modal-dialog modal-md">
								        		<div class="modal-content">
								        			
								        		</div>
								        	</div>
								        </div> <!-- pop up update motor end-->
					        		</div>
				        		</div>
				        	</div> <!-- view data motor end !-->

				        	<div id="input_motor" class="tab-pane fade"> <!-- input data motor start !-->
				        		<div class="col-md-12">
				        			<form method="post" action="<?php echo base_url(); ?>admin/kelola_harga_sewa/savedata">
					                     <div class="form-group row">
										    <label for="nama_pemilik1" class="col-sm-2 form-control-label">Type Motor</label>
										    <div class="col-sm-10">
										      <input type="text" id="nama_pemilik1" class="form-control" name="tipe_motor" placeholder="Type Motor">
										    </div>
										 </div> 
										 <div class="form-group row">
										    <label for="types1" class="col-sm-2 form-control-label">Hari</label>
										    <div class="col-sm-10">
										      <input type="text" id="types1" class="form-control" name="hari" placeholder="hari Sewa">
										    </div>
										 </div> 
										 <div class="form-group row">
										    <label for="no_rangka1" class="col-sm-2 form-control-label">Jam</label>
										    <div class="col-sm-10">
										      <input type="text" id="no_rangka1" class="form-control" name="jam" placeholder="Lama Sewa">
										    </div>
										 </div> 
										 <div class="form-group row">
										    <label for="no_regs1" class="col-sm-2 form-control-label">Harga Sewa</label>
										    <div class="col-sm-10">
										      <input type="text" id="no_regs1" class="form-control" name="harga_sewa" placeholder="Harga Sewa">
										    </div>
										 </div>
										 <input type="Submit" class="btn btn-primary" />
						            </form>
				        		</div>
				        	</div><!-- input data motor end !-->
				        </div> <!-- tab data motor end !-->
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
