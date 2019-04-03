<!DOCTYPE html >
<html>
<head>
	<title>Laporan Profit Sharing</title>
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	
	<style type="text/css">
		.header{
			margin-top: -30px
		}
	    @media print {
	    	@page {
		        size: auto;   /* auto is the initial value */
		        margin: 0mm;  /* this affects the margin in the printer settings */
		    }

	    	.print {
	    		display: none;
	    	}	    	

	    	.header {
	    		margin-top: 0px;
	    	}
	    }
  	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3">
				<img class="img-responsive" src="<?= base_url('img/sawojajar_logo.png')?>" width="150"/>
			</div>
			<div class="col-xs-3">
				<h4 class="header1"><b>Laporan Profit Sharing</b></h4>
			</div>
			<div class="col-xs-3">
				<form class="print">
					<input type="button" value="Print this page" onClick=" window.print('location=no,menubar=0')"/>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-offset-3 col-xs-9 header"><h5>Jl. Danau Sentani Raya H1B28 </br>Rendy +6287859001844 </br> Uphi +628123399902</h5></div>
		</div>
	</div>

	<div class="col-xs-5"><!-- Kiri Start !-->
		<div class="row">
			<div class="col-xs-2">
				<span><b>Dari </b></span>
			</div>
			<div class="col-xs-4">
				<span><b>: </b><?php echo $tgl[0]; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">
				<b>Hingga </b>
			</div>
			<div class="col-xs-4">
				<span><b>: </b><?php echo $tgl[1]; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				</br>
				<span><b>Nama</b></span>
			</div>
			<div class="col-xs-8">
				</br>
				<?php foreach ($anggota->result() as $angg) :?>
					
				<span><b>:</b> <?php echo $angg->nama_anggota; ?></span>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<span><b>Nomor Hp</b></span>
			</div>
			<div class="col-xs-8">
				<?php foreach ($anggota->result() as $angg) : ?>
				<span><b>:</b> 0<?php echo $angg->nomor_hp; ?></span>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<span><b>Motor Keluar</b></span>
			</div>
			<div class="col-xs-8">
				<div class="row">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;: KLX S : <?php foreach ($jumlah_motor->result() as $tipe) { 
						if($tipe->tipe_motor=="KLXS"){
							echo $tipe->nomer_registrasi;  ?> 
					</span>
						<?php } }?>
				</div>
					
				<div class="row">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KLX L : <?php foreach ($jumlah_motor->result() as $tipe) { 
						if($tipe->tipe_motor=="KLXL"){
							echo $tipe->nomer_registrasi;  ?> 
					</span>
						<?php } }?>
				</div>

				<div class="row">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KLX G : <?php foreach ($jumlah_motor->result() as $tipe) { 
						if($tipe->tipe_motor=="KLXG"){
							echo $tipe->nomer_registrasi;  ?> 
					</span>
						<?php } }?>
				</div>

				<div class="row">
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KLX BF : <?php foreach ($jumlah_motor->result() as $tipe) { 
						if($tipe->tipe_motor=="KLXBF"){
							echo $tipe->nomer_registrasi;  ?> 
					</span>
						<?php } }?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5">
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<span><b>Pendapatan</b></span>
			</div>
			<div class="col-xs-8">
				<span><b>:</b> <?php echo $harga_motor; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<span><b>Kas </b></span>
			</div>
			<div class="col-xs-8">
				<span><b>:</b> <?php echo $kas; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-3">
				<span><b>Fee Marketing </b></span>
			</div>
			<div class="col-xs-8">
				<span><b>:</b> <?php echo $fee ?></span>
			</div>
		</div>
		<div class="row">
			</br>
			<div class="col-xs-3">
				<span><b>Bersih</b></span>
			</div>
			<div class="col-xs-8">
				<span><b>:</b> <?php echo $sub_pendapatan; ?></span>
			</div>
		</div>
	</div><!-- Kiri Start !-->

	<div class="col-xs-6"> <!-- Kanan Start !-->
		<div class="row">
			<div class="col-xs-3">
				</br></br></br>
				<span><b>Maintanence</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<span><b>Detail Maintanence / Parts:</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-9"><?php $sub_total_maintain = 0; foreach ($maintanence->result() as $maintain) : ?>
				<span><b>Nama :</b> <?php echo $maintain->nama_parts; ?> &nbsp; <b>Jumlah :</b> <?php echo $maintain->jumlah_parts; ?>&nbsp; <b>Harga :</b> <?php echo $maintain->sub_total;?></br> <?php $sub_total_maintain += $maintain->sub_total ?></span>
			<?php endforeach; ?></br> </div>
		</div>

		<div class="row">
			</br>
			<div class="col-xs-3">
				<span><b>Total Maintanence</b></span>
			</div>
			<div class="col-xs-9">
				<span><b>: </b><?php echo $sub_maintain ?></span>
			</div>
		</div>
		<?php foreach( $anggota->result() as $angg ) : 
			if ( $angg->profit < 0 ) {
		?>
		<div class="row">
			</br>
			<div class="col-xs-3">
				<span><b>Kekurangan</b></span>
			</div>
			<div class="col-xs-9">
				<span><b>: </b><?php echo $angg->profit; $grand_total += $angg->profit; ?></span>
			</div>
		</div>
		<?php } endforeach; ?>
		<div class="row">
			<div class="col-xs-3">
				<span><b><u>Grand Total</u></b></span>
			</div>
			<div class="col-xs-5">
				<span><b>:</b> <?php echo $grand_total ?></span>
			</div>
		</div>
	</div><!-- Kanan End !-->
</body>
</html>