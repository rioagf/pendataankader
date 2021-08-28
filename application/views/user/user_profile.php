<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('../../assets/img/8.jpg');background-size: cover;">
    <div class="container" style="max-width: 850px;margin-bottom: 100px;text-align: center; overflow: auto;">
        <div class="intro">
            <h2 class="text-center">Profile User</h2>
            <hr>
        </div>
        <img src="<?= base_url()?>assets/img/population-system.png" style="width: 150px;max-width: 150px;border-width: 1px;border-style: solid;border-radius: 35%;padding: 20px;background: #6b009d;margin-bottom: 25px;">
        <h3>Data Anggota Keluarga :</h3>
        <?php foreach ($data as $profile) { ?>
            <table class="table" style="text-align: left;">
                <tr>
                    <th width="25%;">Nama Lengkap</th>
                    <td width="5%;">:</td>
                    <td><?= $profile->nama_lengkap; ?></td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>:</td>
                    <td><?= $profile->nik; ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td>
                        <?php if ($profile->jenis_kelamin == 'L') {
                            echo "Laki-laki";
                        } else {
                            echo "Perempuan";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>:</td>
                    <td><?= $profile->tempat_lahir.', '.date('d F Y', strtotime($profile->tanggal_lahir)); ?></td>
                </tr>
            </table>
            <hr>
        <?php } ?>
        <strong>No KK : <?= $profile->no_kk; ?></strong>
    </div>
</section>
<nav class="navbar navbar-light navbar-expand fixed-bottom" style="background: rgba(66,0,98,0.5);box-shadow: 0px 2px 15px 0px;padding: 7px 2px;">
    <div class="container">
        <section class="d-flex justify-content-center" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col text-center" style="width: 33.3333%;">
                    <a class="stretched-link" href="<?= base_url('') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-home" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">HOME</p>
                    </a>
                </div>
                <div class="col text-center" style="width: 33.3333%;">
                    <a href="<?= base_url('user/update/'.$this->session->userdata('id_user')) ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-user-plus" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">EDIT PROFILE</p>
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