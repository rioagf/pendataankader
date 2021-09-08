<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('../assets/img/8.jpg');background-size: cover; background-attachment: fixed; padding: 75px;">
    <div class="container" style="max-width: 850px;">
        <div class="intro">
            <h2 class="text-center">Pengajuan Surat</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px; margin-bottom: 100px; overflow: auto;">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Jenis Surat <?php echo form_error('jenis_surat') ?></label>
                    <select class="form-control" name="jenis_surat" id="jenis_surat" required="">
                        <optgroup label="Pilih Salah Satu">
                            <option value="surat kematian">Surat Kematian</option>
                            <option value="surat domisili">Surat Domisili</option>
                            <option value="surat dispensasi">Surat Dispensasi</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">Nama Pembuat Pengajuan <?php echo form_error('nama_pembuat_pengajuan') ?></label>
                    <input type="text" class="form-control" name="nama_pembuat_pengajuan" id="nama_pembuat_pengajuan" placeholder="Nama Pembuat Pengajuan" value="<?php echo $nama_pembuat_pengajuan; ?>" required=""/>
                </div>
                <div id="kematian">
                    <div class="form-group">
                        <label for="varchar">Nama Yang Meninggal <?php echo form_error('nama_yang_meninggal') ?></label>
                        <input type="text" class="form-control" name="nama_yang_meninggal" id="nama_yang_meninggal" placeholder="Nama Yang Meninggal" value="<?php echo $nama_yang_meninggal; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Kematian <?php echo form_error('tanggal_kematian') ?></label>
                        <input type="date" class="form-control" name="tanggal_kematian" id="tanggal_kematian" placeholder="Tanggal Kematian" value="<?php echo $tanggal_kematian; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Faktor Kematian <?php echo form_error('faktor_kematian') ?></label>
                        <input type="text" class="form-control" name="faktor_kematian" id="faktor_kematian" placeholder="Faktor Kematian" value="<?php echo $faktor_kematian; ?>" />
                    </div>
                </div>
                <div id="dispensasi">
                    <div class="form-group">
                        <label for="date">Tanggal Dispensasi <?php echo form_error('tanggal_dispensasi') ?></label>
                        <input type="date" class="form-control" name="tanggal_dispensasi" id="tanggal_dispensasi" placeholder="Tanggal Dispensasi" value="<?php echo $tanggal_dispensasi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Sampai Tanggal <?php echo form_error('sampai_tanggal_dispensasi') ?></label>
                        <input type="date" class="form-control" name="sampai_tanggal_dispensasi" id="sampai_tanggal_dispensasi" placeholder="Sampai Tanggal Dispensasi" value="<?php echo $sampai_tanggal_dispensasi; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Jumlah Hari <?php echo form_error('jumlah_hari') ?></label>
                        <input type="text" class="form-control" name="jumlah_hari" id="jumlah_hari" placeholder="Jumlah Hari" value="<?php echo $jumlah_hari; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="alasan_dispen">Alasan Dispen <?php echo form_error('alasan_dispen') ?></label>
                        <textarea class="form-control" rows="3" name="alasan_dispen" id="alasan_dispen" placeholder="Alasan Dispen"><?php echo $alasan_dispen; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar">RT Domisili <?php echo form_error('rt_domisili') ?></label>
                    <input type="text" class="form-control" name="rt_domisili" id="rt_domisili" placeholder="RT Domisili" value="<?php echo $rt_domisili; ?>" required=""/>
                </div>
                <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>" /> 
                <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Update</button> 
                <a href="<?php echo site_url('pengajuan_surat') ?>" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</section>
<nav class="navbar navbar-light navbar-expand fixed-bottom" style="background: rgba(66,0,98,0.5);box-shadow: 0px 2px 15px 0px;padding: 7px 2px;">
    <div class="container">
        <section class="d-flex justify-content-center" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col text-center" style="width: 33.3333%;">
                    <a class="stretched-link" href="<?= base_url() ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-home" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">HOME</p>
                    </a>
                </div>
                <div class="col text-center" style="width: 33.3333%;">
                    <a href="<?= base_url('pengajuan_surat') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-file" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">DATA PENGAJUAN</p>
                    </a>
                </div>
                <div class="col text-center" style="width: 33.3333%;">
                    <a href="<?= base_url('pengajuan_surat') ?>" onclick="return confirm('Anda yakin mau Keluar ?')" style="color: rgb(255,255,255);">
                        <i class="fa fa-sign-out" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">LOGOUT</p>
                    </a>
                </div>
            </div>
        </section>
    </div>
</nav>