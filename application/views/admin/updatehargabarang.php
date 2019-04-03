<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Harga Sewa Motor</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($listharga->result() as $row) {
        ?>
            <form method="post" action="<?php echo base_url(); ?>admin/kelola_harga_barang/updatedata">
                <table class="table table-striped" >
                     <div class="form-group row">
                        <label for="masa_berlaku" class="col-sm-2 form-control-label">Id Harga</label>
                        <div class="col-sm-10">
                          <input type="text" id="id_harga" class="form-control" name="id_harga" value="<?php echo $row->id_harga; ?>" readonly="readonly">
                        </div>
                     </div>
                    <div class="form-group row">
                        <label for="no_regs" class="col-sm-2 form-control-label">Nama Barang</label>
                        <div class="col-sm-10">
                          <input type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?php echo $row->nama_barang; ?>" readonly="readonly">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="nama_pemilik" class="col-sm-2 form-control-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" id="harga" class="form-control" name="harga" value="<?php echo $row->harga; ?>" >
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