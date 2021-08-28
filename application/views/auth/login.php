<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center login-clean" style="min-height: 100vh;background: url('assets/img/8.jpg');">
    <form method="post" action="<?= base_url('auth/proseslogin') ?>">
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $this->session->flashdata('error') ?>.
            </div>
        <?php } else if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $this->session->flashdata('success') ?>.
            </div>
        <?php } ?>
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration">
            <i class="icon ion-ios-navigate"></i>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Email / Username">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div>
        <a class="forgot" href="<?= base_url('auth/forgotpassword') ?>">Forgot your email or password?</a>
    </form>
</section>