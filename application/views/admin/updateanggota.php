<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Anggota</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($listanggota->result() as $row) {
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
        <?php echo form_open('admin/anggota/update_anggota') ?>
            <table class="table table-striped">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" value="<?php echo $row->id_anggota; ?>" name="id_anggota" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_anggota" class="col-sm-2 form-control-label">Nama Anggota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->nama_anggota; ?>" name="nama_anggota"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-2 form-control-label">Jenis Keanggotaan</label>
                    <div class="col-sm-10">
                       <select class="form-control" name="jenis">
                           <option><?php if ($row->jenis == "Anggota") { echo "Anggota" ;} 
                                    else if( $row->jenis == "Investor") { echo "Investor"; }
                                    else { echo "Marketing"; } ?>
                            </option>
                            <option>Anggota</option>
                            <option>Investor</option>
                            <option>Marketing</option>
                       </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomor_hp" class="col-sm-2 form-control-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->nomor_hp; ?>" name="nomor_hp"/>
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