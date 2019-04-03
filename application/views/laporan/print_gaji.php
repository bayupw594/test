<!DOCTYPE html>
<html>

<head>	
	<title>Laporan Profit</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>css/style1.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>css/print1.css' media="print" />

</head>

<body>

	<div id="page-wrap">
		<form>
			<input type="button" class="print1" value="Print this page" onClick="window.print()">
		</form>
		<div id="header">Laporan Profit</div>
		
		<div id="identity">
		
            <span id="address">Sawojajar Adventure </br>
			Jl. Danau Sentani Raya H1B28 </br>
			Rendy +6287859001844</br>
			Uphi +628123399902
			</span>

            <div id="logo">
              <img id="image" src="<?php echo base_url(); ?>img/sawojajar_logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
            <table id="meta">
                <tr>
                    <td class="meta-head">Nama</td>
                    <td>
                    	<?php foreach ($anggota->result() as $angg) :?>
                    		<span><?php echo $angg->nama_anggota ?></span>
                   		<?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Nomor HP</td>
                    <td>
                    	<?php foreach ($anggota->result() as $angg) :?>
                    		<span id="date"><?php echo $angg->nomor_hp; ?></span>
                   		<?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Dari / Hingga</td>
                    <td>
                    	<span id="date"><?php echo $tgl[0] ?> </br> <?php echo $tgl[1]  ?></span>
                    </td>
                </tr>
            </table>
		
		</div>
		
		<table id="items" style="display: inline-table;">
		  <tr id="hiderow">
		    <td colspan="5"><span><b>Motor Keluar</b></span></td>
		  </tr>
		  
		  <tr>
		      <th>Jenis</th>
		      <th>No Motor</th>
		      <th>Peminjam</th>
		      <th>Jam</th>
		      <th>Jenis Hari</th>
		  </tr>
		  
		  
		  	<?php foreach ( $jumlah_motor->result() as $mtr ) : 
		  		if ($mtr->tipe_motor=="KLXS") {
		  	?>

		  	<tr class="item-row">
		      <td class="cost"><span>KLX S</span></td>

		      <td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
		      <td><span class="qty"><?php echo $mtr->Nama_Peminjam; ?></span></td>
		      <?php if ( $mtr->paket == "1" ) { ?>
		      	<td><span class="qty">12 Jam</span></td>
		      <?php } else if ( $mtr->paket == "2" ){ ?>
		      	<td><span class="qty">24 Jam</span></td>
		      <?php } ?>
		      <td><span class="qty"><?php echo $mtr->jenis_hari; ?></span></td>
		    </tr>

		    <?php } else if ($mtr->tipe_motor=="KLXL") { ?> 

	    	<tr class="item-row">
	    		<td class="cost"><span>KLX L</span></td>

		     	<td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
		     	<td><span class="qty"><?php echo $mtr->Nama_Peminjam; ?></span></td>
		     	<?php if ( $mtr->paket == "1" ) { ?>
		      		<td><span class="qty">12 Jam</span></td>
		     	<?php } else if ( $mtr->paket == "2" ){ ?>
		      		<td><span class="qty">24 Jam</span></td>
		      	<?php } ?>
		     	<td><span class="qty"><?php echo $mtr->jenis_hari; ?></span></td>
		    </tr>

		    <?php } else if ($mtr->tipe_motor=="KLXG") { ?> 

	    	<tr class="item-row">
	    		<td class="cost"><span>KLX G</span></td>

		     	<td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
		     	<td><span class="qty"><?php echo $mtr->Nama_Peminjam; ?></span></td>
		     	<?php if ( $mtr->paket == "1" ) { ?>
		      		<td><span class="qty">12 Jam</span></td>
		     	<?php } else if ( $mtr->paket == "2" ){ ?>
		      		<td><span class="qty">24 Jam</span></td>
		      	<?php } ?>
		     	<td><span class="qty"><?php echo $mtr->jenis_hari; ?></span></td>
		    </tr>

		    <?php } else if ($mtr->tipe_motor=="KLXBF") { ?> 

		    <tr class="item-row">
		    	<td class="cost"><span>KLX BF</span></td>

			    <td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
			    <?php $jml_motor = count($mtr->nomer_registrasi); ?>
			    <td><span class="qty"><?php echo $mtr->Nama_Peminjam; ?></span></td>
			    <?php if ( $mtr->paket == "1" ) { ?>
		      		<td><span class="qty">12 Jam</span></td>
		     	<?php } else if ( $mtr->paket == "2" ){ ?>
		      		<td><span class="qty">24 Jam</span></td>
		      	<?php } ?>
			    <td><span class="qty"><?php echo $mtr->jenis_hari; ?></span></td>
			</tr>

		    <?php } endforeach; ?>
		</table>
		
		<table id="itemss">
			<tr>
			    <td colspan="2" class="total-line">Total Motor</td>
			    <td class="total-value"><div id="subtotal"><?php echo $harga_motor; ?></div></td>
			</tr>
			<tr>
			    <td colspan="2"  class="total-line">Gaji Untuk Pegawai</td>
			    <td class="total-value"><span id="paid"><?php echo $gaji_pegawai; ?></span></td>
			</tr>
		</table>
	</div>
	
</body>

</html>