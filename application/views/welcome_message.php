<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center features-boxed" style="min-height: 100vh;background: url(&quot;assets/img/8.jpg&quot;);background-size: cover; padding: 75px;">
	<?php
	// Count Pengajuan Baru
	$this->db->where('status_pengajuan', 'Pengajuan Baru');
	$this->db->from('pengajuan_surat');
	$pengajuan_baru = $this->db->count_all_results();

	// Count Keluhan Baru
	$this->db->where('status_keluhan', 'Keluhan Baru');
	$this->db->from('data_keluhan_warga');
	$keluhan_baru = $this->db->count_all_results();
	?>
	<div class="container" style="max-width: 850px;">
		<?php 
		if($this->session->flashdata('error') !='')
		{
			echo '<div class="alert alert-danger" role="alert">';
			echo $this->session->flashdata('error');
			echo '</div>';
		} else if($this->session->flashdata('message') != '') {
			echo '<div class="alert alert-success" role="success">';
			echo $this->session->flashdata('message');
			echo '</div>';
		}
		?>
		<div class="intro">
			<h2 class="text-center">Welcome to Sistem Pendataan Penduduk RW 01 Bojongpeuteuy</h2>
			<hr>
		</div>
		<div class="row">
			<?php if ($this->session->userdata('role') == 'rw' || $this->session->userdata('role') == 'rt' || $this->session->userdata('role') == 'kader' ) { ?>
				<div class="col-md-3" style="padding: 5px;text-align: center;border-style: none;width: 50%;">
					<a href="<?= base_url('data_warga') ?>">
						<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/population-system.png">
							<h5 style="font-size: 14px;">Data Warga</h5>
						</div>
					</a>
				</div>
				<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
					<a href="<?= base_url('laporan_data_warga') ?>">
						<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/official-documents.png">
							<h5 style="font-size: 14px;">Lapor Data Warga</h5>
						</div>
					</a>
				</div>
				<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
					<a href="<?= base_url('penerima_bantuan') ?>">
						<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/contract.png">
							<h5 style="font-size: 14px;">Lapor Penerima Bantuan</h5>
						</div>
					</a>
				</div>
			<?php } ?>

			<?php if ($this->session->userdata('role') != 'administrator' ): ?>
				<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
					<a href="<?= base_url('data_keluhan_warga') ?>">
						<?php if ($this->session->userdata('role') == 'rw' || $this->session->userdata('role') == 'rt') { ?>
							<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/review.png">
								<div style="background: green; color: #ffffff; padding: 5px 10px; position: absolute; top: 20px; right: 20px;"><?= $keluhan_baru; ?></div>
								<h5 style="font-size: 14px;">Lapor Keluhan</h5>
							</div>
						<?php } else { ?>
							<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/review.png">
								<h5 style="font-size: 14px;">Lapor Keluhan</h5>
							</div>
						<?php } ?>
					</a>
				</div>
				<?php if ($this->session->userdata('role') != 'kader' ) : ?>
					<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
						<a href="<?= base_url('pengajuan_surat') ?>">
							<?php if ($this->session->userdata('role') == 'rw' || $this->session->userdata('role') == 'rt') { ?>
								<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/complaint.png">
									<div style="background: green; color: #ffffff; padding: 5px 10px; position: absolute; top: 20px; right: 20px;"><?= $pengajuan_baru; ?></div>
									<h5 style="font-size: 14px;">Lapor Pengajuan</h5>
								</div>
							<?php } else { ?>
								<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/complaint.png">
									<h5 style="font-size: 14px;">Lapor Pengajuan</h5>
								</div>
							<?php } ?>
						</a>
					</div>
				<?php endif ?>
				<?php if ($this->session->userdata('role') == 'warga' ): ?>
					<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
						<a href="<?= base_url('user/profile/'.$this->session->userdata('no_kk')) ?>">
							<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/resume.png">
								<h5 style="font-size: 14px;">Profile</h5>
							</div>
						</a>
					</div>
				<?php endif ?>
			<?php endif ?>

			<?php if ($this->session->userdata('role') == 'administrator'): ?>
				<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
					<a href="<?= base_url('user') ?>">
						<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/population-system.png">
							<h5 style="font-size: 14px;">Data User</h5>
						</div>
					</a>
				</div>
				<div class="col-md-3" style="padding: 5px;text-align: center;width: 50%;">
					<a href="<?= base_url('user/petugas/') ?>">
						<div style="border-width: 1px;border-style: dashed;border-radius: 15px;padding: 10px;"><img style="margin-bottom: 15px;max-width: 45%;" src="assets/img/resume.png">
							<h5 style="font-size: 14px;">Data Petugas</h5>
						</div>
					</a>
				</div>
			<?php endif ?>
		</div>
		<div style="margin-top: 20px;text-align: right;"><a href="<?= base_url('auth/logout') ?>" onclick="return confirm('Anda yakin mau Keluar ?')" class="btn btn-primary" type="button" style="font-size: 20px;border-radius: 35px;padding-right: 25px;padding-left: 25px;background: #f5f5f5;color: rgb(0,0,0);">Logout<i class="fa fa-sign-out" style="margin-left: 10px;"></i></a></div>
	</div>
</section>