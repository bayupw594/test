<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Motor</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($dmotor->result() as $row) {
        ?>
            <form method="post" action="<?php echo base_url(); ?>admin/kelola_motor/um">
                <table class="table table-striped" >
                    <div class="form-group row">
                        <label for="no_regs" class="col-sm-2 form-control-label">No Motor</label>
                        <div class="col-sm-10">
                          <input type="text" id="no_regs" class="form-control" name="no_regs" value="<?php echo $row->No_Registrasi; ?>" placeholder="Nomor Motor" readonly="readonly">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="nama_pemilik" class="col-sm-2 form-control-label">Nama Pemilik</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="nama_pemilik">
                            <option value="<?php echo $row->id_anggota ?>"><?php echo $row->Nama_Pemilik ?></option>
                            <?php 
                            foreach ( $nama->result_array() as $anggota ) {
                            ?>
                              <option value="<?php echo $anggota['id_anggota']; ?>"><?php echo $anggota['nama_anggota']; ?>
                            </option>
                        <?php 
                        } ?>
                          </select>
                        </div>
                     </div> 
                     <div class="form-group row">
                        <label for="types" class="col-sm-2 form-control-label">Type</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="types" >
                            <?php $type = $row->Type; ?>
                            <option value="KLXS" <?php if($type == "KLXS") echo 'selected="selected"'?>>KLXS</option>
                            <option value="KLXL" <?php if($type == "KLXL") echo 'selected="selected"'?>>KLXL</option>
                            <option value="KLXG" <?php if($type == "KLXG") echo 'selected="selected"'?>>KLXG</option>
                            <option value="KLXBF" <?php if($type == "KLXBF") echo 'selected="selected"'?>>KLXBF</option>
                          </select>
                        </div>
                     </div>                      
                     <input type="submit" class="btn btn-primary" value="Update"/>
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