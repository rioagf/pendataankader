<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background: url('assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 850px;margin-bottom: 100px;">
        <div class="intro">
            <?php 
            if($this->session->flashdata('message') !='')
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
            <h2 class="text-center">Data User</h2>
            <hr>
        </div>
        <div style="background-color: #ffffff !important; padding: 25px; overflow: auto;">
            <table id="table_data" class="table table-striped table-bordered" style="margin-bottom: 10px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user_data as $user) { ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $user->username ?></td>
                            <td><?php echo $user->email ?></td>
                            <td><?php echo $user->no_hp ?></td>
                            <td style="text-align:center">
                                <a class="btn btn-sm btn-primary" href="<?= site_url('user/read/'.$user->id_user) ?>"><i class="fa fa-book"></i></a>
                                <a class="btn btn-sm btn-warning" href="<?= site_url('user/update/'.$user->id_user) ?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="<?= site_url('user/delete/'.$user->id_user) ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- Total Record : <?php //echo $total_rows ?> -->
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
                    <a href="<?= base_url('user/create') ?>" style="color: rgb(255,255,255);">
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