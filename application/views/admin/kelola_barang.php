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
				<li class="active">Kelola Apparel</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Kelola Apparel</h1>
				<div class="panel panel-default">
					<div class="panel-heading">Pilih Menu Yang Ingin Anda Kelola : </div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-justified" style="">
				            <li class="active"><a data-toggle="tab" href="#view_barang">Lihat Data Apparel</a></li> 
				            <li><a data-toggle="tab" href="#input_barang">Input Data Apparel</a></li>
				            <li><a data-toggle="tab" href="#kelola_oneal">Kelola Oneal / MX</a></li>
				        </ul>
				        <div class="tab-content"> <!-- tab data barang start !-->
				        	<div id="view_barang" class="tab-pane fade in active"> <!-- tab view_barang start !-->
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
							                    <th data-field="manage"  data-sortable="false"> Manage</th>
							                    
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
							                        <td>
							                            <a type="button" data-toggle="modal" data-target="#konf_update" class="btn btn-sm btn-warning" href="<?php echo base_url(); ?>admin/kelola_barang/oup/<?php echo $row->id_perlengkapan;?>"><span class="glyphicon glyphicon-edit"></span></a>
							                        	<a type="button" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" href="<?php echo base_url(); ?>admin/kelola_barang/odm/<?php echo $row->id_perlengkapan?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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
							        				<a type="button" class="btn btn-default" href="<?php echo base_url(); ?>admin/kelola_barang/odp/<?php echo $row->id_perlengkapan;?>">Ya</a>
										          	<a type="button" class="btn btn-default" data-dismiss="modal">Tidak</a>
										        </div>
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

				        	<div id="input_barang" class="tab-pane fade in">
				        		<div class="col-md-12">
				        			<form method="post" action="<?= base_url()?>admin/kelola_barang/sdp">
										<table>
											<div class="form-group row">
											    <label for="jenisPerlengkapan" class="col-sm-2 form-control-label">Jenis Perlengkapan</label>
											    <div class="col-sm-10">
											      <select id="jenisPerlengkapan" class="form-control" name="jenis_perlengkapan">
            											<option>Pilih Jenis Perlengkapan</option>
             											<option value="B">B</option>
             											<option value="EP">EP</option>
             											<option value="KP">KP</option>
             											<option value="GL">GL</option>
             											<option value="J">J</option>
             											<option value="G">G</option>
             											<option value="H">H</option>
                                                   </select>
											    </div>
											</div>
											<div class="form-group row">
											    <label for="jumlahPerlengkapan" class="col-sm-2 form-control-label">Jumlah Perlengkapan</label>
											    <div class="col-sm-10">
											      <input type="text" id="jumlahPerlengkapan" class="form-control" name="jumlah_perlengkapan" placeholder="Jumlah Perlengkapan"/>
											    </div>
											</div>		
											
											<div class="form-group row">
											    <label for="kondisiPerlengkapan" class="col-sm-2 form-control-label">Kondisi</label>
											    <div class="col-sm-10">
											      <select id="kondisiPerlengkapan" class="form-control" name="kondisi">
            											<option>Pilih Kondisi Apparel</option>
                         								<option value="baik">Baik</option>
                         								<option value="Sedang">Sedang</option>
                         								<option value="buruk">Buruk</option>
                                                   </select>
											    </div>
											</div>
											<input type="submit" class="btn btn-primary" value="Submit" />
										</table>
									</form>
				        		</div>
				        	</div>
				        	<div id="kelola_oneal" class="tab-pane fade in">				        		
			        			<ul class="nav nav-pills nav-justified" style="">
						            <li class="active"><a data-toggle="tab" href="#view_oneal">Lihat Data Oneal / MX</a></li> 
						            <li><a data-toggle="tab" href="#input_oneal">Input Data Oneal</a></li>
						        </ul>
				        		
				        		<div class="tab-content">
				        			<div id="view_oneal" class="tab-pane fade in active">
				        				<div class="col-md-12">
				        					<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns=	
				        			"true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name=
				        			"name" data-sort-order="desc">
									            <thead>
									                <tr>
									                    <th data-field="no" data-checkbox="true">No.</th>
									                    <th data-field="no-barang" data-sortable="true"> Nama Boot</th>
									                    <th data-field="jenis-barang"  data-sortable="true"> Nama Anggota</th>
									                    <th data-field="manage"  data-sortable="false"> Manage</th>
									                    
									                </tr>
									            </thead>
									            <tbody>
									                <?php
									                    $i = 0 ;
									                    foreach ($listoneal->result() as $row) {
									                ?>
									                    <tr>
									                        <td><?=$i?></td>
									                        <td><?=$row->nama?></td>
									                        <td><?=$row->nama_anggota?></td>
									                        <td>
									                            <a type="button" data-toggle="modal" data-target="#update_oneal" class="btn btn-sm btn-warning" href="<?php echo base_url(); ?>admin/kelola_barang/upd_oneal/<?php echo $row->id_boot;?>"><span class="glyphicon glyphicon-edit"></span></a>
									                        	<a type="button" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" href="<?php echo base_url(); ?>admin/kelola_barang/del_mx/<?php echo $row->id_boot?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									                        </td>
									                    </tr>
									                <?php
									                    $i++;
									                    }
									                ?>   
									            </tbody> 
									        </table>
				        				</div>
				        			</div>

					        		<div id="input_oneal" class="tab-pane fade in">
					        			<div class="col-md-12">
					        				<form method="post" action="<?= base_url()?>admin/kelola_barang/ins_oneal">
												<table>
													<div class="form-group row">
													    <label for="nama_boot" class="col-sm-2 form-control-label">Nama Boot</label>
													    <div class="col-sm-4">
													      <input type="text" id="namaboot" class="form-control" name="namaboot" placeholder="Nama Boot"/>
													    </div>
													</div>		
													
													<div class="form-group row">
													    <label for="namaanggota" class="col-sm-2 form-control-label">Nama Anggota</label>
													    <div class="col-sm-4">
													    	<select name="namaanggota" class="form-control">
									                            <option value="">Nama Anggota</option>
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
													<input type="submit" class="btn btn-primary" value="Submit" />
												</table>
											</form>
					        			</div>
					        		</div>

					        		<div class="modal fade" id="update_oneal" role="dialog" > <!-- pop up update motor start-->
							        	<div class="modal-dialog modal-md">
							        		<div class="modal-content">
							        			
							        		</div>
							        	</div>
							        </div> <!-- pop up update motor end-->
				        		</div>		
				        	</div>
				        </div> <!-- tab data Apparel end !-->
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
