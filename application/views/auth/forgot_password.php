<section class="d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center login-clean" style="min-height: 100vh;background: url('../assets/img/8.jpg');">
	<form method="post">
		<h2 class="sr-only">Forgot Password</h2>
		<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
		<div class="form-group">
			<input class="form-control" type="email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-block" type="submit">Reset</button>
		</div>
		<a class="forgot" href="<?= base_url('auth') ?>">Already have an account?</a>
	</form>
</section>