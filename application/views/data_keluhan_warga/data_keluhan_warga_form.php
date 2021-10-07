<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('../assets/img/8.jpg');background-size: cover; background-attachment: fixed; padding: 75px 15px;">
    <div class="container" style="max-width: 1350px;">
        <div class="intro">
            <h2 class="text-center">Lapor Keluhan</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px; overflow: auto;">
            <form action="<?php echo $action; ?>" method="post">
             <div class="form-group">
                <label for="varchar">Kategori Keluhan <?php echo form_error('judul_keluhan') ?></label>
                <select class="form-control" name="judul_keluhan" id="judul_keluhan" >
                    <option value="Keluhan Administratif" <?php if ($judul_keluhan == "Keluhan Administratif") { echo 'selected'; } ?>>Keluhan Administratif</option>
                    <option value="Keluhan Kegaduhan" <?php if ($judul_keluhan == "Keluhan Situasi") { echo 'selected'; } ?>>Keluhan Situasi</option>
                    <option value="Keluhan Fasilitas" <?php if ($judul_keluhan == "Keluhan Fasilitas") { echo 'selected'; } ?>>Keluhan Fasilitas</option>
                    <option value="Keluhan Pelayanan" <?php if ($judul_keluhan == "Keluhan Pelayanan") { echo 'selected'; } ?>>Keluhan Pelayanan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi_keluhan">Deskripsi Keluhan <?php echo form_error('deskripsi_keluhan') ?></label>
                <textarea class="form-control" rows="3" name="deskripsi_keluhan" id="deskripsi_keluhan" placeholder="Deskripsi Keluhan"><?php echo $deskripsi_keluhan; ?></textarea>
            </div>
            <input type="hidden" name="id_keluhan" value="<?php echo $id_keluhan; ?>" /> 
            <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')" >Lapor Keluhan</button> 
            <a href="<?php echo site_url('data_keluhan_warga') ?>" class="btn btn-default btn-danger">Cancel</a>
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
                    <a href="<?= base_url('data_keluhan_warga') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-file" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">DATA KELUHAN</p>
                    </a>
                </div>
                <div class="col text-center" style="width: 33.3333%;">
                    <a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Anda yakin mau Keluar ?')" style="color: rgb(255,255,255);">
                        <i class="fa fa-sign-out" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">LOGOUT</p>
                    </a>
                </div>
            </div>
        </section>
    </div>
</nav>