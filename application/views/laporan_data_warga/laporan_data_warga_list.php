<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url('assets/img/8.jpg');background-size: cover; background-attachment: fixed;">
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
            <h2 class="text-center">Laporan Data Warga</h2>
            <a href="<?= base_url('laporan_data_warga/generate') ?>" onclick="return confirm('Anda yakin mau generate data ?')" class="btn btn-primary" type="button" style="background: rgba(0,123,255,0);color: rgb(0,0,0);border-radius: 0px;border-width: 0px;border-bottom-width: 1px;border-bottom-color: rgb(0,0,0);margin-bottom: 10px;">Generate Data</a>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px;">
            <table id="table_data" class="table table-striped table-bordered" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Total Data</th>
                        <th>Status Lapor</th>
                        <th>Tanggal Lapor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan_data_warga_data as $laporan_data_warga) { ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $laporan_data_warga->jumlah ?></td>
                            <td><?php echo $laporan_data_warga->status_lapor ?></td>
                            <td><?php echo date('d F Y', strtotime($laporan_data_warga->date_created)) ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= site_url('laporan_data_warga/read/'.$laporan_data_warga->id_laporandata_warga) ?>"><i class="fa fa-book"></i></a>
                                <?php if ($this->session->userdata('role') == 'kader') { ?>
                                    <?php if ($laporan_data_warga->status_lapor == 'Belum Dilaporkan') { ?>
                                <a class="btn btn-sm btn-secondary" href="<?= site_url('laporan_data_warga/laporkan/'.$laporan_data_warga->id_laporandata_warga) ?>" onclick="return confirm('Anda yakin mau melaporkan item ini ?')"><i class="fa fa-paper-plane"></i></a>
                            <?php } ?>
                                <a class="btn btn-sm btn-danger" href="<?= site_url('laporan_data_warga/delete/'.$laporan_data_warga->id_laporandata_warga) ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fa fa-trash"></i></a>
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