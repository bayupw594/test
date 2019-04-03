<!DOCTYPE html>
<html>
<head>
	<title>Laporan Peminjaman</title>
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
	    	left: 160px;
	    	bottom: 80px;
	    }

	    .tagline1 {
	    	position: relative;
	    	left: 160px;
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
		<div class="logo"><img src="<?= base_url('img/sawojajar_logo.png')?>" width="150"></div>
		<div class="tagline">
			<h3>Laporan Peminjaman (Motor Yang Sedang Di Pinjam)</h3>
		</div>
		<div class="tagline1">
			<h5>Jl. Melati No. 14 Lowokwaru Malang</h5>
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
	  			<th class="normal">Alamat</th>
	  			<th class="normal">Tanggal Peminjaman</th>
	  			<th class="normal">Paket</th>
	  			<th class="normal">Jaminan</th>
	  			<th class="normal">Harga</th>
	  			<th class="normal">Keterangan</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php 
				$i = 1;
				$bro = 0;
				foreach ($peminjaman->result() as $row) { 
			?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $row->Nama_Peminjam ?></td>
					<td><?= $row->Alamat ?></td>
					<td><?= $row->Tanggal ?></td>
					<td><?= $row->paket ?></td>
					<td><?= $row->jaminan ?></td>
					<td>Rp.<?= number_format($row->total,0,',','.') ?></td>
					<td><?= 
							$keterangan = $row->keterangan;
							if ($keterangan == 0 ){
								$row->keterangan = '';
							}
					?></td>
				</tr>
			<?php 
					$bro+=$row->total;	
					$i++;
				}
			?>
	  	</tbody>
	  </table>
	 </div>
	<div class="total" align="right">
		<b>Total Harga : Rp. <?php echo number_format($bro,2,',','.') ?></b> </br></br></br></br>
		
		<b>Tertanda : </b></br></br></br></br></br></br>
		<b><?php echo $username ?></b>
	</div>

</body>
</html>