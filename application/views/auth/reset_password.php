<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center login-clean" style="min-height: 100vh;background: url('../../../assets/img/8.jpg');">
	<form action="<?php echo base_url('auth/reset_password/token/'.$token); ?>" method="post">
		<?php 
		if($this->session->flashdata('error') !='')
		{
			echo '<div class="alert alert-danger" role="alert">';
			echo $this->session->flashdata('error');
			echo '</div>';
		} else if($this->session->flashdata('success') != '') {
			echo '<div class="alert alert-success" role="success">';
			echo $this->session->flashdata('success');
			echo '</div>';
		}
		?>
		<div class="form-group">
			<label>Password Baru *</label>
			<input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="********************" class="form-control formlogin" required>
		</div>
		<div class="form-group">
			<label>Konfirmasi Password *</label>
			<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="********************" class="form-control formlogin" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">SUBMIT</button>
		</div>
	</form>
</section>