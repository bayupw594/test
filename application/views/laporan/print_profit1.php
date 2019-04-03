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
			    <td><span class="qty"><?php echo $mtr->Nama_Peminjam; ?></span></td>
			    <?php if ( $mtr->paket == "1" ) { ?>
			      	<td><span class="qty">12 Jam</span></td>
			    <?php } else if ( $mtr->paket == "2" ){ ?>
			      	<td><span class="qty">24 Jam</span></td>
			    <?php } ?>
			    <td><span class="qty"><?php echo $mtr->jenis_hari; ?></span></td>
			</tr>

		    <?php } endforeach; ?>
		    <table id="itemss">
				<tr id="hiderow">
				    <td colspan="5"><span><b>Maintanence</b></span></td>
				</tr>

			  <tr>
			      <th>Nama Parts</th>
			      <th>Jumlah Parts</th>
			      <th>Harga</th>
			  </tr> 

			<?php foreach($detail_maintanence->result() as $item ) : ?>
			  <tr class="item-row">
		    		<td class="description"><span><?php echo $item->nama_parts; ?></span></td>
		    		<td class="item-name"><span><?php echo $item->jumlah_parts; ?></span></td>
			    	<td><span class="qty"><?php echo $item->sub_total; ?></span></td>
			  </tr>
			<?php endforeach; ?>
			<tr>
		      	<th>Detail Service</th>
		      	<th>Biaya</th>
		  	</tr>
		  	<?php foreach($maintanence->result() as $item ) : ?>
			  <tr class="item-row">
	    		<td class="description"><span><?php echo $item->pekerjaan; ?></span></td>
	    		<td class="item-name"><span><?php echo $item->service; ?></span></td>
			  </tr>
			<?php endforeach; ?>
			</table>
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

		<?php foreach($guide->result() as $item ) : ?>
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

		<table id="items" style="display: inline-table;">
			<tr id="hiderow">
			    <td colspan="5"><span><b>Marketing</b></span></td>
			</tr>

		  <tr>
		      <th>Nama Peminjam</th>
		      <th>Tanggal Pinjaman</th>
		      <th>Pendapatan</th>
		      <th>Jenis Hari</th>
		  </tr> 

		<?php foreach($marketing->result() as $market ) : ?>
		  <tr class="item-row">
	    	<td class="item-name"><span><?php echo $market->Nama_Peminjam; ?></span></td>
	    	<td class="item-name"><span><?php echo $market->Tanggal; ?></span></td>
	    	<td><span class="qty"><?php echo $market->harga_marketing; ?></span></td>
		    <td><span class="qty"><?php echo $market->jenis_hari; ?></span></td>
		  </tr>
		 <?php endforeach; ?>
		</table>
		
		<table id="itemss">
			<?php if ( $harga_motor != 0 ) { ?>
				<tr>
				    <td colspan="2" class="total-line">Total Motor</td>
				    <td class="total-value"><div id="subtotal"><?php echo $harga_motor; ?></div></td>
				</tr>
			<?php } ?>
			<?php if ( $sub_guide != 0 ) { ?>
				<tr>
				    <td colspan="2" class="total-line">Total Guide</td>
				    <td class="total-value"><div id="subtotal"><?php echo $sub_guide; ?></div></td>
				</tr>
			<?php } ?>
			<?php if ( $sub_maintain != 0 ) { ?>
				<tr>
				    <td colspan="2" class="total-line">Total Maintanence</td>
				    <td class="total-value"><div id="subtotal">-<?php echo $sub_maintain; ?></div></td>
				</tr>
			<?php } ?>
			<?php if ( $sub_boot != 0 ) { ?>
				<tr>
				    <td colspan="2" class="total-line">Total Boot MX</td>
				    <td class="total-value"><div id="subtotal"><?php echo $sub_boot; ?></div></td>
				</tr>
			<?php } ?>
			<?php if ( $kas != 0 ) { ?>
				<tr>
				    <td  colspan="2" class="total-line">Kas</td>
				    <td class="total-value"><div id="total">-<?php echo $kas ?></div></td>
				</tr>
			<?php } ?>
			<?php if ( $fee != 0 ) { ?>
				<tr>
				    <td colspan="2"  class="total-line">Fee Marketing</td>
				    <td class="total-value"><span id="paid"><?php echo $fee; ?></span></td>
				</tr>
			<?php } ?>
			<?php if ( $fee_anggota_lain != 0 ) { ?>
				<tr>
				    <td colspan="2" class="total-line">Fee Untuk Anggota Lain</td>
				    <td class="total-value"><div id="subtotal">-<?php echo $fee_anggota_lain; ?></div></td>
				</tr>
			<?php } ?>
			<?php if ( $kekurangan != 0 ) {
			?>
				<tr>
				    <td colspan="2"  class="total-line">Kekurangan</td>
				    <td class="total-value"><span id="paid"><?php echo $kekurangan?></span></td>
				</tr>
			<?php } ?>
			<tr>
			    <td colspan="2"  class="total-line">Grand Total</td>
			    <td class="total-value"><span id="paid"><?php echo $grand_total; ?></span></td>
			</tr>
		</table>
	</div>
	
</body>

</html>