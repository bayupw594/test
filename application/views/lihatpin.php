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
        <form method="post" action="<?= base_url()?>admin/peminjamanlunas/peng">
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
                                    } 
                                }
                            ?>
                        </div>
                </div>
                <label for="g" >Motor KLXBF</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($motor->result() as $detailmotor) {
                                    if($detailmotor->tipe_motor=="KLXBF"){
                            ?>
                                        <input class="form-control" type="text" name="klxbf[]" value="<?php echo $detailmotor->nomer_registrasi; ?>" readonly="readonly">
                                        <br>
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
                                        <input type="text" class="form-control" name="Jersey" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "J" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" name="jersey" class="form-control" readonly="readonly"/>
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
                <label for="pinjaman1" >Body Protector</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($perlengkapan->result() as $barang) {
                                    if($barang->jenis_perlengkapan == "BP" && $barang->jumlah_perlengkapan>0){
                            ?>
                                        <input type="text" class="form-control" name="Body_Protector" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "BP" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" name="Body_Protector" class="form-control" readonly="readonly"/>
                            <?php
                                    }
                                }
                            ?>  
                            <?php
                                foreach ($jmlbarang->result() as $jml) {
                                    if($jml->jenis_perlengkapan == "BP"){
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
                                        <input type="text" name="Knee_Protector" class="form-control" readonly="readonly"/>
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
                                        <input type="text" class="form-control" name="Google" value="<?php echo $barang->jumlah_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else if($barang->jenis_perlengkapan == "G" && $barang->jumlah_perlengkapan<=0){
                            ?>
                                        <input type="text" name="Google" class="form-control" readonly="readonly"/>
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
                <label for="pinjaman1" >Harga Motor</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($harga->result() as $hrga) {
                                    if($hrga->harga_motor != "") {
                            ?>
                                   <input type="text" class="form-control" name="hargamotor" value="Rp.<?php echo $hrga->harga_motor; ?>" readonly="readonly"/>
                            <?php
                                    } else {
                            ?>
                                        <input type="text" class="form-control" name="hargamotor" value="Rp.0" readonly="readonly"/>
                            <?php
                                    }
                                } 
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Harga Perlengkapan</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($harga->result() as $hrga) {
                                    if($hrga->harga_perlengkapan != "") {
                            ?>
                                   <input type="text" class="form-control" name="hargaperlengkapan" value="Rp.<?php echo $hrga->harga_perlengkapan; ?>" readonly="readonly"/>
                            <?php
                                    } else {
                            ?>
                                        <input type="text" class="form-control" name="hargaperlengkapan" value="Rp.0" readonly="readonly"/>
                            <?php
                                    }
                                } 
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Harga marketing</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($harga->result() as $hrga) {
                                    if($hrga->harga_marketing != "") {
                            ?>
                                   <input type="text" class="form-control" name="hargamarketing" value="Rp.<?php echo $hrga->harga_marketing; ?>" readonly="readonly"/>
                            <?php
                                    } else {
                            ?>
                                        <input type="text" class="form-control" name="hargamarketing" value="Rp.0" readonly="readonly"/>
                            <?php
                                    }
                                } 
                            ?>
                        </div>
                </div>
                <label for="pinjaman1" >Harga Guide</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <?php
                                foreach ($harga->result() as $hrga) {
                                    if($hrga->harga_guide != "") {
                            ?>
                                        <input type="text" class="form-control" name="hargaguide" value="Rp.<?php echo $hrga->harga_guide; ?>" readonly="readonly"/>
                                        <?php
                                            foreach ($anggota->result() as $ang) {
                                        ?>
                                            <input type="text" class="form-control" name="namaguide" value="<?php echo $ang->nama_anggota; ?>" readonly="readonly"/>
                                        <?php
                                            }
                                        ?>
                            <?php
                                    } else {
                            ?>
                                        <input type="text" class="form-control" name="hargaguide" value="Rp.0" readonly="readonly"/>
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
                                    if($keterangan == "Tunai") {
                            ?>
                                   <input type="text" class="form-control"  value="<?php echo $hrga->keterangan; ?>" readonly="readonly"/>
                             <?php
                                    } else if ($keterangan == "Debit" ) {
                            ?>

                                        <input type="text" class="form-control" value="<?php echo $hrga->keterangan; ?>" readonly="readonly"/>
                                        <input type="text" class="form-control" value="<?php echo $hrga->Nomer_Rekening; ?>" readonly="readonly"/>
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
                <label for="tgl" ><input type="checkbox" name="kembali[]" value="" readonly="readonly">Kembalikan</label></br>
                <label for="tgl" >Tanggal Pengembalian</label>
                <div class="form-group row">
                    
                        <div class="col-sm-10">
                            <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
                                <input class="form-control" type="text" name="tgl_kembali"  value="" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>
                    </div>
                </div>
                <label for="g"><input type="checkbox" name="telat[]" value="" readonly="readonly">Telat</label>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <div class="form-control" data-toggle="collapse" data-target="#demog">
                            Show Form Keterlambatan<img src="<?php echo base_url(); ?>img/down.png" width='25' class="col">
                        </div>
                        <div id="demog" class="collapse">
                            <input type="text" class="form-control" name="jam" placeholder="Jumlah Jam Telat">
                            <input type="text" class="form-control" name="harga_telat" placeholder="Harga Telat /Jam">
                        </div>
                    </div>
                </div>
                <?php
                    foreach ($peminjaman->result() as $pinjam) {
                ?>
                        
                        <div class="col-sm-10">
                            <input class="form-control" type="hidden" id="napem" width='25' name="id_pinjam" value="<?php echo $pinjam->Id_Peminjamanan; ?>" readonly="readonly">
                        </div>
                <?php
                    }
                ?>
                <input class="btn btn-primary" type="submit" />
            </table>
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