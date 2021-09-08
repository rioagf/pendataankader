<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed " style="min-height: 100vh;background: url('../../assets/img/8.jpg'); background-size: cover; background-attachment: fixed;">
	<div class="container" style="max-width: 850px;margin-bottom: 100px;">
		<div class="intro">
			<h2 class="text-center">Detail Data</h2>
			<hr>
		</div>
		<div style="background-color: #ffffff !important; padding: 25px; overflow: auto;">
			<table class="table">
				<tr>
					<th>Jenis Surat</th>
					<td><?php echo $jenis_surat; ?></td>
				</tr>
				<tr>
					<th>Nama Pembuat Pengajuan</th>
					<td><?php echo $nama_pembuat_pengajuan; ?></td>
				</tr>
				<?php if ($jenis_surat == 'surat kematian') { ?>
					<tr>
						<th>Nama Yang Meninggal</th>
						<td><?php echo $nama_yang_meninggal; ?></td>
					</tr>
					<tr>
						<th>Tanggal Kematian</th>
						<td><?php echo date("d F Y", strtotime($tanggal_kematian)); ?></td>
					</tr>
					<tr>
						<th>Faktor Kematian</th>
						<td><?php echo $faktor_kematian; ?></td>
					</tr>
				<?php } else if ($jenis_surat == 'surat dispensasi') {  ?>
					<tr>
						<th>Tanggal Dispensasi</th>
						<td><?php echo date("d F Y", strtotime($tanggal_dispensasi)); ?></td>
					</tr>
					<tr>
						<th>Sampai Tanggal Dispensasi</th>
						<td><?php echo date("d F Y", strtotime($sampai_tanggal_dispensasi)); ?></td>
					</tr>
					<tr>
						<th>Jumlah Hari</th>
						<td><?php echo $jumlah_hari; ?></td>
					</tr>
					<tr>
						<th>Alasan Dispen</th>
						<td><?php echo $alasan_dispen; ?></td>
					</tr>
				<?php } ?>
				<tr>
					<th>Domisili</th>
					<td>RT <?php echo $rt_domisili; ?></td>
				</tr>
				<tr>
					<th>Tanggal Pengajuan</th>
					<td><?php echo date("d F Y", strtotime($date_created)); ?></td>
				</tr>
				<tr>
					<th></th>
					<td><a href="<?php echo site_url('pengajuan_surat') ?>" class="btn btn-warning btn-sm">Kembali</a></td>
				</tr>
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
					<a href="<?= base_url('pengajuan_surat') ?>" style="color: rgb(255,255,255);">
						<i class="fa fa-file" style="padding: 0;font-size: 26px;width: 100%;"></i>
						<p style="margin-bottom: 0;">DATA PENGAJUAN</p>
					</a>
				</div>
				<div class="col text-center" style="width: 33.3333%;">
					<a href="<?= base_url('pengajuan_surat') ?>" onclick="return confirm('Anda yakin mau Keluar ?')" style="color: rgb(255,255,255);">
						<i class="fa fa-sign-out" style="padding: 0;font-size: 26px;width: 100%;"></i>
						<p style="margin-bottom: 0;">LOGOUT</p>
					</a>
				</div>
			</div>
		</section>
	</div>
</nav>