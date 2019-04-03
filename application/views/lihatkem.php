<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/collapse.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lihat Data Peminjaman</h4>
    </div>      
    <div class="modal-body form-group">
        <form method="post" action="<?= base_url()?>peminjamanlunas/peng">
            <table class="table table-striped">
                <label for="ktp" >Nama</label>
                <div class="form-group row">
                    <?php
                        foreach ($peminjaman->result() as $pinjam) {
                    ?>
                        
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="napem" width='25'  placeholder="<?php echo $pinjam->Nama_Peminjam; ?>" readonly="readonly">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <label for="ktp" >No KTP</label>
                <div class="form-group row">
                    <?php
                        foreach ($peminjaman->result() as $pinjam) {
                    ?>
                        
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="napem" width='25'  placeholder="<?php echo $pinjam->No_KTP; ?>" readonly="readonly">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <label for="ktp" >No HP</label>
                <div class="form-group row">
                    <?php
                        foreach ($peminjaman->result() as $pinjam) {
                    ?>
                        
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="napem" width='25'  placeholder="<?php echo $pinjam->No_SIM; ?>" readonly="readonly">
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <label for="alm" >Alamat</label>
                <div class="form-group row">
                    
                    <div class="col-sm-10">
                        <?php
                            foreach ($peminjaman->result() as $pinjam) {
                        ?>
                                <textarea class="form-control" type="text" id="alm" placeholder="<?php echo $pinjam->Alamat; ?>" readonly="readonly"></textarea>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <label for="jaminan" >Jaminan</label>
                <div class="form-group row">
                    
                    <div class="col-sm-10">
                        <?php
                            foreach ($peminjaman->result() as $pinjam) {
                        ?>
                            <input class="form-control" type="text"  placeholder="<?php echo $pinjam->jaminan; ?>" readonly="readonly"/>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <label for="tgl" >Tanggal Sewa</label>
                <div class="form-group row">
                    
                    <div class="col-sm-10">
                        <?php
                            foreach ($peminjaman->result() as $pinjam) {
                        ?>
                                <input class="form-control" type="text" name="tgl_sewa" value="<?php echo $pinjam->Tanggal; ?>" readonly="readonly"/>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <label for="paket" >Lama Sewa</label>
                <div class="form-group row">
                    
                    <div class="col-sm-10">
                        <?php
                            foreach ($peminjaman->result() as $pinjam) {
                                if($pinjam->paket==1){
                        ?>
                                    <input class="form-control" type="text" value="12 Jam" readonly="readonly"/>
                                    <input class="form-control" type="hidden" name="paket" value="1" />
                        <?php
                                } else {
                        ?>
                                    <input class="form-control" type="text" value="24 Jam" readonly="readonly"/>
                                    <input class="form-control" type="hidden" name="paket" value="2" />
                        <?php
                                }
                            }
                        ?>      
                    </div>
                </div>
                <label for="g" >Motor KLXS</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($motor->result() as $detailmotor) {
                                    if($detailmotor->tipe_motor=="KLXS"){
                            ?>
                                        <input class="form-control" type="text" name="klxs[]" value="<?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
                                        <br>
                            <?php
                                    } else {
                            ?>
                                        <input class="form-control" type="text" name="klxs[]" placeholder="Tidak Meminjam" readonly="readonly">
                            <?php
                                    }
                                }
                            ?>
                        </div>
                </div>
                <label for="g" >Motor KLXL</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($motor->result() as $detailmotor) {
                                    if($detailmotor->tipe_motor=="KLXL"){
                            ?>
                                        <input class="form-control" type="text" name="klxl[]" value="<?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
                                        <br>
                            <?php
                                    } else {
                            ?>
                                        <input class="form-control" type="text" name="klxl[]" placeholder="Tidak Meminjam" readonly="readonly">
                            <?php
                                    }
                                }
                            ?>
                        </div>
                </div>
                <label for="g" >Motor KLXG</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($motor->result() as $detailmotor) {
                                    if($detailmotor->tipe_motor=="KLXG"){
                            ?>
                                        <input class="form-control" type="text" name="klxg[]" value="<?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
                                        <br>
                            <?php
                                    } else {
                            ?>
                                        <input class="form-control" type="text" name="klxg[]" placeholder="Tidak Meminjam" readonly="readonly">
                            <?php
                                    }
                                }
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Boots</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($perlengkapan->result() as $barang) {
                                    if($barang->jenis_perlengkapan == "B" && $barang->jumlah_perlengkapan>0){
                            ?>
                                        <input type="text" class="form-control" name="Boot" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "B" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" class="form-control" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>  
                            <?php
                                foreach ($jmlbarang->result() as $jml) {
                                    if($jml->jenis_perlengkapan == "B"){
                            ?>
                                        <input type="hidden" class="form-control" name="Jml_Boot" value="<?php echo $jml->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } 
                                }
                            ?>  
                        </div>
                </div>
                <label for="pinjaman1" >Jersey</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($perlengkapan->result() as $barang) {
                                    if($barang->jenis_perlengkapan == "J" && $barang->jumlah_perlengkapan>0){
                            ?>
                                        <input type="text" class="form-control" name="jersey" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "J" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" class="form-control" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>  
                            <?php
                                foreach ($jmlbarang->result() as $jml) {
                                    if($jml->jenis_perlengkapan == "J"){
                            ?>
                                        <input type="hidden" class="form-control" name="Jml_Jersey" value="<?php echo $jml->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } 
                                }
                            ?>  
                        </div>
                </div>
                <label for="pinjaman1" >Glove</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($perlengkapan->result() as $barang) {
                                    if($barang->jenis_perlengkapan == "GL" && $barang->jumlah_perlengkapan>0){
                            ?>
                                        <input type="text" class="form-control" name="Body_Protector" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "GL" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" class="form-control" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>  
                            <?php
                                foreach ($jmlbarang->result() as $jml) {
                                    if($jml->jenis_perlengkapan == "GL"){
                            ?>
                                        <input type="hidden" class="form-control" name="Jml_Body_Protector" value="<?php echo $jml->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } 
                                }
                            ?>  
                        </div>
                </div>
                <label for="pinjaman1" >Knee Protector</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($perlengkapan->result() as $barang) {
                                    if($barang->jenis_perlengkapan == "KP" && $barang->jumlah_perlengkapan>0){
                            ?>
                                        <input type="text" class="form-control" name="Knee_Protector" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "KP" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" class="form-control" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>
                            <?php
                                foreach ($jmlbarang->result() as $jml) {
                                    if($jml->jenis_perlengkapan == "KP"){
                            ?>
                                        <input type="hidden" class="form-control" name="Jml_Knee_Protector" value="<?php echo $jml->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } 
                                }
                            ?>  
                        </div>
                </div>
                <label for="pinjaman1" >Google</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($perlengkapan->result() as $barang) {
                                    if($barang->jenis_perlengkapan == "G" && $barang->jumlah_perlengkapan>0){
                            ?>
                                        <input type="text" class="form-control" name="google" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "G" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" class="form-control" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>  
                            <?php
                                foreach ($jmlbarang->result() as $jml) {
                                    if($jml->jenis_perlengkapan == "G"){
                            ?>
                                        <input type="hidden" class="form-control" name="Jml_Google" value="<?php echo $jml->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } 
                                }
                            ?>  
                        </div>
                </div>
                <label for="pinjaman1" >Harga Total</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($harga->result() as $hrga) {
                            ?>
                                   <input type="text" class="form-control" name="hargatotal" value="Rp.<?php echo $hrga->total; ?>" readonly="readonly"/>
                            <?php
                                } 
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Jenis Transaksi</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($harga->result() as $hrga) {
                                    $keterangan = $hrga->keterangan;
                                    if($keterangan == "Tunai" || $keterangan == "Debit" ) {
                            ?>
                                   <input type="text" class="form-control"  value="<?php echo $hrga->keterangan; ?>" readonly="readonly"/>
                            <?php
                                    } else if ($keterangan == "Transfer") {
                            ?>

                                        <input type="text" class="form-control" value="<?php echo $hrga->keterangan; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control" value="<?php echo $hrga->Nomer_Rekening; ?>" readonly="readonly"/>
                            <?php
                                    } else {
                            ?>
                                        <input type="text" class="form-control" value="DP" readonly="readonly"/>
                                        <input type="text" class="form-control" value="<?php echo $hrga->tgl_pembayaran_satu; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control" value="<?php echo $hrga->nominal_pertama; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control" value="<?php echo $hrga->tgl_pembayaran_dua; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control" value="<?php echo $hrga->nominal_dua; ?>" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Tanggal Kembali</label>
                <div class="form-group row">
                        <div class="col-sm-10">
                            <?php
                                foreach ($kembali->result() as $kmbali) {
                            ?>
                                   <input type="text" class="form-control"  value="<?php echo $kmbali->Tanggal_kembali; ?>" readonly="readonly"/>
                            <?php
                                }
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Denda</label>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <?php
                                foreach ($kembali->result() as $kmbali) {
                                    $total= $kmbali->Jumlah_Denda;
                                   if( $total > "0"){
                            ?>
                                        <input type="text" class="form-control"  value="Lama Telat : <?php echo $kmbali->Jam; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control"  value="Harga Denda /Jam :<?php echo $kmbali->Harga; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control"  value="Total : <?php echo $kmbali->Jumlah_Denda; ?>" readonly="readonly"/>
                            <?php
                                   } else {
                            ?>
                                        <input type="text" class="form-control"  value="Total : <?php echo $kmbali->Jumlah_Denda; ?>" readonly="readonly"/>
                            <?php
                                   }
                                }
                            ?>
                        </div>
                </div>
            </table>
        </form>
    </div>
    <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
</div>
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
        $('.form_datetime').datetimepicker('update', new Date());
</script>