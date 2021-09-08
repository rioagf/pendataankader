<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('assets/img/8.jpg');background-size: cover; background-attachment: fixed; padding: 75px;">
    <div class="container" style="max-width: 850px;">
        <?php 
            if($this->session->flashdata('message') !='')
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
        <div class="intro">
            <h2 class="text-center">Data Keluhan</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px; overflow: auto;">
            <table id="table_data" class="table table-striped table-bordered" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Keluhan</th>
                        <th>Deskripsi Keluhan</th>
                        <th>Tanggal Lapor Keluhan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_keluhan_warga_data as $data_keluhan_warga) { ?>
                        <tr <?php if ($data_keluhan_warga->status_keluhan == "Keluhan Baru"){ echo 'style="font-weight: 600;"'; } ?>>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $data_keluhan_warga->judul_keluhan ?></td>
                            <td><?php echo character_limiter($data_keluhan_warga->deskripsi_keluhan, 50) ?></td>
                            <td><?php echo date("d F Y", strtotime($data_keluhan_warga->date_created)); ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= site_url('data_keluhan_warga/read/'.$data_keluhan_warga->id_keluhan) ?>">
                                    <i class="fa fa-book"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php if ($this->session->userdata('role') != 'rw' ) { ?>
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
                        <a href="<?= base_url('data_keluhan_warga/create') ?>" style="color: rgb(255,255,255);">
                            <i class="fa fa-pencil-square-o" style="padding: 0;font-size: 26px;width: 100%;"></i>
                            <p style="margin-bottom: 0;">INPUT DATA</p>
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
<?php } else { ?>
    <nav class="navbar navbar-light navbar-expand fixed-bottom" style="background: rgba(66,0,98,0.5);box-shadow: 0px 2px 15px 0px;padding: 7px 2px;">
        <div class="container">
            <section class="d-flex justify-content-center" style="width: 100%;">
                <div class="row" style="width: 100%;">
                    <div class="col text-center" style="width: 50%;">
                        <a class="stretched-link" href="<?= base_url() ?>" style="color: rgb(255,255,255);">
                            <i class="fa fa-home" style="padding: 0;font-size: 26px;width: 100%;"></i>
                            <p style="margin-bottom: 0;">HOME</p>
                        </a>
                    </div>
                    <div class="col text-center" style="width: 50%;">
                        <a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Anda yakin mau Keluar ?')" style="color: rgb(255,255,255);">
                            <i class="fa fa-sign-out" style="padding: 0;font-size: 26px;width: 100%;"></i>
                            <p style="margin-bottom: 0;">LOGOUT</p>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </nav>
    <?php } ?>