<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Anggota</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($listparts->result() as $row) {
        ?>
        <?php $validasi = strlen( validation_errors() ); if ( !empty( $validasi )): ?>
            <p class="alert bg-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign"></span>
                <span>Error: <br /> 
                <?php echo str_replace("<p>", "<span>",
                    str_replace("</p>", "</span><br />", validation_errors())); ?></span>
            </p>
        <?php endif; ?> 
        <?php if($this->session->flashdata('msg')): ?>
            <p class="alert bg-success" role="alert">
                <span class="glyphicon glyphicon-check"></span>
                <span><?php echo $this->session->flashdata('msg'); ?></span>
            </p>
        <?php endif; ?> 
        <?php echo form_open('admin/maintanence/update_parts') ?>
            <table class="table table-striped">
                <div class="form-group row">
                    <label for="id_anggota" class="col-sm-2 form-control-label">ID Parts</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->id_parts; ?>" name="id_parts" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_anggota" class="col-sm-2 form-control-label">Nama Parts</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->nama_parts; ?>" name="nama_parts"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor_hp" class="col-sm-2 form-control-label">Harga Parts</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->harga_parts; ?>" name="harga_parts"/>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="update"/>
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