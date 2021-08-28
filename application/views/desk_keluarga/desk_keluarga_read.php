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
        <h2 style="margin-top:0px">Desk_keluarga Read</h2>
        <table class="table">
	    <tr><td>No Kk</td><td><?php echo $no_kk; ?></td></tr>
	    <tr><td>Tempat Tinggal</td><td><?php echo $tempat_tinggal; ?></td></tr>
	    <tr><td>Status Lahan</td><td><?php echo $status_lahan; ?></td></tr>
	    <tr><td>Luas Lantai</td><td><?php echo $luas_lantai; ?></td></tr>
	    <tr><td>Luas Lahan</td><td><?php echo $luas_lahan; ?></td></tr>
	    <tr><td>Jenis Lantai</td><td><?php echo $jenis_lantai; ?></td></tr>
	    <tr><td>Dinding</td><td><?php echo $dinding; ?></td></tr>
	    <tr><td>Jendela</td><td><?php echo $jendela; ?></td></tr>
	    <tr><td>Genteng</td><td><?php echo $genteng; ?></td></tr>
	    <tr><td>Penerangan</td><td><?php echo $penerangan; ?></td></tr>
	    <tr><td>Energi Memasak</td><td><?php echo $energi_memasak; ?></td></tr>
	    <tr><td>Tps</td><td><?php echo $tps; ?></td></tr>
	    <tr><td>Mck</td><td><?php echo $mck; ?></td></tr>
	    <tr><td>Sumber Airmandi</td><td><?php echo $sumber_airmandi; ?></td></tr>
	    <tr><td>Fasilitas Bab</td><td><?php echo $fasilitas_bab; ?></td></tr>
	    <tr><td>Sumber Airminum</td><td><?php echo $sumber_airminum; ?></td></tr>
	    <tr><td>Pembuangan Limbah</td><td><?php echo $pembuangan_limbah; ?></td></tr>
	    <tr><td>Bawah Sutet</td><td><?php echo $bawah_sutet; ?></td></tr>
	    <tr><td>Bantaran Sungai</td><td><?php echo $bantaran_sungai; ?></td></tr>
	    <tr><td>Lerang</td><td><?php echo $lerang; ?></td></tr>
	    <tr><td>Kondisi Rumah</td><td><?php echo $kondisi_rumah; ?></td></tr>
	    <tr><td>Date Created</td><td><?php echo $date_created; ?></td></tr>
	    <tr><td>Date Updated</td><td><?php echo $date_updated; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('desk_keluarga') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>