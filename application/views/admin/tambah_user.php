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
				<li class="active">Manage User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Manage User</h1>
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="nav nav-pills nav-justified" style="">
				            <li class="active"><a data-toggle="tab" href="#list">List User</a></li>
							<li><a data-toggle="tab" href="#tambah">Tambah User</a></li>  
				        </ul>
				        <div class="tab-content"> <!-- tab content start !-->
				        	<div id="tambah" class="tab-pane fade in"> <!-- tab list user start !-->
								<div class="col-lg-12">
									<?php $validasi = strlen( validation_errors() ); if ( !empty( $validasi ) ): ?>
										<p class="alert bg-danger alert-dismissible fade in" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign"></span>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
									    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											 </button>
									    	<span><?php echo $this->session->flashdata('msg'); ?></span>
									    </p>
									<?php endif; ?>						
								</div>
								<div class="col-lg-12">
									<?php echo form_open('admin/tambah_user/tambah_user'); ?>
										<div class="form-group row">
										    <label for="username" class="col-sm-2 form-control-label">Username</label>
										    <div class="col-sm-10">
										      <input type="text" id="username" class="form-control" name="username" placeholder="Username"/>
										    </div>
										 </div>
										 <div class="form-group row">
										    <label for="pass_lama" class="col-sm-2 form-control-label">Password</label>
										    <div class="col-sm-10">
										      <input type="password" id="pass_1" class="form-control" name="password" placeholder="Password"/>
										    </div>
										 </div>
										 <div class="form-group row">
										    <label for="pass_baru" class="col-sm-2 form-control-label">Ulangi Password</label>
										    <div class="col-sm-10">
										      <input type="password" id="pass_2" class="form-control" name="pass_2" placeholder="Ulangi Password"/>
										    </div>
										 </div>
										 <div class="form-group row">
										    <label for="ulangi" class="col-sm-2 form-control-label">Level</label>
										    <div class="col-sm-10">
										      <select name="level" class="form-control">
										      	<option>Level</option>
										      	<option value="1">Admin</option>
										      	<option value="2">User</option>
										      </select>
										    </div>
										 </div>
										<input type="submit" class="btn btn-primary" value="Submit" />
									</form>
								</div>
							</div><!-- tab list user end-->

							<div id="list" class="tab-pane fade in active"> <!-- tambah user start -->
								<div class="table-responsive"> <!--tabel responsive-->
					        		<div class="col-md-12">
					        			<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
								            <thead>
								                <tr>
													<th data-field="no" data-checkbox="true"> No</th>
 								                    <th data-field="username" data-checkbox="true"> Username</th>
								                    <th data-field="level" data-checkbox="true"> Level</th>
								                    <th data-field="manage" data-checkbox="true"> Manage</th>
								                </tr>
								            </thead>
								            <tbody>
								                <?php
								                    $i = 1;
								                    foreach ($list->result() as $row) {
								                    $level = $row->level;
								                ?>
								                    <tr>
								                        <td><?=$i?></td>
								                        <td><?=$row->username?></td>
								                        <td><?php
									                        	if($level == 1){
									                        		echo "Admin";
									                        	} else {
									                        		echo "User";
									                        	}
								                        	?>
								                        </td>
								                        <td>
								                            <a type="button" onclick="return confirm('apakah anda yakin ingin menghapus?');" href="<?php echo base_url(); ?>admin/tambah_user/del/<?php echo $row->username?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
								                        </td>
								                        <td>
								                            
								                        </td>
								                    </tr>
								                <?php
								                    $i++;
								                    }  
								                ?>   
								            </tbody> 
								        </table> 
					        		</div>
					        	</div><!-- table responsive end -->
							</div><!-- tambah user end -->
						</div><!-- tab content end -->
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
