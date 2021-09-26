<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background-image: url('../../assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 850px;margin-bottom: 100px;">
        <div class="intro">
            <h2 class="text-center">Data User</h2>
            <hr>
        </div>
        <table class="table">
           <tr>
            <td>Username</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?php echo $password; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td><?php echo $no_hp; ?></td>
        </tr>
        <tr>
            <td>No Kk</td>
            <td><?php echo $no_kk; ?></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><?php echo $role; ?></td>
        </tr>
        <tr>
            <td>Date Created</td>
            <td><?php echo date('d F Y', strtotime($date_created)); ?></td>
        </tr>
        <tr>
            <td>Date Updated</td>
            <td><?php echo date('d F Y', strtotime($date_updated)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="#" onclick="goBack()" class="btn btn-warning">Cancel</a></td>
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
                    <a href="<?= base_url('user') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-user" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">DATA USER</p>
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
<script>
    function goBack() {
        window.history.back();
    }
</script>