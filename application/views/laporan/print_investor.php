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
		    <td colspan="5"><span><b>Motor</b></span></td>
		  </tr>
		  
		  <tr>
		      <th>Nomor</th>
		      <th>Tipe</th>
		      <th>No Motor</th>
		  </tr>
		  
		    <?php $i = 1; ?>
		  	<?php foreach ( $jumlah_motor->result() as $mtr ): ?>

		  	<tr class="item-row">
		  		<td class="cost"><span><?php echo $i; ?></span></td>
		      	<td class="item-name"><span><?php echo $mtr->Type ?></span></td>

		      	<td><span class="cost"><?php echo $mtr->No_Registrasi; ?></span></td>
		    </tr>

		    
		    <?php $i++; endforeach; ?>
		    <table id="itemss">
				<tr id="hiderow">
			    <td colspan="5"><span><b>Maintanence</b></span></td>
			  </tr>

			  <tr>
			      <th>Nama Parts</th>
			      <th>Jumlah Parts</th>
			      <th>Harga</th>
			  </tr> 

			<?php $sub_total_maintain = 0; foreach($maintanence->result() as $item ) : ?>
			  <tr class="item-row">
		    	<td class="description"><span><?php echo $item->nama_parts; ?></span></td>
		    	<td class="item-name"><span><?php echo $item->jumlah_parts; ?></span></td>
			    <td><span class="qty"><?php echo $item->sub_total; $sub_total_maintain += $item->sub_total?></span></td>
			  </tr>
			<?php endforeach; ?>
			</table>
		</table>


		<table id="itemss">
			<tr>
			    <td colspan="2" class="total-line">Total Pendapatan</td>
			    <td class="total-value"><div id="subtotal"><?php echo $harga_motor; ?></div></td>
			</tr>
		</table>
	</div>
	
</body>

</html>