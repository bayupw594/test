<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Motor</h4>
    </div>      
    <div class="modal-body" style="">
        <?php
        foreach ($pinjam->result() as $row) {
        ?>
            <form method="post" action="<?= base_url() ?>admin/pengembalian/peng">
                <table id="dataview" cellspacing="1">
                     <tr>
                        <td><input type="hidden" name="ip" value="<?php echo $row->Id_Peminjamanan; ?>" size="20" readonly="readonly"></td>
                    </tr>
                    <div class="form-group row">
                        <label for="nape" class="col-sm-2 form-control-label">Nama </label>
                        <div class="col-sm-10">
                          <input type="text" id="nape" class="form-control" name="napem" value="<?php echo $row->Nama_Peminjam; ?>" readonly="readonly">
                        </div>
                    </div>
                    <?php
                        $ktp=$row->No_KTP;
                        if($ktp==""){

                        } else {
                    ?>
                    <div class="form-group row">
                        <label for="ktp" class="col-sm-2 form-control-label">No KTP </label>
                        <div class="col-sm-10">
                          <input type="text" id="ktp" class="form-control" name="ktp" value="<?php echo $row->No_KTP; ?>" readonly="readonly">
                        </div>
                    </div>
                     <?php
                        }
                        $sim=$row->No_SIM;
                        if($sim==""){

                        } else {
                    ?>
                    <div class="form-group row">
                        <label for="sim" class="col-sm-2 form-control-label">No KTP </label>
                        <div class="col-sm-10">
                          <input type="text" id="sim" class="form-control" name="sim" value="<?php echo $row->No_SIM; ?>" readonly="readonly">
                        </div>
                    </div>
                     <?php
                        }
                    ?>
                    <div class="form-group row">
                        <label for="alm" class="col-sm-2 form-control-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea id="alm" class="form-control" name="alm" value="<?php echo $row->Alamat; ?>" readonly="readonly"><?php echo $row->Alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="noreg" class="col-sm-2 form-control-label">No Motor</label>
                        <div class="col-sm-10">
                          <input type="text" id="noreg" class="form-control" name="noreg" value="<?php echo $row->No_Registrasi; ?>" readonly="readonly">
                        </div>
                    </div>
                    <?php
                        foreach ($bp->result() as $bp) {
                    ?>
                    <div class="form-group row">
                        <label for="pinjam" class="col-sm-2 form-control-label">Nama Perlengkapan</label>
                        <div class="col-xs-2">
                            <input type="text" id="pinjam" class="form-control" name="pinjam[]" value="<?php echo $bp->jenis_perlengkapan; ?>" readonly="readonly">
                        </div> 
                        <label for="jml" class="col-sm-2 form-control-label">Jumlah</label> 
                        <div class="col-xs-2">
                            <input type="text" id="jml" name="jmlpinjam[]" value="<?php echo $bp->jumlah_perlengkapan; ?>" class="form-control" readonly="readonly">
                            <input type="hidden" name="idpinjam[]" value="<?php echo $bp->id_perlengkapan; ?>"size="10" readonly="readonly">
                        </div>
                    </div>
                    <?php
                        }
                        $paket=$row->paket;
                            if($paket==1){
                    ?>
                    <div class="form-group row">
                        <label for="paket" class="col-sm-2 form-control-label">Paket </label>
                        <div class="col-sm-10">
                          <input type="hidden" name="paket" value="1" size="20" readonly="readonly">12Jam
                        </div>
                    </div>
                    <?php
                        }
                        else {
                    ?>
                    <div class="form-group row">
                        <label for="paket" class="col-sm-2 form-control-label">Paket </label>
                        <div class="col-sm-10">
                          <input type="hidden" name="paket" value="1" size="20" readonly="readonly">24Jam
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 form-control-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" id="harga" class="form-control" name="harga" value="<?php echo $row->harga; ?>.000" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jaminan" class="col-sm-2 form-control-label">Jaminan</label>
                        <div class="col-sm-10">
                          <input type="text" id="jaminan" class="form-control" name="jaminan" value="<?php echo $row->jaminan; ?>" readonly="readonly">
                        </div>
                    </div>
                    <?php
                        $kt=$row->keterangan;
                        if($kt==""){

                        } else {
                    ?>
                    <div class="form-group row">
                        <label for="ket" class="col-sm-2 form-control-label">Keterangan</label>
                        <div class="col-sm-10">
                          <input type="text" id="ket" class="form-control" name="ket" value="<?php echo $row->keterangan; ?>" readonly="readonly">
                        </div>
                    </div>
                     <?php
                        }
                    ?>
                    <div class="form-group row">
                        <label for="tglp" class="col-sm-2 form-control-label">Tanggal Pinjam</label>
                        <div class="col-sm-10">
                          <input type="text" id="tglp" class="form-control" name="tglp" value="<?php echo $row->Tanggal; ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tglk" class="col-sm-2 form-control-label">Tanggal Kembali</label>
                        <div class="col-sm-10">
                            <!--<input type="Text" class="form-control input-append" id="demo43" maxlength="15" size="15" name="tgl">
                            <a href="javascript: NewCssCal('demo43','yyyymmdd','arrow',true)">
                            <img src="<?php echo base_url();?>images/cal.gif" width="16" height="16" alt="Pick a date">-->
                            <div class="input-group date form_datetime col-sm-7" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii " data-link-field="dtp_input1">
                                <input class="form-control" name="tgl" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input1" value="" />
                        </div>

                    </div>
                    <input class="btn btn-primary" type="submit" value="Kembalikan"/>
                </table>
            </form>
        <?php
            }
        ?>         
    </div>
    <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2013-02-14 10:00",
            minuteStep: 10
        });
    </script>
</div>