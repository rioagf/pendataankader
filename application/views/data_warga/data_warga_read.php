<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background: url('../../assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
	<div class="container" style="max-width: 850px;margin-bottom: 100px;">
		<div class="intro">
			<h2 class="text-center">Detail Data</h2>
			<hr>
		</div>
		<div style="background-color: #ffffff !important; padding: 25px; overflow: auto;">
				<?php foreach ($row as $data) { ?>
			<table class="table">
				<tr>
					<td>No Kk</td>
					<td><?php echo $data->no_kk; ?></td>
				</tr>
				<tr>
					<td>Nik</td>
					<td><?php echo $data->nik; ?></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td><?php echo $data->nama_lengkap; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td><?php echo $data->jenis_kelamin; ?></td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td><?php echo $data->tempat_lahir; ?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td><?php echo $data->tanggal_lahir; ?></td>
				</tr>
				<tr>
					<td>Status Perkawinan</td>
					<td><?php echo $data->status_perkawinan; ?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td><?php echo $data->agama; ?></td>
				</tr>
				<tr>
					<td>Warganegara</td>
					<td><?php echo $data->warganegara; ?></td>
				</tr>
				<tr>
					<td>Pendidikan</td>
					<td><?php echo $data->pendidikan; ?></td>
				</tr>
				<tr>
					<td>Kondisi Pekerjaan</td>
					<td><?php echo $data->kondisi_pekerjaan; ?></td>
				</tr>
				<tr>
					<td>Pekerjaan Utama</td>
					<td><?php echo $data->pekerjaan_utama; ?></td>
				</tr>
				<tr>
					<td>Jamsostek</td>
					<td><?php echo $data->jamsostek; ?></td>
				</tr>
				<tr>
					<td>Penghasilan</td>
					<td><?php echo $data->penghasilan; ?></td>
				</tr>
				<tr>
					<td>Jamsoskes</td>
					<td><?php echo $data->jamsoskes; ?></td>
				</tr>
				<tr>
					<td>Status Keluarga</td>
					<td><?php echo $data->status_keluarga; ?></td>
				</tr>
			</table>
			<div style="padding: 25px"></div>
				<?php } ?>
			<div style="padding: 25px"></div>
				<h3>Detail Kondisi Keluarga</h3>
				<table class="table">
				<tr>
					<td>RT</td>
					<td><?php echo $data->rt; ?></td>
				</tr>
				<tr>
					<td>Tempat Tinggal</td>
					<td><?php echo $data->tempat_tinggal; ?></td>
				</tr>
				<tr>
					<td>Status Lahan</td>
					<td><?php echo $data->status_lahan; ?></td>
				</tr>
				<tr>
					<td>Luas Lantai</td>
					<td><?php echo $data->luas_lantai; ?></td>
				</tr>
				<tr>
					<td>Luas Lahan</td>
					<td><?php echo $data->luas_lahan; ?></td>
				</tr>
				<tr>
					<td>Jenis Lantai</td>
					<td><?php echo $data->jenis_lantai; ?></td>
				</tr>
				<tr>
					<td>Dinding</td>
					<td><?php echo $data->dinding; ?></td>
				</tr>
				<tr>
					<td>Jendela</td>
					<td><?php echo $data->jendela; ?></td>
				</tr>
				<tr>
					<td>Genteng</td>
					<td><?php echo $data->genteng; ?></td>
				</tr>
				<tr>
					<td>Penerangan</td>
					<td><?php echo $data->penerangan; ?></td>
				</tr>
				<tr>
					<td>Energi Memasak</td>
					<td><?php echo $data->energi_memasak; ?></td>
				</tr>
				<tr>
					<td>Tempat Pembuangan Sampah</td>
					<td><?php echo $data->tps; ?></td>
				</tr>
				<tr>
					<td>Mandi Cuci Kakus</td>
					<td><?php echo $data->mck; ?></td>
				</tr>
				<tr>
					<td>Sumber Air Mandi</td>
					<td><?php echo $data->sumber_airmandi; ?></td>
				</tr>
				<tr>
					<td>Fasilitas Bab</td>
					<td><?php echo $data->fasilitas_bab; ?></td>
				</tr>
				<tr>
					<td>Sumber Airminum</td>
					<td><?php echo $data->sumber_airminum; ?></td>
				</tr>
				<tr>
					<td>Pembuangan Limbah</td>
					<td><?php echo $data->pembuangan_limbah; ?></td>
				</tr>
				<tr>
					<td>Bawah Sutet</td>
					<td><?php echo $data->bawah_sutet; ?></td>
				</tr>
				<tr>
					<td>Bantaran Sungai</td>
					<td><?php echo $data->bantaran_sungai; ?></td>
				</tr>
				<tr>
					<td>Lereng / Jurang</td>
					<td><?php echo $data->lerang; ?></td>
				</tr>
				<tr>
					<td>Kondisi Rumah</td>
					<td><?php echo $data->kondisi_rumah; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><a href="<?php echo site_url('data_warga') ?>" class="btn btn-warning">Kembali</a></td>
				</tr>
			</table>
			</table>
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