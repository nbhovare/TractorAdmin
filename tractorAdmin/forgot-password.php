<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:59:27 GMT -->

<head>
<?php
    include 'headerAdmin/head.php'
    ?>
</head>

<body class="authentication">

	<!-- Loading wrapper start -->
	<div id="loading-wrapper">
		<div class="spinner-border"></div>
		Loading...
	</div>
	<!-- Loading wrapper end -->

	<!-- *************
			************ Login container start *************
		************* -->
	<div class="login-container">

		<div class="container-fluid h-100">

			<!-- Row start -->
			<div class="row no-gutters h-100">
				<div class="login-wrapper">
					<form action="#">
						<div class="login-screen">
							<div class="login-body pb-4">
								<a href="reports.html" class="login-logo">
									<img src="img/logo.svg" alt="Uni Pro Admin">
								</a>
								<h6>Please enter the Mobile Number, you provided during the registration process.</h6>
								<div class="field-wrapper mb-3">
									<input type="email" autofocus placeholder="Enter your mobile numebr">
									<div class="field-placeholder">Mobile Number</div>
								</div>
								<div class="field-wrapper mb-3" hidden>
									<input type="email" autofocus placeholder="Enter OTP">
									<div class="field-placeholder">Otp</div>
								</div>
								<div class="actions">
									<button type="submit" class="btn btn-danger ms-auto">Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Row end -->


		</div>
	</div>
	<?php
    include 'headerAdmin/footer.php';
    ?>


</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:59:27 GMT -->

</html>