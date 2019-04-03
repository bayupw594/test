<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sawojajar - Dashboard</title>

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>js/select2/dist/css/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/select2/dist/js/select2.min.js"></script>

<script> 
		$('.nama_parts').each(function(){
			var baseurl = "<?php print base_url() ?>";
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
		            url: baseurl + '/admin/maintanence/get_data_sparepart',
		            data: function (term, page) {
		                return {
		                    term: term
		                };
		            },
		            results: function (data) {
		                var results = [];

		                $.each(data, function(index, item){
		                    results.push({
		                        id: item.id_parts,
		                        text: item.nama_parts,
		                        rowid: rowid,
		                        harga_parts: item.harga_parts,
		                        id_parts: item.id_parts,
		                        nama_parts: item.nama_parts
		                    });
		                });
		                return { results: results };
		            },
		            cache: true
		        }
		    });
		});
	</script>
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
			<li class="active"><a href="<?php echo base_url();?>home"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
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
				<li class="active">Maintanence</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin Maintanence</h1>
				<div class="panel panel-default"> <!--content start !-->
					<div class="panel-heading">Pilih Menu Yang Ingin Anda pilih : </div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-justified" style="">
				            <li class="active"><a data-toggle="tab" href="#maintanence">Maintanence</a></li>
							<li><a data-toggle="tab" href="#lihat_parts">Lihat Parts</a></li>  
				            <li><a data-toggle="tab" href="#input_parts">Input Parts</a></li> 
				        </ul>
				        <div class="tab-content">
				        	<div id="maintanence" class="tab-pane fade in active"><!-- maintanence start !-->
				        		<div class="col-md-12">	
									<div class="form-group row">
						                <label for="noreg" class="col-sm-2 form-control-label">No Motor</label>
						                <div class="col-sm-4">
						                	<?php
								                $dd_noreg_attribute = 'class="form-control select2 noreg" ';
								                echo form_dropdown('nama_noreg', $dd_noreg, $noreg_selected, $dd_noreg_attribute);
								            ?>
						                </div>
						                <label for="admin" class="col-sm-1 form-control-label">Admin</label>
									    <div class="col-sm-5">
									      <input type="text" id="admin" class="form-control" name="admin" readonly="readonly" value="<?php echo $username ?>"/>
									    </div>
							        </div>
							        <div class="form-group row">
									    <label for="pekerjaan" class="col-sm-2 form-control-label">Pekerjaan</label>
									    <div class="col-sm-4">
									      <textarea id="pekerjaan" rows="4" class="form-control" name="pekerjaan" placeholder="Masukan Apa Saja Pekerjaan Yang Dilakukan"></textarea>
									    </div>
									    <label for="pengerja" class="col-sm-1 form-control-label">Pengerja</label>
									    <div class="col-sm-5">
									      <input type="text" id="pengerja" class="form-control" name="pengerja" placeholder="Nama Pengerja"/> </br>
									    </div>
								    	<label for="service" class="col-sm-1 form-control-label">Biaya Service</label>
									    <div class="col-sm-5">
									      <input type="text" id="service" class="form-control" name="service" placeholder="Biaya Service"/>
									    </div>
									</div>
									<div class="form-group row">
										<label for="tanggal" class="col-sm-2 form-control-label">Tanggal</label>
									    <div class="col-sm-4">
									      <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1">
						                    <input class="form-control" value="" name="tanggal" type="text" value="" readonly>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						                   </div>
						                <input type="hidden" id="dtp_input1" value="" />
									    </div>
									</div>
									
									<table id="table_list_sparepart" class="table table_list table-striped table-hover table-bordered dataTable" data-table-id="sparepart">
									    <thead>
									        <tr>
									            <th style="width:2%;">No</th>
									            <th style="width:10%;">Nama Parts</th>
									            <th style="width:3%;">Harga Satuan</th>
									            <th style="width:8%;">Jumlah</th>
									            <th style="width:10%;">Subtotal</th>
									        </tr>
									    </thead>
									    <tbody>
									        <?php for($i=0; $i<10; $i++): ?>
									        <tr data-rowid="<?php echo $i; ?>">
									        	<td align="center"><div class="text-center"><?php echo $i+1; ?></div></td>
									            <td>
										            <?php
										                $dd_parts_attribute = 'class="form-control select2 no_parts" ';
										                echo form_dropdown('nama_parts_'. $i .'', $dd_parts, $parts_selected, $dd_parts_attribute);
										            ?>
										        </td>
									            <td><input type="text" data-rowid="<?php echo $i; ?>" readonly="true" class="harga_parts span12" id="harga_parts_<?php echo $i; ?>" name="harga_<?php echo $i; ?>" value="" /></td>
									            <td><input type="text" data-rowid="<?php echo $i; ?>" class="jumlah_parts span12" id="jumlah_parts_<?php echo $i; ?>" name="jumlah_parts_<?php echo $i; ?>" value="" /></td>
									            <td><input type="text" data-rowid="<?php echo $i; ?>" readonly="true" class="subtotal span12" id="subtotal_<?php echo $i; ?>" name="subtotal_<?php echo $i; ?>" value="" /></td>
									        	
									        </tr>
									        <?php endfor; ?>
									    </tbody>
									</table>
									<input type="text" name="total_semua"/>
									<button class="btn btn-primary" data-id='simpan-data-sparepart'>Simpan</button>
				        		</div>
				        	</div><!-- maintanence end !-->

				        	<div id="input_parts" class="tab-pane fade in"><!-- input_parts start !-->
				        		<div class="col-md-12">
				        			<form method="post" action="<?= base_url()?>admin/maintanence/ins_parts">
										<div class="form-group row">
										    <label for="NamaParts" class="col-sm-2 form-control-label">Nama Parts</label>
										    <div class="col-sm-10">
										      <input type="text" id="NamaParts" class="form-control" name="nama_parts" placeholder="Nama Parts"/>
										    </div>
										 </div>
										 <div class="form-group row">
										    <label for="JenisParts" class="col-sm-2 form-control-label">Jenis Parts</label>
										    <div class="col-sm-10">
										      <input type="text" id="JenisParts" class="form-control" name="jenis_parts" placeholder="Jenis Parts"/>
										    </div>
										 </div>
										 <div class="form-group row">
										    <label for="HargaParts" class="col-sm-2 form-control-label">Harga Parts</label>
										    <div class="col-sm-10">
										      <input type="text" id="HargaParts" class="form-control" name="harga_parts" placeholder="Harga Parts"/>
										    </div>
										 </div>
										<input type="submit" class="btn btn-primary" value="Submit" style="position:center;" />
									</form>
				        		</div>
				        	</div><!-- input_parts end !-->

				        	<div id="lihat_parts" class="tab-pane fade in"><!-- lihat_parts start !-->
				        		<div class="col-md-12">
				        			<table data-toggle="table" data-show-refresh="" data-show-toggle="" data-show-columns=
				        			"true" data-search="" data-select-item-name="toolbar1" data-pagination="true" data-sort-name=
				        			"name" data-sort-order="desc">
							            <thead>
							                <tr>
							                    <th data-field="no" data-checkbox="true">No.</th>
							                    <th data-field="no-parts" data-sortable="true"> Id Parts</th>
							                    <th data-field="nama-parts"  data-sortable="true"> Nama Parts</th>
							                    <th data-field="jenis-parts"  data-sortable="true"> Jenis Parts</th>
							                    <th data-field="harga-parts"  data-sortable="true"> Harga Parts</th>
							                    <th data-field="manage"  data-sortable="true"> Manage</th>
							                </tr>
							            </thead>
							            <tbody>
							               <?php
							                    $i = 0 ;
							                   foreach ($getparts->result() as $row) {
							                ?>
							                    <tr>
							                        <td><?=$i?></td>
							                        <td><?=$row->id_parts?></td>
							                        <td><?=$row->nama_parts?></td>
							                        <td><?=$row->jenis_parts?></td>
							                        <td><?=$row->harga_parts?></td>
							                        <td>
							                        	<a type="button" data-toggle="modal" data-target="#konf_update" href="<?php echo base_url(); ?>admin/maintanence/updt_parts/<?php echo $row->id_parts?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
							                        	<a type="button" onclick="return confirm('apakah anda yakin ingin menghapus?');" href="<?php echo base_url(); ?>admin/maintanence/delete_parts/<?php echo $row->id_parts?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							                        </td>
							                    </tr>
							                <?php 
							                		$i++;
							                	}
							                ?>
							            </tbody> 
							        </table>
				        		</div>
				        		<div class="modal fade" id="konf_update" role="dialog" > <!-- pop up update motor start-->
						        	<div class="modal-dialog modal-md">
						        		<div class="modal-content">
						        			
						        		</div>
						        	</div>
						        </div> <!-- pop up update motor end-->
				        	</div><!-- lihat_parts end !-->
				        </div>
					</div>
				</div> <!--content end !-->
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script type="text/javascript">
		$('body').on('hidden.bs.modal', '.modal', function () {
		  $(this).removeData('bs.modal');
		});
	</script>
	<script>
		var baseurl = "<?php print base_url() ?>";
    	var array_detect_ctor = function( q ) {
    		return q.constructor === window.Array;
    	};

        $(".noreg").select2({
            placeholder: "Masukan Nomor Motor"
        });

        $(".no_parts").select2({
            placeholder: "Masukan Parts"
        });

        $("select[name*='nama_parts_']").on("change", function() {
        	window.nama_parts_index = $(this).attr("name").split("_")[2];
        	$.ajax({
            	url: baseurl + "admin/maintanence/wkwk",
            	type: "POST",
            	dataType: "json",
            	async: true,
            	data: "nama_parts=" + $(this).val(),
            	success: function( q ) {		
            		if ( array_detect_ctor( q ) && q.length !== 0 ) {
            			$("input[name='harga_" + nama_parts_index + "']").val( q[3] );
            		}
            	},
            	error: function( e ) {
            		console.log( window.JSON.stringify( e ) );
            	}
            });
        });

        $("input[name='service']").on("change", function(e) {
        	e.stopPropagation();

        	var c_val = $("input[name='total_semua']").val();
        	var n_val = $(this).val();

        	if ( c_val !== '' ) {
        		c_val = c_val.split(".");

        		c_val = ( c_val.length == 1 ? c_val[0] : Array.prototype.reduce.call(c_val, function(q0, q1) { q0 += q1; return (q0); }) );
        		c_val = parseInt(c_val);
        	}
        	else if ( c_val == '' ) {
        		c_val = 0;
        	}

        	if ( n_val !== '' ) {
        		n_val = n_val.split(".");

        		n_val = ( n_val.length == 1 ? n_val[0] : Array.prototype.reduce.call(n_val, function(q0, q1) { q0 += q1; return (q0); }) );
        		n_val = parseInt(n_val);
        	}
        	else if ( n_val == '' ) {
        		n_val = 0;
        	}

        	$("input[name='total_semua']").val((c_val + n_val).toLocaleString());
        });

        $("input[name*='jumlah_parts_']").on("change", function(e) {
        	e.stopPropagation();

        	window.jumlah_parts_index = $(this).attr("name").split("_")[2];

        	if ( $(this).val() ) {
	        	$("input[name='subtotal_"+ jumlah_parts_index+"']").val(
	        		parseInt($(this).val()) * parseInt($("input[name='harga_"+ jumlah_parts_index+"']").val()));

	        	var jumlah_total = 0;

	        	$("input[name*='subtotal_']").each(function(q, v) {
	        		if (v.value) {
	        			jumlah_total += parseInt(v.value);
	        		}
	        	});

	        	var c_val = $("input[name='total_semua']").val();

	        	if ( c_val !== '' ) {
	        		c_val = c_val.split(".");

	        		c_val = ( c_val.length == 1 ? c_val[0] : Array.prototype.reduce.call(c_val, function(a, b) { a += b; return (a); }) );
	        		c_val = parseInt(c_val);
	        	}
	        	else if ( c_val == '' ) {
	        		c_val = 0;
	        	}

	        	$("input[name='total_semua']").val((jumlah_total + c_val).toLocaleString());
	        }
        });

        $("button[data-id='simpan-data-sparepart']").on("click", function() {
       		var tr_list = $("table[data-table-id='sparepart']").find("tr").length;
       		var h = $("table[data-table-id='sparepart']").find("tr");

   			if ( h.eq(ii).find("td").eq(1).find("select").val() !== "" ) {
   				var nama_noreg = $("select[name='nama_noreg']").val();
   				var admin = $("input[name='admin']").val();
   				var pekerjaan = $("textarea[name='pekerjaan']").val();
   				var pengerja = $("input[name='pengerja']").val();
   				var service = $("input[name='service']").val();
   				var tanggal = $("input[name='tanggal'").val();

   				var parts = h.eq(ii).find("td").eq(1).find("select").val();
   				var harga = h.eq(ii).find("td").eq(2).find("input").val();
   				var jumlah_parts = h.eq(ii).find("td").eq(3).find("input").val();
   				var subtotal = h.eq(ii).find("td").eq(4).find("input").val();

   				var total_semua = $("input[name='total_semua']").val();

   				$.ajax({
					url: baseurl + "admin/maintanence/ins_maintanence",
					type: "POST",
					dataType: "json",
					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
					async: true,
					ifModified: true,
					timeout: 12000,
					global: true,
					processData: true,
					data: { "nama_noreg": nama_noreg, "admin": admin, "pekerjaan": pekerjaan, "pengerja": pengerja,"total_semua": total_semua, "service": service, "tanggal": tanggal },
					complete: function( x, q ) {
						console.log("HTTP Response: " + x.status.toLocaleString() + "(" + q + ")");
						alert('Data Service Berhasil Di Input !');
					},
					success: function( q ) {
						console.log(window.JSON.stringify( q ));
					},
					error: function( e ) {
						console.log(window.JSON.stringify( e ));
					}
				});
   			}      		

   			for ( var ii = 1; ii < tr_list; ii++ ) {
				if ( h.eq(ii).find("td").eq(1).find("select").val() !== "" ) {
					var nama_noreg = $("select[name='nama_noreg']").val();
	   				var admin = $("input[name='admin']").val();
	   				var pekerjaan = $("textarea[name='pekerjaan']").val();
	   				var pengerja = $("input[name='pengerja']").val();
	   				var service = $("input[name='service']").val();
	   				var tanggal = $("input[name='tanggal'").val();

	   				var parts = h.eq(ii).find("td").eq(1).find("select").val();
	   				var harga = h.eq(ii).find("td").eq(2).find("input").val();
	   				var jumlah_parts = h.eq(ii).find("td").eq(3).find("input").val();
	   				var subtotal = h.eq(ii).find("td").eq(4).find("input").val();

	   				var total_semua = $("input[name='total_semua']").val();
	   				$.ajax({
	   					url: baseurl + "admin/maintanence/ins_det_maintanence",
	   					type: "POST",
	   					dataType: "json",
	   					contentType: "application/x-www-form-urlencoded; charset=UTF-8",
	   					async: true,
	   					ifModified: true,
	   					timeout: 12000,
	   					global: true,
	   					processData: true,
	   					data: { "nama_parts": parts, "harga": harga, "jumlah_parts": jumlah_parts, "subtotal": subtotal, "service": service,"total_semua": total_semua, "tanggal": tanggal },
	   					complete: function( x, q ) {
	   						console.log("HTTP Response: " + x.status.toLocaleString() + "(" + q + ")");
	   						alert('Data Parts Berhasil Di Input !');
	   						window.location.reload(true);
	   					},
	   					success: function( q ) {
	   						console.log(window.JSON.stringify( q ));
	   					},
	   					error: function( e ) {
	   						console.log(window.JSON.stringify( e ));
	   					}
	   				});
   				}
   			}
        });
    </script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-table.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayBtn: true,
            startDate: "2016-01-01",
            minuteStep: 10,
            todayHighlight: true
        });

        $('.form_datetime').datetimepicker('update', new Date());
    </script>
</body>
</html>
