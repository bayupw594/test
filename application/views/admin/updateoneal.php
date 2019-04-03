<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Harga Sewa Motor</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($listoneal->result() as $row) {
        ?>
            <form method="post" action="<?php echo base_url(); ?>admin/kelola_barang/updateoneal">
                <table class="table table-striped" >
                     <div class="form-group row">
                        <label for="masa_berlaku" class="col-sm-2 form-control-label">Id Boot</label>
                        <div class="col-sm-10">
                          <input type="text" id="id_boot" class="form-control" name="id_boot" value="<?php echo $row->id_boot; ?>" readonly="readonly">
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="no_regs" class="col-sm-2 form-control-label">Nama Boot</label>
                        <div class="col-sm-10">
                          <input type="text" id="nama_boot" class="form-control" name="nama_boot" value="<?php echo $row->nama; ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="nama_pemilik" class="col-sm-2 form-control-label">Anggota</label>
                        <div class="col-sm-10">
                          <select name="namaanggota" class="form-control">
                                <option value="<?php echo $row->id_anggota; ?>"><?php echo $row->nama_anggota; ?></option>
                                <?php
                                  foreach ($anggota->result() as $a) {
                                ?>
                                    <option value="<?php echo $a->id_anggota; ?>" <?php echo set_select('namafeemarketing', $a->id_anggota) ?> ><?php echo $a->nama_anggota; ?></option>
                              <?php
                                }
                              ?>
                          </select>
                        </div>
                     </div>
                     <input type="Submit" class="btn btn-primary" />
                 </table>
            </form>
        <?php
            }
        ?>   
    </div>
    <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
</div>