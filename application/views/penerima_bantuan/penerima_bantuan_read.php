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
        <h2 style="margin-top:0px">Penerima_bantuan Read</h2>
        <table class="table">
	    <tr><td>No Kk</td><td><?php echo $no_kk; ?></td></tr>
	    <tr><td>Nik</td><td><?php echo $nik; ?></td></tr>
	    <tr><td>Nama Penerima</td><td><?php echo $nama_penerima; ?></td></tr>
	    <tr><td>Rt</td><td><?php echo $rt; ?></td></tr>
	    <tr><td>Jenis Bantuan</td><td><?php echo $jenis_bantuan; ?></td></tr>
	    <tr><td>Tanggal Generate Penerima</td><td><?php echo $tanggal_generate_penerima; ?></td></tr>
	    <tr><td>Date Created</td><td><?php echo $date_created; ?></td></tr>
	    <tr><td>Date Updated</td><td><?php echo $date_updated; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penerima_bantuan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>