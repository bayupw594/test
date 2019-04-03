<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Data Perlengkapan</h4>
    </div>      
    <div class="modal-body form-group">
        <?php
            foreach ($listperlengkapan->result() as $row) {
        ?>

        <form method="post" action="<?php echo base_url(); ?>admin/kelola_barang/up">
            <table class="table table-striped">
                <div class="form-group row">
                    <label for="id_perlengkapan" class="col-sm-2 form-control-label">Id Perlengkapan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->id_perlengkapan; ?>" name="id_perlengkapan" placeholder="id_perlengkapan" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_perlengkapan" class="col-sm-2 form-control-label">Jenis Perlengkapan</label>
                    <div class="col-sm-10">
                        <select name="jenis_perlengkapan" class="form-control">
                            <option value="<?php echo $row->jenis_perlengkapan; ?>"><?php echo $row->jenis_perlengkapan; ?></option>
                            <option value="B">B</option>
                            <option value="EP">EP</option>
                            <option value="KP">KP</option>
                            <option value="GL">GL</option>
                            <option value="J">J</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select>   
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_perlengkapan" class="col-sm-2 form-control-label">Jumlah Perlengkapan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->jumlah_perlengkapan; ?>" name="jumlah_perlengkapan" placeholder="id_perlengkapan"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kondisi" class="col-sm-2 form-control-label">Kondisi</label>
                    <div class="col-sm-10">
                        <select name="kondisi" class="form-control">
                            <option value="<?php echo $row->kondisi; ?>"><?php echo $row->kondisi; ?></option>
                            <option value="baik">Baik</option>
                            <option value="Sedang">Sedang</option>
                            <option value="buruk">Buruk</option>
                        </select>   
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