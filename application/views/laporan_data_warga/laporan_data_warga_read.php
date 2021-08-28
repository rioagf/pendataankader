<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background: url('../../assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 850px;margin-bottom: 100px;">
        <div class="intro">
            <h2 class="text-center">Detail Data</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px; overflow: auto;">
            <table class="table">
                <tr>
                    <td>Jumlah Kepala Keluarga</td>
                    <td><?php echo $jumlah; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 1</td>
                    <td><?php echo $rt_satu; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 2</td>
                    <td><?php echo $rt_dua; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 3</td>
                    <td><?php echo $rt_tiga; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 4</td>
                    <td><?php echo $rt_empat; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 5</td>
                    <td><?php echo $rt_lima; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 6</td>
                    <td><?php echo $rt_enam; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 7</td>
                    <td><?php echo $rt_tujuh; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Jumlah Kepala Keluarga RT 8</td>
                    <td><?php echo $rt_delapan; ?> Kepala Keluarga</td>
                </tr>
                <tr>
                    <td>Status Lapor</td>
                    <td><?php echo $status_lapor; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lapor</td>
                    <td><?php echo date('d F Y', strtotime($date_created)); ?></td>
                </tr>
            </table>
            <div style="padding: 25px"></div>
            <tr>
                <td></td>
                <td><a href="<?php echo site_url('laporan_data_warga') ?>" class="btn btn-warning">Kembali</a></td>
            </tr>
        </table>
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
                    <a href="<?= base_url('laporan_data_warga') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-users" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">LAPORAN</p>
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