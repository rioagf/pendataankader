<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Laporan_data_warga <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jumlah Data <?php echo form_error('jumlah_data') ?></label>
            <input type="text" class="form-control" name="jumlah_data" id="jumlah_data" placeholder="Jumlah Data" value="<?php echo $jumlah_data; ?>" />
        </div>
	    <div class="form-group">
            <label for="longtext">Id Data Warga <?php echo form_error('id_data_warga') ?></label>
            <input type="text" class="form-control" name="id_data_warga" id="id_data_warga" placeholder="Id Data Warga" value="<?php echo $id_data_warga; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Lapor <?php echo form_error('status_lapor') ?></label>
            <input type="text" class="form-control" name="status_lapor" id="status_lapor" placeholder="Status Lapor" value="<?php echo $status_lapor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rt <?php echo form_error('rt') ?></label>
            <input type="text" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date Created <?php echo form_error('date_created') ?></label>
            <input type="text" class="form-control" name="date_created" id="date_created" placeholder="Date Created" value="<?php echo $date_created; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date Updated <?php echo form_error('date_updated') ?></label>
            <input type="text" class="form-control" name="date_updated" id="date_updated" placeholder="Date Updated" value="<?php echo $date_updated; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <input type="hidden" name="id_laporandata_warga" value="<?php echo $id_laporandata_warga; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporan_data_warga') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>