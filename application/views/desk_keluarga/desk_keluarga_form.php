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
        <h2 style="margin-top:0px">Desk_keluarga <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">No Kk <?php echo form_error('no_kk') ?></label>
            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Tinggal <?php echo form_error('tempat_tinggal') ?></label>
            <input type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" placeholder="Tempat Tinggal" value="<?php echo $tempat_tinggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Lahan <?php echo form_error('status_lahan') ?></label>
            <input type="text" class="form-control" name="status_lahan" id="status_lahan" placeholder="Status Lahan" value="<?php echo $status_lahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Luas Lantai <?php echo form_error('luas_lantai') ?></label>
            <input type="text" class="form-control" name="luas_lantai" id="luas_lantai" placeholder="Luas Lantai" value="<?php echo $luas_lantai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Luas Lahan <?php echo form_error('luas_lahan') ?></label>
            <input type="text" class="form-control" name="luas_lahan" id="luas_lahan" placeholder="Luas Lahan" value="<?php echo $luas_lahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Lantai <?php echo form_error('jenis_lantai') ?></label>
            <input type="text" class="form-control" name="jenis_lantai" id="jenis_lantai" placeholder="Jenis Lantai" value="<?php echo $jenis_lantai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Dinding <?php echo form_error('dinding') ?></label>
            <input type="text" class="form-control" name="dinding" id="dinding" placeholder="Dinding" value="<?php echo $dinding; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jendela <?php echo form_error('jendela') ?></label>
            <input type="text" class="form-control" name="jendela" id="jendela" placeholder="Jendela" value="<?php echo $jendela; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Genteng <?php echo form_error('genteng') ?></label>
            <input type="text" class="form-control" name="genteng" id="genteng" placeholder="Genteng" value="<?php echo $genteng; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Penerangan <?php echo form_error('penerangan') ?></label>
            <input type="text" class="form-control" name="penerangan" id="penerangan" placeholder="Penerangan" value="<?php echo $penerangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Energi Memasak <?php echo form_error('energi_memasak') ?></label>
            <input type="text" class="form-control" name="energi_memasak" id="energi_memasak" placeholder="Energi Memasak" value="<?php echo $energi_memasak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tps <?php echo form_error('tps') ?></label>
            <input type="text" class="form-control" name="tps" id="tps" placeholder="Tps" value="<?php echo $tps; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mck <?php echo form_error('mck') ?></label>
            <input type="text" class="form-control" name="mck" id="mck" placeholder="Mck" value="<?php echo $mck; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sumber Airmandi <?php echo form_error('sumber_airmandi') ?></label>
            <input type="text" class="form-control" name="sumber_airmandi" id="sumber_airmandi" placeholder="Sumber Airmandi" value="<?php echo $sumber_airmandi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Fasilitas Bab <?php echo form_error('fasilitas_bab') ?></label>
            <input type="text" class="form-control" name="fasilitas_bab" id="fasilitas_bab" placeholder="Fasilitas Bab" value="<?php echo $fasilitas_bab; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sumber Airminum <?php echo form_error('sumber_airminum') ?></label>
            <input type="text" class="form-control" name="sumber_airminum" id="sumber_airminum" placeholder="Sumber Airminum" value="<?php echo $sumber_airminum; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pembuangan Limbah <?php echo form_error('pembuangan_limbah') ?></label>
            <input type="text" class="form-control" name="pembuangan_limbah" id="pembuangan_limbah" placeholder="Pembuangan Limbah" value="<?php echo $pembuangan_limbah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bawah Sutet <?php echo form_error('bawah_sutet') ?></label>
            <input type="text" class="form-control" name="bawah_sutet" id="bawah_sutet" placeholder="Bawah Sutet" value="<?php echo $bawah_sutet; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bantaran Sungai <?php echo form_error('bantaran_sungai') ?></label>
            <input type="text" class="form-control" name="bantaran_sungai" id="bantaran_sungai" placeholder="Bantaran Sungai" value="<?php echo $bantaran_sungai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lerang <?php echo form_error('lerang') ?></label>
            <input type="text" class="form-control" name="lerang" id="lerang" placeholder="Lerang" value="<?php echo $lerang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kondisi Rumah <?php echo form_error('kondisi_rumah') ?></label>
            <input type="text" class="form-control" name="kondisi_rumah" id="kondisi_rumah" placeholder="Kondisi Rumah" value="<?php echo $kondisi_rumah; ?>" />
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
	    <input type="hidden" name="id_desk" value="<?php echo $id_desk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('desk_keluarga') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>