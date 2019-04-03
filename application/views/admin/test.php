<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kaldera - Dashboard</title>

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
				<a class="navbar-brand" href="#"><span>Kaldera</span> Dashboard</a>
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
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> Administrasi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children" id="sub-item-1">
					<li>
						<a class="" href="admin/peminjaman">
							<span class="glyphicon glyphicon-share-alt"></span> Peminjaman
						</a>
					</li>
					<li>
						<a class="" href="admin/pengembalian">
							<span class="glyphicon glyphicon-share-alt"></span> Pengembalian
						</a>
					</li>
					<li>
						<a class="" href="admin/kelola_motor/">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Motor
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kelola_harga_sewa">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Harga Motor
						</a>
					</li>
					<li>
						<a class="" href="admin/kelola_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Data Barang
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/kelola_harga_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Kelola Harga Barang
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>admin/maintanence">
							<span class="glyphicon glyphicon-share-alt"></span> Maintanence
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
						<a class="" href="<?php echo base_url();?>laporan_peminjaman">
							<span class="glyphicon glyphicon-share-alt"></span> Laporan Peminjaman
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>laporan_pengembalian">
							<span class="glyphicon glyphicon-share-alt"></span> Laporan Pengembalian
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>laporan_motor">
							<span class="glyphicon glyphicon-share-alt"></span> Laporan Data Motor
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>laporan_barang">
							<span class="glyphicon glyphicon-share-alt"></span> Laporan Data Barang
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url();?>laporan_maintanence">
							<span class="glyphicon glyphicon-share-alt"></span> Maintanence
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
						<script> 
							$('.sparepart_code').each(function(){
						    var rowid = $(this).data('rowid');
						    $(this).select2({
						        dropdownAutoWidth: true,
						        width: 'resolve',
						        placeholder: 'Search',
						        minimumInputLength: 1,
						        allowClear: true,
						        delay: 2000,
						        ajax: {
						            dataType: "json",
						            url: main_url + '/get_data_sparepart',
						            data: function (term, page) {
						                return {
						                    term: term
						                };
						            },
						            results: function (data) {
						                var results = [];

						                $.each(data, function(index, item){
						                    results.push({
						                        id: item.sparepart_code,
						                        text: item.sparepart_code + ' - ' + item.nama_parts,
						                        rowid: rowid,
						                        nama_parts: item.nama_parts,
						                        id_parts: item.id_parts,
						                        sparepart_code: item.sparepart_code
						                    });
						                });
						                return { results: results };
						            },
						            cache: true
						        }
						    });
						});
						</script>
						<table id="table_list_sparepart" class="table table_list table-striped table-hover table-bordered dataTable">
						    <thead>
						        <tr>
						            <th style="width:2%;">No</th>
						            <th style="width:10%;">Kode Parts</th>
						            <th style="width:20%;">Nama Parts</th>
						            <th style="width:3%;">Qty</th>
						            <th style="width:8%;">Harga</th>
						            <th style="width:10%;">Subtotal</th>
						        </tr>
						    </thead>
						    <tbody>
						        <?php for($i=0; $i<10; $i++): ?>
						        <tr data-rowid="<?php echo $i; ?>">
						            <td align="center"><div class="text-center"><?php echo $i+1; ?></div></td>
						            <td>
						                <input type="hidden" data-rowid="<?php echo $i; ?>" class="sparepart_code span12" id="sparepart_code_<?php echo $i; ?>" name="sparepart_code_<?php echo $i; ?>" value="" />
						                <input type="hidden" data-rowid="<?php echo $i; ?>" class="id_parts" id="id_parts_<?php echo $i; ?>" name="id_parts_<?php echo $i; ?>" value="" />
						            </td>
						            <td><input type="text" readonly="true" class="nama_parts span12" id="nama_parts_<?php echo $i; ?>" name="nama_parts_<?php echo $i; ?>" value="" /></td>
						            <td><input type="text" data-rowid="<?php echo $i; ?>" class="sales_item_qty inputnumber span12" id="sales_item_qty_<?php echo $i; ?>" name="sales_item_qty_<?php echo $i; ?>" value="" /></td>
						            <td><input type="text" readonly="true" data-rowid="<?php echo $i; ?>" class="sparepart_hargajual span12" id="sparepart_hargajual_<?php echo $i; ?>" name="sparepart_hargajual_<?php echo $i; ?>" value="" /></td>
						            <td><input type="text" data-rowid="<?php echo $i; ?>" readonly="true" class="subtotal span12" id="subtotal_<?php echo $i; ?>" name="subtotal_<?php echo $i; ?>" value="" /></td>
						        </tr>
						        <?php endfor; ?>
						    </tbody>
						</table>
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
            startDate: "2013-02-14 10:00",
            minuteStep: 10
        });
    </script>
</body>

</html>
