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
            <div style="text-align: left;">
                <div class="row">
                    <div class="col-4 col-sm-2 col-md-2">
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ModalEdit-Data<?= $profile->nik?>">Edit Data</button>
                    </div>
                    <div class="col-4 col-sm-2 col-md-2">
                        <form action="<?= site_url('data_warga/delete_warga/'.$profile->nik) ?>" method="post">
                            <input type="hidden" name="no_kk" value="<?=$profile->no_kk; ?>">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus Data</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalEdit-Data<?= $profile->nik?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data <?php echo $profile->nama_lengkap; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('data_warga/update_data/'.$profile->nik) ?>" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="int">No KK</label>
                                                            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No KK" value="<?php echo $profile->no_kk; ?>" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="int">NIK</label>
                                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $profile->nik; ?>" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $profile->nama_lengkap; ?>" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="char">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                                        <option value="L" <?php if ($profile->jenis_kelamin == 'L') { echo 'selected'; } ?>>Laki-laki</option>
                                                        <option value="P" <?php if ($profile->jenis_kelamin == 'P') { echo 'selected'; } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $profile->tempat_lahir; ?>" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $profile->tanggal_lahir; ?>" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Status Perkawinan</label>
                                                    <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                                                        <option value="Belum Kawin" <?php if ($profile->status_perkawinan == 'Belum Kawin') { echo 'selected'; } ?>>Belum Kawin</option>
                                                        <option value="Kawin" <?php if ($profile->status_perkawinan == 'Kawin') { echo 'selected'; } ?>>Kawin</option>
                                                        <option value="Cerai Hidup" <?php if ($profile->status_perkawinan == 'Cerai Hidup') { echo 'selected'; } ?>>Cerai Hidup</option>
                                                        <option value="Cerai Mati" <?php if ($profile->status_perkawinan == 'Cerai Mati') { echo 'selected'; } ?>>Cerai Mati</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Agama</label>
                                                    <select name="agama" id="agama" class="form-control" required>
                                                        <option value="Islam" <?php if ($profile->agama == 'Islam') { echo 'selected'; } ?>>Islam</option>
                                                        <option value="Hindu" <?php if ($profile->agama == 'Hindu') { echo 'selected'; } ?>>Hindu</option>
                                                        <option value="Kristen Khatolik" <?php if ($profile->agama == 'Kristen Khatolik') { echo 'selected'; } ?>>Kristen Khatolik</option>
                                                        <option value="Budha" <?php if ($profile->agama == 'Budha') { echo 'selected'; } ?>>Budha</option>
                                                        <option value="Konghucu" <?php if ($profile->agama == 'Konghucu') { echo 'selected'; } ?>>Konghucu</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Warganegara</label>
                                                    <select name="warganegara" id="warganegara" class="form-control" required>
                                                        <option value="WNI" <?php if ($profile->warganegara == 'WNI') { echo 'selected'; } ?>>Warga Negara Indonesia</option>
                                                        <option value="WNA" <?php if ($profile->warganegara == 'WNA') { echo 'selected'; } ?>>Warga Negara Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="varchar">Pendidikan</label>
                                                    <select name="pendidikan" id="pendidikan" class="form-control" required>
                                                        <option value="Tidak Sekolah" <?php if ($profile->pendidikan == 'Tidak Sekolah') { echo 'selected'; } ?>>Tidak Sekolah</option>
                                                        <option value="SD dan Sederajat" <?php if ($profile->pendidikan == 'SD dan Sederajat') { echo 'selected'; } ?>>SD dan Sederajat</option>
                                                        <option value="SMP dan Sederajat" <?php if ($profile->pendidikan == 'SMP dan Sederajat') { echo 'selected'; } ?>>SMP dan Sederajat</option>
                                                        <option value="SMA dan Sederajat" <?php if ($profile->pendidikan == 'SMA dan Sederajat') { echo 'selected'; } ?>>SMA dan Sederajat</option>
                                                        <option value="Diploma 1-3" <?php if ($profile->pendidikan == 'Diploma 1-3') { echo 'selected'; } ?>>Diploma 1-3</option>
                                                        <option value="S1 dan Sederajat" <?php if ($profile->pendidikan == 'S1 dan Sederajat') { echo 'selected'; } ?>>S1 dan Sederajat</option>
                                                        <option value="S2 dan Sederajat" <?php if ($profile->pendidikan == 'S2 dan Sederajat') { echo 'selected'; } ?>>S2 dan Sederajat</option>
                                                        <option value="S3 dan Sederajat" <?php if ($profile->pendidikan == 'S3 dan Sederajat') { echo 'selected'; } ?>>S3 dan Sederajat</option>
                                                        <option value="Pesantren, Seminari, Wihara dan Sejenisnya" <?php if ($profile->pendidikan == 'Pesantren, Seminari, Wihara dan Sejenisnya') { echo 'selected'; } ?>>Pesantren, Seminari, Wihara dan Sejenisnya</option>
                                                        <option value="Lainnya" <?php if ($profile->pendidikan == 'Lainnya') { echo 'selected'; } ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Kondisi Pekerjaan</label>
                                                    <select name="kondisi_pekerjaan" id="kondisi_pekerjaan" class="form-control" required>
                                                        <option value="Bersekolah" <?php if ($profile->kondisi_pekerjaan == 'Bersekolah') { echo 'selected'; } ?>>Bersekolah</option>
                                                        <option value="Ibu Rumah Tangga" <?php if ($profile->kondisi_pekerjaan == 'Ibu Rumah Tangga') { echo 'selected'; } ?>>Ibu Rumah Tangga</option>
                                                        <option value="Tidak Bekerja" <?php if ($profile->kondisi_pekerjaan == 'Tidak Bekerja') { echo 'selected'; } ?>>Tidak Bekerja</option>
                                                        <option value="Sedang Mencari Pekerjaan" <?php if ($profile->kondisi_pekerjaan == 'Sedang Mencari Pekerjaan') { echo 'selected'; } ?>>Sedang Mencari Pekerjaan</option>
                                                        <option value="Bekerja" <?php if ($profile->kondisi_pekerjaan == 'Bekerja') { echo 'selected'; } ?>>Bekerja</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Pekerjaan Utama</label>
                                                    <select name="pekerjaan_utama" id="pekerjaan_utama" class="form-control" required>
                                                        <option value="Petani Pemilik Lahan" <?php if ($profile->pekerjaan_utama == 'Petani Pemilik Lahan') { echo 'selected'; } ?>>Petani Pemilik Lahan</option>
                                                        <option value="Petani Penyewa" <?php if ($profile->pekerjaan_utama == 'Petani Penyewa') { echo 'selected'; } ?>>Petani Penyewa</option>
                                                        <option value="Buruh Tani" <?php if ($profile->pekerjaan_utama == 'Buruh Tani') { echo 'selected'; } ?>>Buruh Tani</option>
                                                        <option value="Nelayan Pemilik Kapal / Perahu" <?php if ($profile->pekerjaan_utama == 'Nelayan Pemilik Kapal / Perahu') { echo 'selected'; } ?>>Nelayan Pemilik Kapal / Perahu</option>
                                                        <option value="Nelayan Penyewa Perahu / Kapal" <?php if ($profile->pekerjaan_utama == 'Nelayan Penyewa Perahu / Kapal') { echo 'selected'; } ?>>Nelayan Penyewa Perahu / Kapal</option>
                                                        <option value="Buruh Nelayan" <?php if ($profile->pekerjaan_utama == 'Buruh Nelayan') { echo 'selected'; } ?>>Buruh Nelayan</option>
                                                        <option value="Guru" <?php if ($profile->pekerjaan_utama == 'Guru') { echo 'selected'; } ?>>Guru</option>
                                                        <option value="Guru Agama" <?php if ($profile->pekerjaan_utama == 'Guru Agama') { echo 'selected'; } ?>>Guru Agama</option>
                                                        <option value="Pedagang" <?php if ($profile->pekerjaan_utama == 'Pedagang') { echo 'selected'; } ?>>Pedagang</option>
                                                        <option value="Pengolahan/Industri" <?php if ($profile->pekerjaan_utama == 'Pengolahan/Industri') { echo 'selected'; } ?>>Pengolahan/Industri</option>
                                                        <option value="PNS" <?php if ($profile->pekerjaan_utama == 'PNS') { echo 'selected'; } ?>>PNS</option>
                                                        <option value="TNI/POLRI" <?php if ($profile->pekerjaan_utama == 'TNI/POLRI') { echo 'selected'; } ?>>TNI/POLRI</option>
                                                        <option value="Perangkat Desa" <?php if ($profile->pekerjaan_utama == 'Perangkat Desa') { echo 'selected'; } ?>>Perangkat Desa</option>
                                                        <option value="Pegawai Kantor Desa" <?php if ($profile->pekerjaan_utama == 'Pegawai Kantor Desa') { echo 'selected'; } ?>>Pegawai Kantor Desa</option>
                                                        <option value="TKI" <?php if ($profile->pekerjaan_utama == 'TKI') { echo 'selected'; } ?>>TKI</option>
                                                        <option value="Pensiunan" <?php if ($profile->pekerjaan_utama == 'Pensiunan') { echo 'selected'; } ?>>Pensiunan</option>
                                                        <option value="Lainnya" <?php if ($profile->pekerjaan_utama == 'Lainnya') { echo 'selected'; } ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Penghasilan</label>
                                                    <input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="Penghasilan" value="<?php echo $profile->penghasilan; ?>" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Jamsostek</label>
                                                    <select name="jamsostek" id="jamsostek" class="form-control" required>
                                                        <option value="Peserta" <?php if ($profile->jamsostek == 'Peserta') { echo 'selected'; } ?>>Peserta</option>
                                                        <option value="Bukan Peserta" <?php if ($profile->jamsostek == 'Bukan Peserta') { echo 'selected'; } ?>>Bukan Peserta</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Jamsoskes</label>
                                                    <select name="jamsoskes" id="jamsoskes" class="form-control" required>
                                                        <option value="Peserta" <?php if ($profile->jamsoskes == 'Peserta') { echo 'selected'; } ?>>Peserta</option>
                                                        <option value="Bukan Peserta" <?php if ($profile->jamsoskes == 'Bukan Peserta') { echo 'selected'; } ?>>Bukan Peserta</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">RT</label>
                                                    <select name="rt" id="rt" class="form-control" required>
                                                        <option value="1" <?php if ($profile->rt == '1') { echo 'selected'; } ?>>1</option>
                                                        <option value="2" <?php if ($profile->rt == '2') { echo 'selected'; } ?>>2</option>
                                                        <option value="3" <?php if ($profile->rt == '3') { echo 'selected'; } ?>>3</option>
                                                        <option value="4" <?php if ($profile->rt == '4') { echo 'selected'; } ?>>4</option>
                                                        <option value="5" <?php if ($profile->rt == '5') { echo 'selected'; } ?>>5</option>
                                                        <option value="6" <?php if ($profile->rt == '6') { echo 'selected'; } ?>>6</option>
                                                        <option value="7" <?php if ($profile->rt == '7') { echo 'selected'; } ?>>7</option>
                                                        <option value="8" <?php if ($profile->rt == '8') { echo 'selected'; } ?>>8</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="varchar">Status Keluarga</label>
                                                    <select name="status_keluarga" id="status_keluarga" class="form-control" required>
                                                        <option value="Kepala Keluarga" <?php if ($profile->status_keluarga == 'Kepala Keluarga') { echo 'selected'; } ?>>Kepala Keluarga</option>
                                                        <option value="Istri" <?php if ($profile->status_keluarga == 'Istri') { echo 'selected'; } ?>>Istri</option>
                                                        <option value="Anak" <?php if ($profile->status_keluarga == 'Anak') { echo 'selected'; } ?>>Anak</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php } ?>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4" style="text-align: left;">
                <strong>No KK : <?= $profile->no_kk; ?></strong>
            </div>
            <div class="col-4">
                <?php
                $this->db->where('no_kk', $profile->no_kk);
                $desk = $this->db->get('desk_keluarga')->row();
                ?>
                <div style="text-align: center;">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalDetail-<?=$profile->no_kk?>">Edit Detail</button>
                </div>
                <div class="modal fade" id="ModalDetail-<?=$profile->no_kk?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Detail Deskripsi Keluarga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('data_warga/update_detail/'.$desk->no_kk) ?>" method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>No KK</label>
                                                                <input type="text" name="no_kk" id="no_kk" class="form-control" readonly value="<?= $profile->no_kk ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Tempat Tinggal</label>
                                                        <select name="tempat_tinggal" id="tempat_tinggal" class="form-control" required>
                                                            <option value="Milik Sendiri" <?php if($desk->tempat_tinggal == 'Milik Sendiri') {echo 'selected';} ?>>Milik Sendiri</option>
                                                            <option value="Kontrak/Sewa" <?php if($desk->tempat_tinggal == 'Kontrak/Sewa') {echo 'selected';} ?>>Kontrak/Sewa</option>
                                                            <option value="Bebas Sewa" <?php if($desk->tempat_tinggal == 'Bebas Sewa') {echo 'selected';} ?>>Bebas Sewa</option>
                                                            <option value="Dipinjami" <?php if($desk->tempat_tinggal == 'Dipinjami') {echo 'selected';} ?>>Dipinjami</option>
                                                            <option value="Dinas" <?php if($desk->tempat_tinggal == 'Dinas') {echo 'selected';} ?>>Dinas</option>
                                                            <option value="Lainnya" <?php if($desk->tempat_tinggal == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Status Lahan</label>
                                                        <select name="status_lahan" id="status_lahan" class="form-control" required>
                                                            <option value="Milik Sendiri" <?php if($desk->status_lahan == 'Milik Sendiri') {echo 'selected';} ?>>Milik Sendiri</option>
                                                            <option value="Milik Orang Lain" <?php if($desk->status_lahan == 'Milik Orang Lain') {echo 'selected';} ?>>Milik Orang Lain</option>
                                                            <option value="Tanah Negara" <?php if($desk->status_lahan == 'Tanah Negara') {echo 'selected';} ?>>Tanah Negara</option>
                                                            <option value="Lainnya" <?php if($desk->status_lahan == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Luas Lantai</label>
                                                        <input type="text" class="form-control" name="luas_lantai" id="luas_lantai" placeholder="Luas Lantai" value="<?php echo $desk->luas_lantai; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Luas Lahan</label>
                                                        <input type="text" class="form-control" name="luas_lahan" id="luas_lahan" placeholder="Luas Lahan" value="<?php echo $desk->luas_lahan; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Jenis Lantai</label>
                                                        <select name="jenis_lantai" id="jenis_lantai" class="form-control" required>
                                                            <option value="Marmer/Granit" <?php if($desk->jenis_lantai == 'Marmer/Granit') {echo 'selected';} ?>>Marmer/Granit</option>
                                                            <option value="Keramik" <?php if($desk->jenis_lantai == 'Keramik') {echo 'selected';} ?>>Keramik</option>
                                                            <option value="Parket/Vinil/Permadani" <?php if($desk->jenis_lantai == 'Parket/Vinil/Permadani') {echo 'selected';} ?>>Parket/Vinil/Permadani</option>
                                                            <option value="Ubin/Tegel/Teraso" <?php if($desk->jenis_lantai == 'Ubin/Tegel/Teraso') {echo 'selected';} ?>>Ubin/Tegel/Teraso</option>
                                                            <option value="Kayu/Papan Kualitas Tinggi" <?php if($desk->jenis_lantai == 'Kayu/Papan Kualitas Tinggi') {echo 'selected';} ?>>Kayu/Papan Kualitas Tinggi</option>
                                                            <option value="Semen/Bata Merah" <?php if($desk->jenis_lantai == 'Semen/Bata Merah') {echo 'selected';} ?>>Semen/Bata Merah</option>
                                                            <option value="Bambu" <?php if($desk->jenis_lantai == 'Bambu') {echo 'selected';} ?>>Bambu</option>
                                                            <option value="Kayu/Papan Kualitas Rendah" <?php if($desk->jenis_lantai == 'Kayu/Papan Kualitas Rendah') {echo 'selected';} ?>>Kayu/Papan Kualitas Rendah</option>
                                                            <option value="Lainnya" <?php if($desk->jenis_lantai == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Dinding</label>
                                                        <select name="dinding" id="dinding" class="form-control" required>
                                                            <option value="Semen/Beton/Kayu Berkualitas Tinggi" <?php if($desk->dinding == 'Semen/Beton/Kayu Berkualitas Tinggi') {echo 'selected';} ?>>Semen/Beton/Kayu Berkualitas Tinggi</option>
                                                            <option value="Kayu Berkualitas Rendah/Bambu" <?php if($desk->dinding == 'Kayu Berkualitas Rendah/Bambu') {echo 'selected';} ?>>Kayu Berkualitas Rendah/Bambu</option>
                                                            <option value="Lainnya" <?php if($desk->dinding == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Jendela</label>
                                                        <select name="jendela" id="jendela" class="form-control" required>
                                                            <option value="Ada, Berfungsi" <?php if($desk->jendela == 'Ada, Berfungsi') {echo 'selected';} ?>>Ada, Berfungsi</option>
                                                            <option value="Ada, Tidak Berfungsi" <?php if($desk->jendela == 'Ada, Tidak Berfungsi') {echo 'selected';} ?>>Ada, Tidak Berfungsi</option>
                                                            <option value="Tidak Ada" <?php if($desk->jendela == 'Tidak Ada') {echo 'selected';} ?>>Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Atap</label>
                                                        <select name="genteng" id="genteng" class="form-control" required>
                                                            <option value="Genteng" <?php if($desk->genteng == 'Genteng') {echo 'selected';} ?>>Genteng</option>
                                                            <option value="Kayu/Jerami" <?php if($desk->genteng == 'Kayu/Jerami') {echo 'selected';} ?>>Kayu/Jerami</option>
                                                            <option value="Lainnya" <?php if($desk->genteng == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Penerangan</label>
                                                        <select name="penerangan" id="penerangan" class="form-control" required>
                                                            <option value="Listrik PLN" <?php if($desk->penerangan == 'Listrik PLN') {echo 'selected';} ?>>Listrik PLN</option>
                                                            <option value="Listrik non PLN" <?php if($desk->penerangan == 'Listrik non PLN') {echo 'selected';} ?>>Listrik non PLN</option>
                                                            <option value="Lampu Minyak/Lilin" <?php if($desk->penerangan == 'Lampu Minyak/Lilin') {echo 'selected';} ?>>Lampu Minyak/Lilin</option>
                                                            <option value="Sumber Penerangan Lainnya" <?php if($desk->penerangan == 'Sumber Penerangan Lainnya') {echo 'selected';} ?>>Sumber Penerangan Lainnya</option>
                                                            <option value="Tidak Ada" <?php if($desk->penerangan == 'Tidak Ada') {echo 'selected';} ?>>Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Energi Memasak</label>
                                                        <select name="energi_memasak" id="energi_memasak" class="form-control" required>
                                                            <option value="Gas Kota/LPG/Biogas" <?php if($desk->energi_memasak == 'Gas Kota/LPG/Biogas') {echo 'selected';} ?>>Gas Kota/LPG/Biogas</option>
                                                            <option value="Minyak Tanah/Batu Bara" <?php if($desk->energi_memasak == 'Minyak Tanah/Batu Bara') {echo 'selected';} ?>>Minyak Tanah/Batu Bara</option>
                                                            <option value="Kayu Bakar" <?php if($desk->energi_memasak == 'Kayu Bakar') {echo 'selected';} ?>>Kayu Bakar</option>
                                                            <option value="Lainnya" <?php if($desk->energi_memasak == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="varchar">TPS</label>
                                                        <select name="tps" id="tps" class="form-control" required>
                                                            <option value="Tidak Ada" <?php if($desk->tps == 'Tidak Ada') {echo 'selected';} ?>>Tidak Ada</option>
                                                            <option value="Di Kebun/Sungai/Drainase" <?php if($desk->tps == 'Di Kebun/Sungai/Drainase') {echo 'selected';} ?>>Di Kebun/Sungai/Drainase</option>
                                                            <option value="Dibakar" <?php if($desk->tps == 'Dibakar') {echo 'selected';} ?>>Dibakar</option>
                                                            <option value="Tempat Sampah" <?php if($desk->tps == 'Tempat Sampah') {echo 'selected';} ?>>Tempat Sampah</option>
                                                            <option value="Tempat Sampah Diangkut Reguler" <?php if($desk->tps == 'Tempat Sampah Diangkut Reguler') {echo 'selected';} ?>>Tempat Sampah Diangkut Reguler</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">MCK</label>
                                                        <select name="mck" id="mck" class="form-control" required>
                                                            <option value="Sendiri" <?php if($desk->mck == 'Sendiri') {echo 'selected';} ?>>Sendiri</option>
                                                            <option value="Berkelompok/Tetangga" <?php if($desk->mck == 'Berkelompok/Tetangga') {echo 'selected';} ?>>Berkelompok/Tetangga</option>
                                                            <option value="MCK Umum" <?php if($desk->mck == 'MCK Umum') {echo 'selected';} ?>>MCK Umum</option>
                                                            <option value="Tidak Ada" <?php if($desk->mck == 'Tidak Ada') {echo 'selected';} ?>>Tidak Ada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Sumber Air Mandi</label>
                                                        <select name="sumber_airmandi" id="sumber_airmandi" class="form-control" required>
                                                            <option value="Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan" <?php if($desk->sumber_airmandi == 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan') {echo 'selected';} ?>>Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan</option>
                                                            <option value="Perpipaan" <?php if($desk->sumber_airmandi == 'Perpipaan') {echo 'selected';} ?>>Perpipaan</option>
                                                            <option value="Mata Air/Sumur" <?php if($desk->sumber_airmandi == 'Mata Air/Sumur') {echo 'selected';} ?>>Mata Air/Sumur</option>
                                                            <option value="Sungai, Danau, Embung" <?php if($desk->sumber_airmandi == 'Sungai, Danau, Embung') {echo 'selected';} ?>>Sungai, Danau, Embung</option>
                                                            <option value="Tadah Air Hujan" <?php if($desk->sumber_airmandi == 'Tadah Air Hujan') {echo 'selected';} ?>>Tadah Air Hujan</option>
                                                            <option value="Lainnya" <?php if($desk->sumber_airmandi == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Fasilitas BAB</label>
                                                        <select name="fasilitas_bab" id="fasilitas_bab" class="form-control" required>
                                                            <option value="Jamban Sendiri" <?php if($desk->fasilitas_bab == 'Jamban Sendiri') {echo 'selected';} ?>>Jamban Sendiri</option>
                                                            <option value="Jamban Bersama/Tetangga" <?php if($desk->fasilitas_bab == 'Jamban Bersama/Tetangga') {echo 'selected';} ?>>Jamban Bersama/Tetangga</option>
                                                            <option value="Jamban Umum" <?php if($desk->fasilitas_bab == 'Jamban Umum') {echo 'selected';} ?>>Jamban Umum</option>
                                                            <option value="Lainnya" <?php if($desk->fasilitas_bab == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Sumber Air Minum</label>
                                                        <select name="sumber_airminum" id="sumber_airminum" class="form-control" required>
                                                            <option value="Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan" <?php if($desk->sumber_airminum == 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan') {echo 'selected';} ?>>Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan</option>
                                                            <option value="Mata Air/Perpipaan/Sumur" <?php if($desk->sumber_airminum == 'Mata Air/Perpipaan/Sumur') {echo 'selected';} ?>>Mata Air/Perpipaan/Sumur</option>
                                                            <option value="Sungai, Danau, Embung" <?php if($desk->sumber_airminum == 'Sungai, Danau, Embung') {echo 'selected';} ?>>Sungai, Danau, Embung</option>
                                                            <option value="Tadah Air Hujan" <?php if($desk->sumber_airminum == 'Tadah Air Hujan') {echo 'selected';} ?>>Tadah Air Hujan</option>
                                                            <option value="Lainnya" <?php if($desk->sumber_airminum == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Pembuangan Limbah</label>
                                                        <select name="pembuangan_limbah" id="pembuangan_limbah" class="form-control" required>
                                                            <option value="Tangki/Instalasi Pengelolaan Limbah" <?php if($desk->pembuangan_limbah == 'Tangki/Instalasi Pengelolaan Limbah') {echo 'selected';} ?>>Tangki/Instalasi Pengelolaan Limbah</option>
                                                            <option value="Sawah/Kolam/Sungai/Drainase/Laut" <?php if($desk->pembuangan_limbah == 'Sawah/Kolam/Sungai/Drainase/Laut') {echo 'selected';} ?>>Sawah/Kolam/Sungai/Drainase/Laut</option>
                                                            <option value="Lubang di Tanah" <?php if($desk->pembuangan_limbah == 'Lubang di Tanah') {echo 'selected';} ?>>Lubang di Tanah</option>
                                                            <option value="Lainnya" <?php if($desk->pembuangan_limbah == 'Lainnya') {echo 'selected';} ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Bawah Sutet</label>
                                                        <select name="bawah_sutet" id="bawah_sutet" class="form-control" required>
                                                            <option value="Ya" <?php if($desk->bawah_sutet == 'Ya') {echo 'selected';} ?>>Ya</option>
                                                            <option value="Tidak" <?php if($desk->bawah_sutet == 'Tidak') {echo 'selected';} ?>>Tidak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Bantaran Sungai</label>
                                                        <select name="bantaran_sungai" id="bantaran_sungai" class="form-control" required>
                                                            <option value="Ya" <?php if($desk->bantaran_sungai == 'Ya') {echo 'selected';} ?>>Ya</option>
                                                            <option value="Tidak" <?php if($desk->bantaran_sungai == 'Tidak') {echo 'selected';} ?>>Tidak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Lereng/Jurang</label>
                                                        <select name="lerang" id="lerang" class="form-control" required>
                                                            <option value="Ya" <?php if($desk->lerang == 'Ya') {echo 'selected';} ?>>Ya</option>
                                                            <option value="Tidak" <?php if($desk->lerang == 'Tidak') {echo 'selected';} ?>>Tidak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Kondisi Rumah</label>
                                                        <select name="kondisi_rumah" id="kondisi_rumah" class="form-control" required>
                                                            <option value="Kumuh" <?php if($desk->kondisi_rumah == 'Kumuh') {echo 'selected';} ?>>Kumuh</option>
                                                            <option value="Tidak Kumuh" <?php if($desk->kondisi_rumah == 'Tidak Kumuh') {echo 'selected';} ?>>Tidak Kumuh</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div style="text-align: right;">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalTambah">Tambah Data</button>
                </div>
                <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('data_warga/tambah_warga') ?>" method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>No KK</label>
                                                                <input type="text" name="no_kk" id="no_kk" class="form-control" readonly value="<?= $profile->no_kk ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="int">NIK</label>
                                                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="char">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Tempat Lahir</label>
                                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="date">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Status Perkawinan</label>
                                                        <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                                                            <option value="Belum Kawin">Belum Kawin</option>
                                                            <option value="Kawin">Kawin</option>
                                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                                            <option value="Cerai Mati">Cerai Mati</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Agama</label>
                                                        <select name="agama" id="agama" class="form-control" required>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Kristen Khatolik">Kristen Khatolik</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Warganegara</label>
                                                        <select name="warganegara" id="warganegara" class="form-control" required>
                                                            <option value="WNI">Warga Negara Indonesia</option>
                                                            <option value="WNA">Warga Negara Asing</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="varchar">Pendidikan</label>
                                                        <select name="pendidikan" id="pendidikan" class="form-control" required>
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
                                                    <div class="form-group">
                                                        <label for="varchar">Kondisi Pekerjaan</label>
                                                        <select name="kondisi_pekerjaan" id="kondisi_pekerjaan" class="form-control" required>
                                                            <option value="Bersekolah">Bersekolah</option>
                                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                            <option value="Sedang Mencari Pekerjaan">Sedang Mencari Pekerjaan</option>
                                                            <option value="Bekerja">Bekerja</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Pekerjaan Utama</label>
                                                        <select name="pekerjaan_utama" id="pekerjaan_utama" class="form-control" required>
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
                                                    <div class="form-group">
                                                        <label for="varchar">Penghasilan</label>
                                                        <input type="text" class="form-control" name="penghasilan" id="penghasilan" placeholder="Penghasilan" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Jamsostek</label>
                                                        <select name="jamsostek" id="jamsostek" class="form-control" required>
                                                            <option value="Peserta">Peserta</option>
                                                            <option value="Bukan Peserta">Bukan Peserta</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">Jamsoskes</label>
                                                        <select name="jamsoskes" id="jamsoskes" class="form-control" required>
                                                            <option value="Peserta">Peserta</option>
                                                            <option value="Bukan Peserta">Bukan Peserta</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="varchar">RT</label>
                                                        <select name="rt" id="rt" class="form-control" required>
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
                                                        <label for="varchar">Status Keluarga</label>
                                                        <select name="status_keluarga" id="status_keluarga" class="form-control" required>
                                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                            <option value="Istri">Istri</option>
                                                            <option value="Anak">Anak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda yakin data sudah benar ?')">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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