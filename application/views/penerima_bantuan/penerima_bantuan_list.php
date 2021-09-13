<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh; padding-top: 100px;background: url('assets/img/8.jpg');background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 1000px; overflow: auto; margin-bottom: 100px;">
        <div class="intro">
            <?php 
            if($this->session->flashdata('message') !='')
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
            <h2 class="text-center">Laporan Data Penerima Bantuan</h2>
            <?php if ($this->session->userdata('role') == 'kader'): ?>
                <a href="<?= base_url('penerima_bantuan/generate_data') ?>" onclick="return confirm('Anda yakin mau generate data ?')" class="btn btn-primary" type="button" style="background: rgba(0,123,255,0);color: rgb(0,0,0);border-radius: 0px;border-width: 0px;border-bottom-width: 1px;border-bottom-color: rgb(0,0,0);margin-bottom: 10px;">Generate Data</a>
            <?php endif ?>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px;">
            <table id="table_data" class="table table-striped table-bordered" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama Penerima</th>
                            <th>RT</th>
                            <th>Layak/Tidak</th>
                            <th>Tanggal Generate Penerima</th>
                            <th>Action</th>
                        </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penerima_bantuan_data as $penerima_bantuan) { ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $penerima_bantuan->no_kk ?></td>
                            <td><?php echo $penerima_bantuan->nik ?></td>
                            <td><?php echo $penerima_bantuan->nama_penerima ?></td>
                            <td><?php echo $penerima_bantuan->rt ?></td>
                            <td><?php echo $penerima_bantuan->status ?></td>
                            <td><?php echo date('d F Y', strtotime($penerima_bantuan->tanggal_generate_penerima)) ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= site_url('penerima_bantuan/read/'.$penerima_bantuan->id_penerima) ?>"><i class="fa fa-book"></i></a>
                                <?php if ($this->session->userdata('role') == 'kader') { ?>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('penerima_bantuan/delete/'.$penerima_bantuan->id_penerima) ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fa fa-trash"></i></a>
                                <?php } ?> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
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