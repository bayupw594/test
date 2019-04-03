<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Harga Sewa Motor</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($listharga->result() as $row) {
        ?>
            <form method="post" action="<?php echo base_url(); ?>admin/kelola_harga_sewa/updatedata">
                <table class="table table-striped" >
                     <div class="form-group row">
                        <label for="masa_berlaku" class="col-sm-2 form-control-label">Kode Harga</label>
                        <div class="col-sm-10">
                          <input type="text" id="kode_harga" class="form-control" name="kode_harga" value="<?php echo $row->kode_harga; ?>" readonly="readonly">
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="no_regs" class="col-sm-2 form-control-label">Tipe Motor</label>
                        <div class="col-sm-10">
                          <input type="text" id="tipe_motor" class="form-control" name="tipe_motor" value="<?php echo $row->tipe_motor; ?>" readonly="readonly">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="nama_pemilik" class="col-sm-2 form-control-label">Hari</label>
                        <div class="col-sm-10">
                          <input type="text" id="hari" class="form-control" name="hari" value="<?php echo $row->hari; ?>" readonly="readonly">
                        </div>
                     </div> 
                     <div class="form-group row">
                        <label for="types" class="col-sm-2 form-control-label">Jam</label>
                        <div class="col-sm-10">
                          <input type="text" id="jam" class="form-control" name="jam" value="<?php echo $row->jam; ?>" readonly="readonly">
                        </div>
                     </div> 
                     <div class="form-group row">
                        <label for="no_rangka" class="col-sm-2 form-control-label">Harga Sewa</label>
                        <div class="col-sm-10">
                          <input type="text" id="harga_sewa" class="form-control" name="harga_sewa" value="<?php echo $row->harga_sewa; ?>" >
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