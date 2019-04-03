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
                    <td class="meta-head">Nomor Motor</td>
                    <td>
                    	<span><?php echo $no_motor ?></span>
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
		    <td colspan="5"><span><b>Parts</b></span></td>
		  </tr>
		  
		  <tr>
		      <th>Spareparts</th>
		      <th>Harga Satuan</th>
		      <th>Jumlah</th>		      
		      <th>Sub Total</th>
		  </tr>
		  
		  
		  	<?php $parts = 0; foreach ( $motor->result() as $mtr ) : ?>

		  	<tr class="item-row">
		      <td><span class="cost"><?php echo $mtr->nama_parts; ?></span></td>
		      <td><span class="qty"><?php echo $mtr->harga_satuan; ?></span></td>
		      <td><span class="qty"><?php echo $mtr->jumlah_parts; ?></span></td>
		      <td><span class="qty"><?php echo $mtr->sub_total; ?></span></td>
		    </tr>

		    <?php $parts += $mtr->sub_total; endforeach; ?>
		    <table id="itemss">
				<tr id="hiderow">
			    <td colspan="5"><span><b>Service</b></span></td>
			  </tr>

			  <tr>
			      <th>Pekerjaan</th>
			      <th>Pengerja</th>
			      <th>Biaya Service</th>
			  </tr> 

			<?php $service = 0; foreach($motor->result() as $mtr ) : ?>
			  <tr class="item-row">
		    	<td class="description"><span><?php echo $mtr->pekerjaan; ?></span></td>
		    	<td class="item-name"><span><?php echo $mtr->pengerja; ?></span></td>
			    <td><span class="qty"><?php echo $mtr->service?></span></td>
			  </tr>

			<?php $service += $mtr->service; endforeach; ?>
			</table>
		</table>
		
		<table id="itemss">
			<tr>
			    <td colspan="2"  class="total-line">Total Parts</td>
    			<td class="total-value"><span id="paid"><?php echo $parts; ?></span></td>
			</tr>
			<tr>
			    <td colspan="2"  class="total-line">Total Service</td>
    			<td class="total-value"><span id="paid"><?php echo $service; ?></span></td>
			</tr>
			<tr>
			    <td colspan="2"  class="total-line">Grand Total</td>
    			<td class="total-value"><span id="paid"><?php echo $grand_sub; ?></span></td>
    			
			</tr>
		</table>
	</div>
	
</body>

</html>