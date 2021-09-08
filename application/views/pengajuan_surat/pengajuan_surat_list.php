<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('assets/img/8.jpg');background-size: cover; background-attachment: fixed; padding: 75px;">
    <div class="container" style="max-width: 850px;">
        <div class="intro">
            <?php 
            if($this->session->flashdata('message') !='')
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
            <h2 class="text-center">Data Pengajuan</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px; margin-bottom: 100px; overflow: auto;">
            <table id="table_data" class="table table-striped table-bordered" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Surat</th>
                        <th>Nama Pembuat Pengajuan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pengajuan_surat_data as $pengajuan_surat) { ?>
                        <tr <?php if ($pengajuan_surat->status_pengajuan == "Pengajuan Baru") { echo 'style="font-weight: 600"'; } ?>>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $pengajuan_surat->jenis_surat ?></td>
                            <td><?php echo $pengajuan_surat->nama_pembuat_pengajuan ?></td>
                            <td><?php echo date("d F Y", strtotime($pengajuan_surat->date_created)); ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= site_url('pengajuan_surat/read/'.$pengajuan_surat->id_pengajuan) ?>"><i class="fa fa-book"></i></a>
                                <?php if ($this->session->userdata('role') == 'warga' || $this->session->userdata('role') == 'kader' ) { ?>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('pengajuan_surat/delete/'.$pengajuan_surat->id_pengajuan) ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php if ($this->session->userdata('role') == 'warga' ) { ?>
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
                        <a href="<?= base_url('pengajuan_surat/create') ?>" style="color: rgb(255,255,255);">
                            <i class="fa fa-pencil-square-o" style="padding: 0;font-size: 26px;width: 100%;"></i>
                            <p style="margin-bottom: 0;">AJUKAN SURAT</p>
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