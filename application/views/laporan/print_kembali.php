<!DOCTYPE html>
<html>
<head>
	<title>Laporan Omset</title>
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
	    #outtable{
	      padding: 20px;
	      border:1px solid #e3e3e3;
	      width:1024px;
	      border-radius: 5px;
	    }
	 	
	 	.container{
	 		position: static;
	 		margin-bottom: -100px;
	 	}
	    .logo {
	    	width: 250px;
	    	position: relative;
	    }

	    .tagline {
	    	position: relative;
	    	left: 210px;
	    	bottom: 80px;
	    }

	    .tagline1 {
	    	position: relative;
	    	left: 210px;
	    	bottom: 90px;
	    	font-size: 17px;
	    }

	    .short{
	      width: 50px;
	    }

	 	.total {
	 		padding-top: 10px;
	 		margin-right: 280px;
	 		font-family: Arial;
	 	}

	 	.print {
	 		margin-right: 280px;
	 		margin-bottom: 10px;
	 	}

	    .normal{
	      width: 150px;
	    }
	 
	    table{
	      border-collapse: collapse;
	      font-family: arial;
	      color:#5E5B5C;
	    }
	 
	    thead th{
	      text-align: left;
	      padding: 10px;
	    }
	 
	    tbody td{
	      border-top: 1px solid #e3e3e3;
	      padding: 10px;
	    }
	    th > h3 {
	    	margin-left : 10px;
	    	margin-top : 1px;
	    }

	    @media print {
	    	.no-print{
	    		display: none;
	    	}
	    	tbody td{
	    		font-size: 24px;
	    	}

	    	img	{
	    		width: 200px;
	    	}

	    	thead th {
	    		font-size: 22px;
	    	}

	    	th > h3 {
	    		font-size: 22px;
	    	}

	    	.total{
	    		font-size: 22px;
	    		margin-right: 0;
	    	}

	    	.print {
	    		display: none;
	    	}

	    	.tagline {
		    	padding-left: 45px;
		    	font-size: 20px;
		    }

		    .tagline1 {
		    	padding-left: 45px;	
		    	font-size: 18px;
		    }
	    }
  </style>
</head>
<body>
	<div class="container">
		<div class="logo"><img src="<?= base_url('img/sawojajar_logo.png')?>" width="200"></div>
		<div class="tagline">
			<h3>Laporan Omset</h3>
		</div>
		<div class="tagline1">
			<h5>Jl. Danau Sentani Raya H1B28 </br>Rendy +6287859001844 </br> Uphi +628123399902</h5>
		</div>
	</div>
	<div class="print" align="right">
		<form>
			<input type="button" value="Print this page" onClick="window.print()">
		</form>
	</div>
	
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
	  			<th class="short">No</th>
	  			<th class="normal">Nama Peminjam</th>
	  			<th class="normal">Tanggal</th>
	  			<th class="normal">Paket</th>
	  			<th class="normal">Harga</th>
	  			<th class="normal">Jenis Hari</th>
	  			<th class="normal no-print">Detail</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php 
				$i = 1;
				$total = 0;
				foreach ($peminjaman->result() as $row) { 
			?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $row->Nama_Peminjam ?></td>
					
					<td><?= $row->Tanggal ?></td>
					<?php if ( $row->paket == "1") { ?>					
						<td>12 Jam</td>
					<?php } else if ( $row->paket == "2") { ?>
						<td>24 Jam</td>
					<?php } ?>
					
					<td>Rp.<?= number_format($row->harga_motor,0,'.','.') ?></td>
					<td><?= $row->jenis_hari ?></td>
					<td class="no-print">
						<a type="button" data-toggle="modal" data-target="#lihat" href="<?php echo base_url(); ?>admin/pengembalian/lihatpin/<?php echo $row->Id_Peminjamanan?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span></a>
					</td>
				</tr>
			<?php 
					$total+=$row->harga_motor;	
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
		</div>
	 </div>
	<div class="total" align="right">
		<b>Total Harga : Rp. <?php echo number_format($total,0,'.','.') ?></b> </br></br></br></br>
		<b>Tertanda : </b></br></br></br></br></br></br>
		<b><?php echo $username ?></b>
	</div>

	<script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	
</body>
</html>