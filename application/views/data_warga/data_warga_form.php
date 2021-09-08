<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background: url('../assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
    <div class="container" style="max-width: 850px;margin-bottom: 100px;">
        <div class="intro">
            <h2 class="text-center">Tambah Data Warga</h2>
            <hr>
        </div>
        <form action="<?php echo $action; ?>" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="int">No KK <?php echo form_error('no_kk') ?></label>
                        <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No KK" value="<?php echo $no_kk; ?>" required/>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card add-more">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0" style="padding-top: 0px;">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Data Anggota Keluarga
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="int">NIK <?php echo form_error('nik') ?></label>
                                        <input type="text" class="form-control" name="nik[]" id="nik[]" placeholder="NIK" value="<?php echo $nik; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                                <input type="text" class="form-control" name="nama_lengkap[]" id="nama_lengkap[]" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" required/>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="char">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                                        <select name="jenis_kelamin[]" id="jenis_kelamin[]" class="form-control" required>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                                        <input type="text" class="form-control" name="tempat_lahir[]" id="tempat_lahir[]" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                                        <input type="date" class="form-control" name="tanggal_lahir[]" id="tanggal_lahir[]" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="varchar">Status Perkawinan <?php echo form_error('status_perkawinan') ?></label>
                                        <select name="status_perkawinan[]" id="status_perkawinan[]" class="form-control" required>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="varchar">Agama <?php echo form_error('agama') ?></label>
                                        <select name="agama[]" id="agama[]" class="form-control" required>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Kristen Khatolik">Kristen Khatolik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="varchar">Warganegara <?php echo form_error('warganegara') ?></label>
                                        <select name="warganegara[]" id="warganegara[]" class="form-control" required>
                                            <option value="WNI">Warga Negara Indonesia</option>
                                            <option value="WNA">Warga Negara Asing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
                                <select name="pendidikan[]" id="pendidikan[]" class="form-control" required>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                    <option value="Pesantren, Seminari, Wihara dan Sejenisnya">Pesantren, Seminari, Wihara dan Sejenisnya</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="varchar">Kondisi Pekerjaan <?php echo form_error('kondisi_pekerjaan') ?></label>
                                        <select name="kondisi_pekerjaan[]" id="kondisi_pekerjaan[]" class="form-control" required>
                                            <option value="Bersekolah">Bersekolah</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            <option value="Sedang Mencari Pekerjaan">Sedang Mencari Pekerjaan</option>
                                            <option value="Bekerja">Bekerja</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="varchar">Pekerjaan Utama <?php echo form_error('pekerjaan_utama') ?></label>
                                        <select name="pekerjaan_utama[]" id="pekerjaan_utama[]" class="form-control" required>
                                            <option value="Petani Pemilik Lahan">Petani Pemilik Lahan</option>
                                            <option value="Petani Penyewa">Petani Penyewa</option>
                                            <option value="Buruh Tani">Buruh Tani</option>
                                            <option value="Nelayan Pemilik Kapal / Perahu">Nelayan Pemilik Kapal / Perahu</option>
                                            <option value="Nelayan Penyewa Perahu / Kapal">Nelayan Penyewa Perahu / Kapal</option>
                                            <option value="Buruh Nelayan">Buruh Nelayan</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Guru Agama">Guru Agama</option>
                                            <option value="Pedagang">Pedagang</option>
                                            <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                            <option value="PNS">PNS</option>
                                            <option value="TNI/POLRI">TNI/POLRI</option>
                                            <option value="Perangkat Desa">Perangkat Desa</option>
                                            <option value="Pegawai Kantor Desa">Pegawai Kantor Desa</option>
                                            <option value="TKI">TKI</option>
                                            <option value="Pensiunan">Pensiunan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Penghasilan <?php echo form_error('penghasilan') ?></label>
                                <input type="text" class="form-control" name="penghasilan[]" id="penghasilan[]" placeholder="Penghasilan" value="<?php echo $penghasilan; ?>" required/>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="varchar">Jamsostek <?php echo form_error('jamsostek') ?></label>
                                        <select name="jamsostek[]" id="jamsostek[]" class="form-control" required>
                                            <option value="Peserta">Peserta</option>
                                            <option value="Bukan Peserta">Bukan Peserta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="varchar">Jamsoskes <?php echo form_error('jamsoskes') ?></label>
                                        <select name="jamsoskes[]" id="jamsoskes[]" class="form-control" required>
                                            <option value="Peserta">Peserta</option>
                                            <option value="Bukan Peserta">Bukan Peserta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar">RT <?php echo form_error('rt') ?></label>
                                <select name="rt[]" id="rt[]" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Status Keluarga <?php echo form_error('status_keluarga') ?></label>
                                <select name="status_keluarga[]" id="status_keluarga[]" class="form-control" required>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                </select>
                            </div>
                            <button class="btn btn-success btnaddform" type="button"><i class="fa fa-plus"></i> Tambah Form </button>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0" style="padding-top: 0px;">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Kondisi Keluarga
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="varchar">Tempat Tinggal <?php echo form_error('tempat_tinggal') ?></label>
                                <select name="tempat_tinggal" id="tempat_tinggal" class="form-control" required>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Kontrak/Sewa">Kontrak/Sewa</option>
                                    <option value="Bebas Sewa">Bebas Sewa</option>
                                    <option value="Dipinjami">Dipinjami</option>
                                    <option value="Dinas">Dinas</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Status Lahan <?php echo form_error('status_lahan') ?></label>
                                <select name="status_lahan" id="status_lahan" class="form-control" required>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Milik Orang Lain">Milik Orang Lain</option>
                                    <option value="Tanah Negara">Tanah Negara</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Luas Lantai <?php echo form_error('luas_lantai') ?></label>
                                <input type="text" class="form-control" name="luas_lantai" id="luas_lantai" placeholder="Luas Lantai" value="<?php echo $luas_lantai; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Luas Lahan <?php echo form_error('luas_lahan') ?></label>
                                <input type="text" class="form-control" name="luas_lahan" id="luas_lahan" placeholder="Luas Lahan" value="<?php echo $luas_lahan; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Jenis Lantai <?php echo form_error('jenis_lantai') ?></label>
                                <select name="jenis_lantai" id="jenis_lantai" class="form-control" required>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan Kualitas Tinggi">Kayu/Papan Kualitas Tinggi</option>
                                    <option value="Semen/Bata Merah">Semen/Bata Merah</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan Kualitas Rendah">Kayu/Papan Kualitas Rendah</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Dinding <?php echo form_error('dinding') ?></label>
                                <select name="dinding" id="dinding" class="form-control" required>
                                    <option value="Semen/Beton/Kayu Berkualitas Tinggi">Semen/Beton/Kayu Berkualitas Tinggi</option>
                                    <option value="Kayu Berkualitas Rendah/Bambu">Kayu Berkualitas Rendah/Bambu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Jendela <?php echo form_error('jendela') ?></label>
                                <select name="jendela" id="jendela" class="form-control" required>
                                    <option value="Ada, Berfungsi">Ada, Berfungsi</option>
                                    <option value="Ada, Tidak Berfungsi">Ada, Tidak Berfungsi</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Atap <?php echo form_error('genteng') ?></label>
                                <select name="genteng" id="genteng" class="form-control" required>
                                    <option value="Genteng">Genteng</option>
                                    <option value="Kayu/Jerami">Kayu/Jerami</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Penerangan <?php echo form_error('penerangan') ?></label>
                                <select name="penerangan" id="penerangan" class="form-control" required>
                                    <option value="Listrik PLN">Listrik PLN</option>
                                    <option value="Listrik non PLN">Listrik non PLN</option>
                                    <option value="Lampu Minyak/Lilin">Lampu Minyak/Lilin</option>
                                    <option value="Sumber Penerangan Lainnya">Sumber Penerangan Lainnya</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Energi Memasak <?php echo form_error('energi_memasak') ?></label>
                                <select name="energi_memasak" id="energi_memasak" class="form-control" required>
                                    <option value="Gas Kota/LPG/Biogas">Gas Kota/LPG/Biogas</option>
                                    <option value="Minyak Tanah/Batu Bara">Minyak Tanah/Batu Bara</option>
                                    <option value="Kayu Bakar">Kayu Bakar</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">TPS <?php echo form_error('tps') ?></label>
                                <select name="tps" id="tps" class="form-control" required>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                    <option value="Di Kebun/Sungai/Drainase">Di Kebun/Sungai/Drainase</option>
                                    <option value="Dibakar">Dibakar</option>
                                    <option value="Tempat Sampah">Tempat Sampah</option>
                                    <option value="Tempat Sampah Diangkut Reguler">Tempat Sampah Diangkut Reguler</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">MCK <?php echo form_error('mck') ?></label>
                                <select name="mck" id="mck" class="form-control" required>
                                    <option value="Sendiri">Sendiri</option>
                                    <option value="Berkelompok/Tetangga">Berkelompok/Tetangga</option>
                                    <option value="MCK Umum">MCK Umum</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Sumber Air Mandi <?php echo form_error('sumber_airmandi') ?></label>
                                <select name="sumber_airmandi" id="sumber_airmandi" class="form-control" required>
                                    <option value="Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan">Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan</option>
                                    <option value="Perpipaan">Perpipaan</option>
                                    <option value="Mata Air/Sumur">Mata Air/Sumur</option>
                                    <option value="Sungai, Danau, Embung">Sungai, Danau, Embung</option>
                                    <option value="Tadah Air Hujan">Tadah Air Hujan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Fasilitas BAB <?php echo form_error('fasilitas_bab') ?></label>
                                <select name="fasilitas_bab" id="fasilitas_bab" class="form-control" required>
                                    <option value="Jamban Sendiri">Jamban Sendiri</option>
                                    <option value="Jamban Bersama/Tetangga">Jamban Bersama/Tetangga</option>
                                    <option value="Jamban Umum">Jamban Umum</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Sumber Air Minum <?php echo form_error('sumber_airminum') ?></label>
                                <select name="sumber_airminum" id="sumber_airminum" class="form-control" required>
                                    <option value="Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan">Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan</option>
                                    <option value="Mata Air/Perpipaan/Sumur">Mata Air/Perpipaan/Sumur</option>
                                    <option value="Sungai, Danau, Embung">Sungai, Danau, Embung</option>
                                    <option value="Tadah Air Hujan">Tadah Air Hujan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Pembuangan Limbah <?php echo form_error('pembuangan_limbah') ?></label>
                                <select name="pembuangan_limbah" id="pembuangan_limbah" class="form-control" required>
                                    <option value="Tangki/Instalasi Pengelolaan Limbah">Tangki/Instalasi Pengelolaan Limbah</option>
                                    <option value="Sawah/Kolam/Sungai/Drainase/Laut">Sawah/Kolam/Sungai/Drainase/Laut</option>
                                    <option value="Lubang di Tanah">Lubang di Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Bawah Sutet <?php echo form_error('bawah_sutet') ?></label>
                                <select name="bawah_sutet" id="bawah_sutet" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Bantaran Sungai <?php echo form_error('bantaran_sungai') ?></label>
                                <select name="bantaran_sungai" id="bantaran_sungai" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Lereng/Jurang <?php echo form_error('lerang') ?></label>
                                <select name="lerang" id="lerang" class="form-control" required>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Kondisi Rumah <?php echo form_error('kondisi_rumah') ?></label>
                                <select name="kondisi_rumah" id="kondisi_rumah" class="form-control" required>
                                    <option value="Kumuh">Kumuh</option>
                                    <option value="Tidak Kumuh">Tidak Kumuh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 20px;"></div>
            <input type="hidden" name="id_data_warga" value="<?php echo $id_data_warga; ?>" /> 
            <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')">Tambah Data</button> 
            <a href="<?php echo site_url('data_warga') ?>" class="btn btn-default">Cancel</a>
        </div>
    </form>
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
                    <a href="<?= base_url('data_warga') ?>" style="color: rgb(255,255,255);">
                        <i class="fa fa-users" style="padding: 0;font-size: 26px;width: 100%;"></i>
                        <p style="margin-bottom: 0;">DATA WARGA</p>
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