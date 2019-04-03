<head>
    <link href="<?php echo base_url(); ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Print Gaji Pegawai</h4>
    </div>      
    <div class="modal-body">
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/anggota/ngeprint_gaji'); ?>
        <div class="form-group row">
            <label for="nama_anggota" class="col-sm-3 form-control-label"> Nama Anggota </label>
            <div class="col-sm-8">
            
                <?php 
                foreach ( $listanggota->result() as $anggota ) :
                ?>
                    <input type="text" name="nama" value="<?php echo $anggota->nama_anggota; ?>" readonly="readonly"/>
                    <input type="hidden" name="nama_anggota" value="<?php echo $anggota->id_anggota; ?>" />
                <?php endforeach; ?>
              
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_1" class="col-sm-3 form-control-label">Dari </label>
            <div class="col-sm-8">
                <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1">
        <input class="form-control" name="tgl_1" type="text" value="" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_2" class="col-sm-3 form-control-label">Hingga </label>
            <div class="col-sm-8">
                <div class="input-group date form_datetime" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input1">
        <input class="form-control" name="tgl_2" type="text" value="" readonly>
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit"></input>
        <?php echo form_close(); ?>
    </div>
    <div class="modal-footer">
        <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>

    <script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('body').on('hidden.bs.modal', '.modal', function () {
          $(this).removeData('bs.modal');
        });
    </script>   
    <script src="<?php echo base_url(); ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true,
            todayBtn: true,
            startDate: "2016-01-01 10:00",
            minuteStep: 10
        });

        $('.form_datetime').datetimepicker('update', new Date());
    </script>
</body>