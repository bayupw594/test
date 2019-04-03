<!DOCTYPE html>
<html>

<head>	
	<title>Laporan Transaksi</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>css/style1.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>css/print1.css' media="print" />

</head>

<body>

	<div id="page-wrap">
		<form>
			<input type="button" class="print1" value="Print this page" onClick="window.print()">
		</form>
		<div id="header">Laporan Transaksi</div>
		
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
                    	<?php foreach ($peminjaman->result() as $pinjam) :?>
                    		<span><?php echo $pinjam->Nama_Peminjam ?></span>
                   		<?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Nomor HP</td>
                    <td>
                    	<?php foreach ($peminjaman->result() as $pinjam) :?>
                    		<span id="date"><?php echo $pinjam->No_SIM ?></span>
                   		<?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Tanggal</td>
                    <td>
                    	<?php foreach ($peminjaman->result() as $pinjam) :?>
                    		<span id="date"><?php echo $pinjam->Tanggal ?></span>
                   		<?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <td class="meta-head">Jenis Hari</td>
                    <td>
                    	<?php foreach ($peminjaman->result() as $pinjam) :?>
                    		<span id="date"><?php echo $pinjam->jenis_hari; if($pinjam->paket == "1"){ echo " / 12 Jam";} else echo " / 24 Jam"; ?> </span>
                   		<?php endforeach; ?>
                    </td>
                </tr>
            </table>
		
		</div>
		
		<table id="items" style="display: inline-table;">
		  <tr id="hiderow">
		    <td colspan="5"><span><b>Motor</b></span></td>
		  </tr>
		  
		  <tr>
		      <th>Jenis</th>
		      <th>No Motor</th>
		      <th>Jumlah</th>
		  </tr>
		  
		  
		  	<?php foreach ( $motor->result() as $mtr ) : 
		  		if ($mtr->tipe_motor=="KLXS") {
		  	?>

		  	<tr class="item-row">
		      <td class="item-name"><span>KLX S</span></td>

		      <td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
		      <td><span class="qty"><?php echo count($mtr->nomer_registrasi); ?></span></td>
		    </tr>

		    <?php } else if ($mtr->tipe_motor=="KLXL") { ?> 

	    	<tr class="item-row">
	    		<td class="item-name"><span>KLX L</span></td>

		     	<td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
		     	<td><span class="qty"><?php echo count($mtr->nomer_registrasi); ?></span></td>
		    </tr>

		    <?php } else if ($mtr->tipe_motor=="KLXG") { ?> 

	    	<tr class="item-row">
	    		<td class="item-name"><span>KLX L</span></td>

		     	<td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
		     	<td><span class="qty"><?php echo count($mtr->nomer_registrasi); ?></span></td>
		    </tr>

		    <?php } else if ($mtr->tipe_motor=="KLXBF") { ?> 

		    <tr class="item-row">
		    	<td class="item-name"><span>KLX BF</span></td>

			    <td><span class="cost"><?php echo $mtr->nomer_registrasi; ?></span></td>
			    <td><span class="qty"><?php echo count($mtr->nomer_registrasi); ?></span></td>
			</tr>

		    <?php } endforeach; ?>
		    <?php 
		    	foreach( $anggota->result() as $angg) : 
		    		if($angg->guide != ""){ 
		    ?>
		    	<table id="itemss">
		    		<tr id="hiderow">
				    	<td colspan="5"><span><b>Perlengkapan</b></span></td>
				  	</tr>	
				  	<tr>
				    	<th>Nama Guide</th>
				      	<th>Harga Guide</th>
				  	</tr> 
				  	<tr class="item-row">
				    	<td class="item-name"><span><?php echo $angg->nama_anggota; ?></span></td>

					   	<td><span class="qty"><?php echo $angg->harga_guide; ?></span></td>
					</tr>
		    	</table>
		    <?php } endforeach; ?>
		    <table id="itemss">
				<tr id="hiderow">
			    	<td colspan="5"><span><b>Perlengkapan</b></span></td>
			  	</tr>

			  <tr>
			      <th>Perlengkapan</th>
			      <th>Jumlah</th>
			  </tr> 

			  <?php foreach($perlengkapan->result() as $item ) : 
			  		if ($item->jenis_perlengkapan == "B" && $item->jumlah_perlengkapan > 0) {
			  ?>
			  <tr class="item-row">
		    	<td class="item-name"><span><?php echo $item->jenis_perlengkapan; ?></span></td>

			    <td><span class="qty"><?php echo $item->jumlah_perlengkapan; ?></span></td>
			  </tr>
			  <?php } else if ($item->jenis_perlengkapan == "J" && $item->jumlah_perlengkapan > 0) { ?>
				<tr class="item-row">
			    	<td class="item-name"><span><?php echo $item->jenis_perlengkapan; ?></span></td>

					<td><span class="qty"><?php echo $item->jumlah_perlengkapan; ?></span></td>
				</tr>
			<?php } else if ($item->jenis_perlengkapan == "GL" && $item->jumlah_perlengkapan > 0) { ?>
				<tr class="item-row">
			    	<td class="item-name"><span><?php echo $item->jenis_perlengkapan; ?></span></td>

					<td><span class="qty"><?php echo $item->jumlah_perlengkapan; ?></span></td>
				</tr>
			<?php } else if ($item->jenis_perlengkapan == "G" && $item->jumlah_perlengkapan > 0) { ?> 
				<tr class="item-row">
			    	<td class="item-name"><span><?php echo $item->jenis_perlengkapan; ?></span></td>

					<td><span class="qty"><?php echo $item->jumlah_perlengkapan; ?></span></td>
				</tr>
			<?php } else if ($item->jenis_perlengkapan == "KP" && $item->jumlah_perlengkapan > 0) { ?> 
				<tr class="item-row">
			    	<td class="item-name"><span><?php echo $item->jenis_perlengkapan; ?></span></td>

					<td><span class="qty"><?php echo $item->jumlah_perlengkapan; ?></span></td>
				</tr>
			<?php } endforeach; ?>
			</table>
			<table id="items" style="display: inline-table;">
				<tr id="hiderow">
				    <td colspan="5"><span><b>Guide</b></span></td>
				</tr>

			  <tr>
			      <th>Nama Peminjam</th>
			      <th>Tanggal Guide</th>
			      <th>Harga Guide</th>
			  </tr> 

			<?php foreach($anggota->result() as $item ) : ?>
			  <tr class="item-row">
		    	<td class="description"><span><?php echo $item->Nama_Peminjam; ?></span></td>
		    	<td class="item-name"><span><?php echo $item->Tanggal; ?></span></td>
			    <td><span class="qty"><?php echo $item->harga_per_orang?></span></td>
			  </tr>
			 <?php endforeach; ?>
			 	<table id="itemss">
					<tr id="hiderow">
				    <td colspan="5"><span><b>Boot MX</b></span></td>
				  </tr>

				  <tr>
				      <th>Nama Boot</th>
				      <th>Peminjam</th>
				      <th>Harga</th>
				  </tr> 

				<?php foreach($boot_mx->result() as $item ) : ?>
				  <tr class="item-row">
			    	<td class="description"><span><?php echo $item->nama; ?></span></td>
			    	<td class="item-name"><span><?php echo $item->Nama_Peminjam; ?></span></td>
				    <td><span class="qty"><?php echo $item->harga_per_boot?></span></td>
				  </tr>
				<?php endforeach; ?>
				</table>
			</table>
		</table>
		<table id="itemss">
			<?php foreach($pembayaran->result() as $bayar) : ?>
				<tr>
				    <td colspan="2" class="total-line">Total Motor</td>
				    <td class="total-value"><div id="subtotal"><?php echo $bayar->harga_motor; ?></div></td>
				</tr>
				<?php if($bayar->harga_perlengkapan != "") { ?>
				<tr>
				    <td  colspan="2" class="total-line">Total Perlengkapan</td>
				    <td class="total-value"><div id="total"><?php echo $bayar->harga_perlengkapan; ?></div></td>
				</tr>
				<?php } ?>
				<?php if($bayar->harga_guide !== "Rp.0") { ?>
				<tr>
				    <td  colspan="2" class="total-line">Guide</td>
				    <td class="total-value"><div id="total"><?php echo $bayar->harga_guide; ?></div></td>
				</tr>
				<?php } ?>
				<tr>
				    <td colspan="2"  class="total-line">Grand Total</td>
				    <td class="total-value"><span id="paid"><?php echo $total; ?></span></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	
</body>

</html>