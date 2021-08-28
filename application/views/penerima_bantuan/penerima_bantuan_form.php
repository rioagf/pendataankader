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
        <h2 style="margin-top:0px">Penerima_bantuan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">No Kk <?php echo form_error('no_kk') ?></label>
            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nik <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Penerima <?php echo form_error('nama_penerima') ?></label>
            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="Nama Penerima" value="<?php echo $nama_penerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rt <?php echo form_error('rt') ?></label>
            <input type="text" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Bantuan <?php echo form_error('jenis_bantuan') ?></label>
            <input type="text" class="form-control" name="jenis_bantuan" id="jenis_bantuan" placeholder="Jenis Bantuan" value="<?php echo $jenis_bantuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Generate Penerima <?php echo form_error('tanggal_generate_penerima') ?></label>
            <input type="text" class="form-control" name="tanggal_generate_penerima" id="tanggal_generate_penerima" placeholder="Tanggal Generate Penerima" value="<?php echo $tanggal_generate_penerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date Created <?php echo form_error('date_created') ?></label>
            <input type="text" class="form-control" name="date_created" id="date_created" placeholder="Date Created" value="<?php echo $date_created; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Date Updated <?php echo form_error('date_updated') ?></label>
            <input type="text" class="form-control" name="date_updated" id="date_updated" placeholder="Date Updated" value="<?php echo $date_updated; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <input type="hidden" name="id_penerima" value="<?php echo $id_penerima; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penerima_bantuan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>