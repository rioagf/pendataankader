<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('../../assets/img/8.jpg');background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 850px; margin-bottom: 100px;">
        <div class="intro">
            <h2 class="text-center">Detail Penerima Bantuan</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px;">
            <table class="table">
                <tr>
                    <td>No Kk</td>
                    <td><?php echo $no_kk; ?></td>
                </tr>
                <tr>
                    <td>Nik</td>
                    <td><?php echo $nik; ?></td>
                </tr>
                <tr>
                    <td>Nama Penerima</td>
                    <td><?php echo $nama_penerima; ?></td>
                </tr>
                <tr>
                    <td>Rt</td>
                    <td><?php echo $rt; ?></td>
                </tr>
                <tr>
                    <td>Jenis Bantuan</td>
                    <td><?php echo $jenis_bantuan; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Generate Penerima</td>
                    <td><?php echo $tanggal_generate_penerima; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Generate</td>
                    <td><?php echo date('d F Y', strtotime($date_created)); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a class="btn btn-sm btn-warning" href="<?php echo site_url('penerima_bantuan') ?>" class="btn btn-default">Kembali</a></td>
                </tr>
            </table>
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
                    <a href="<?= base_url('penerima_bantuan') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-file" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">PENERIMA BANTUAN</p>
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