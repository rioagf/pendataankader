<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background-image: url('assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 850px;margin-bottom: 100px;">
        <div class="intro">
            <h2 class="text-center">Data Petugas</h2>
            <hr>
        </div>
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

                <!-- Project Card Example -->
                <div class="card shadow mb-12">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data User Petugas</h6>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="varchar">Username</label>
                                <input type="username" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                            </div>
                            <div class="form-group">
                                <?php if ($button == 'Create'): ?>
                                    <label for="int">Nama Petugas</label>
                                    <select class="selectnamapengaju form-control" name="no_kk" id="no_kk" required="">
                                        <optgroup label="Pilih Nama">
                                            <?php foreach ($data_warga as $warga) { ?>
                                                <option value="<?= $warga->no_kk ?>" <?php if ($no_kk == isset($warga->no_kk)) { echo "selected"; } ?>><?= $warga->nama_lengkap ?></option>
                                            <?php } ?>

                                        </optgroup>
                                    </select>
                                    <?php elseif($button == 'Update'): ?>
                                        <label>No KK</label>
                                        <input type="text" name="no_kk" id="no_kk" value="<?= $no_kk ?>" readonly class="form-control">
                                    <?php endif ?>
                                    <!-- <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" /> -->
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="rw">RW</option>
                                        <option value="rt">RT</option>
                                        <option value="kader">Kader</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" /> -->
                                </div>
                                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')">Submit</button> 
                                <a href="#" onclick="goBack()" class="btn btn-default">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if ($this->session->userdata('role') == 'administrator'): ?>
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
                                <p style="margin-bottom: 0;">DATA PETUGAS</p>
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
        <?php else: ?>
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
                                <a href="javascript:history.back()" style="color: rgb(255,255,255);">
                                    <i class="fa fa-user" style="padding: 0;font-size: 26px;width: 100%;"></i>
                                    <p style="margin-bottom: 0;">PROFILE</p>
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
        <?php endif ?>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>