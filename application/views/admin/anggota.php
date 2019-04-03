<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sawojajar - Dashboard</title>

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
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
				<li class="active">Kelola Anggota</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Kelola Anggota</h1>
				<div class="panel panel-default">
					<div class="panel-heading">Pilih Menu Yang Ingin Anda Kelola : </div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-justified" style="">
				            <li class="active"><a data-toggle="tab" href="#view_anggota">Lihat Data Anggota</a></li> 
				            <li><a data-toggle="tab" href="#input_anggota">Input Data Anggota</a></li>
				        </ul>
				        <div class="tab-content"> <!-- tab data barang start !-->
				        	<div id="view_anggota" class="tab-pane fade in active"> <!-- tab view_barang start !-->
				        		<div class="col-md-12">
				        			<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns=
				        			"true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name=
				        			"name" data-sort-order="desc">
							            <thead>
							                <tr>
							                    <th data-field="no" data-sortable="true">No.</th>
							                    <th data-field="nama-anggota" data-sortable="true"> Nama Anggota</th>
							                    <th data-field="nomor-hp"  data-sortable="true"> Nomor HP</th>
							                    <th data-field="keanggotaan"  data-sortable="true"> Keanggotaan</th>
							                    <th data-field="manage"  data-sortable="false"> Manage</th>
							                </tr>
							            </thead>
							            <tbody>
							                <?php
							                    $i = 1;
							                    foreach ($anggota->result() as $row) {
							                ?>
							                    <tr>
							                        <td><?=$i?></td>
							                        <td><?=$row->nama_anggota?></td>
							                        <td><?=$row->nomor_hp?></td>
							                        <td><?=$row->jenis?></td>
							                        <td>
							                            <a type="button" data-toggle="modal" data-target="#konf_update" class="btn btn-sm btn-warning" href="<?php echo base_url(); ?>admin/anggota/l_update_anggota/<?php echo $row->id_anggota;?>"><span class="glyphicon glyphicon-edit"></span></a>
							                        	<a type="button" onclick="return confirm('apakah anda yakin ingin menghapus?');" href="<?php echo base_url(); ?>admin/anggota/del/<?php echo $row->id_anggota?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							                        	<a type="button" data-toggle="modal" data-target="#rekanan" class="btn btn-sm btn-primary" href="<?php echo base_url() ?>admin/anggota/lihat_profit/<?php echo $row->id_anggota; ?>"><span class="glyphicon glyphicon-print"></span></a>
							                        	<a type="button" data-toggle="modal" data-target="#gaji" class="btn btn-sm btn-success" href="<?php echo base_url() ?>admin/anggota/gaji_pegawai/<?php echo $row->id_anggota; ?>"><span class="glyphicon glyphicon-print"></span></a>
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
							        				<a type="button" class="btn btn-default" href="<?php echo base_url(); ?>admin/anggota/del/<?php echo $row->id_anggota;?>">Ya</a>
										          	<a type="button" class="btn btn-default" data-dismiss="modal">Tidak</a>
										        </div>
							        		</div>
							        	</div>
							        </div><!-- pop up delete motor end-->

							        <div class="modal fade" id="rekanan" role="dialog"> <!-- pop up delete motor start-->
							        	<div class="modal-dialog modal-md">
							        		<div class="modal-content">
							        			
							        		</div>
							        	</div>
							        </div><!-- pop up delete motor end-->

							        <div class="modal fade" id="gaji" role="dialog"> <!-- pop up delete motor start-->
							        	<div class="modal-dialog modal-md">
							        		<div class="modal-content">
							        			
							        		</div>
							        	</div>
							        </div><!-- pop up delete motor end-->

							        <div class="modal fade" id="konf_update" role="dialog" > <!-- pop up update motor start-->
							        	<div class="modal-dialog modal-md">
							        		<div class="modal-content">
							        			
							        		</div>
							        	</div>
							        </div> <!-- pop up update motor end-->
				        		</div>
				        	</div> <!-- tab view_barang end !-->

				        	<div id="input_anggota" class="tab-pane fade in">
				        		<div class="col-md-12">
									<?php $validasi = strlen( validation_errors() ); if ( !empty( $validasi)): ?>
										<p class="alert bg-danger alert-dismissible fade in" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign"></span>
											<button type="button" class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											 </button>
		  									<span>Error: <br /> 
		  									<?php echo str_replace("<p>", "<span>",
		  										str_replace("</p>", "</span><br />", validation_errors())); ?></span>
										</p>
									<?php endif; ?>	
									<?php if($this->session->flashdata('msg')): ?>
									    <p class="alert bg-success alert-dismissible fade in" role="alert">
									    	<span class="glyphicon glyphicon-check"></span>
										    <button type="button" class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											 </button>
									    	<span><?php echo $this->session->flashdata('msg'); ?></span>
									    </p>
									<?php endif; ?>						
								</div>
				        		<div class="col-md-12">
				        			<?php echo validation_errors(); ?>
				        			<?php echo form_open('admin/anggota/ins_anggota'); ?>
				        			<div class="form-group row" >
				        				<label for="nama_anggota" class="col-sm-2 form-control-label"> Nama Anggota</label>
				        				<div class="col-sm-5">
				        					<input type="text" id="nama_anggota" class="form-control" name="nama_anggota" placeholder="Nama Anggota" />
				        				</div>
				        			</div>
				        			<div class="form-group row" >
				        			<label for="nama_anggota" class="col-sm-2 form-control-label"> Jenis Keanggotaan</label>
				        				<div class="col-sm-10">
					        				<select class="form-control col-sm-5" name="jenis">
					        					<option>Anggota</option>
					        					<option>Investor</option>
					        					<option>Marketing</option>
					        				</select>
				        				</div>
				        			</div>	
				        			<div class="form-group row" >
				        				<label for="nomor_hp" class="col-sm-2 form-control-label"> Nomor HP</label>
				        				<div class="col-sm-10">
				        					<input type="text" id="nomor_hp" class="form-control" name="nomor_hp" placeholder="Nomor Hp" />
				        				</div>
				        			</div>
				        			<input type="submit" class="btn btn-primary" value="Submit"></input>
				        			<?php echo form_close(); ?>
				        		</div>
				        	</div>
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
	<script src="<?php echo base_url(); ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
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
