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
        <h2 style="margin-top:0px">Data_petugas Read</h2>
        <table class="table">
	    <tr><td>Nama Petugas</td><td><?php echo $nama_petugas; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jabatan; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Date Created</td><td><?php echo $date_created; ?></td></tr>
	    <tr><td>Date Updated</td><td><?php echo $date_updated; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_petugas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>