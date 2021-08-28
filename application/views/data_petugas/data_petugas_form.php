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
        <h2 style="margin-top:0px">Data_petugas <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Petugas <?php echo form_error('nama_petugas') ?></label>
            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" value="<?php echo $nama_petugas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date Created <?php echo form_error('date_created') ?></label>
            <input type="text" class="form-control" name="date_created" id="date_created" placeholder="Date Created" value="<?php echo $date_created; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date Updated <?php echo form_error('date_updated') ?></label>
            <input type="text" class="form-control" name="date_updated" id="date_updated" placeholder="Date Updated" value="<?php echo $date_updated; ?>" />
        </div>
	    <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_petugas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>