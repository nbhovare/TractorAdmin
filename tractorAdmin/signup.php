<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:59:27 GMT -->

<head>
	<?php
	include("headerAdmin/conn.php");
	include("headerAdmin/head.php");
	?>

</head>

<body class="authentication">


	<div class="login-container">

		<div class="container-fluid h-100">

			<!-- Row start -->
			<div class="row no-gutters h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<span>Design</span>
							<span>Made</span>
							<span>Simple.</span>
						</div>
						<div class="about-desc">
							<!-- UniPro a data dashboard is an information management tool that visually tracks, analyzes and displays key performance indicators (KPI), metrics and key data points to monitor the health of a business, department or specific process. -->
						</div>
						<!-- <a href="reports.html" class="know-more">Know More <img src="img/right-arrow.svg" alt="Uni Pro Admin"></a> -->

					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<?php
						if (isset($_REQUEST['signup'])) {
							$name = $_REQUEST['name'];
							$email = $_REQUEST['email'];
							$password = md5($_REQUEST['password']);
							$query = "INSERT INTO `admin`(admin_name,admin_email,admin_password) VALUES('$name','$email','$password')";
							if (mysqli_query($conn, $query)) {
								echo "<div class='alert alert-success'>Login successful</div>";
								header("Location:login.php");
							} else {
								echo "<div class='alert alert-danger'>Invalid username or password</div>";
							}
						}
						?>

						<form action="signup.php">
							<div class="login-screen">
								<div class="login-body">
									<a href="#" class="login-logo">
										<img src="img/logo.svg" alt="Admin Dashboard">
									</a>
									<h6>Welcome to Admin dashboard,<br>Create your account.</h6>
									<div class="field-wrapper">
										<input type="name" name="name" id="name" autofocus>
										<div class="field-placeholder">Name</div>
									</div>
									<div class="field-wrapper">
										<input type="email" name="email" id="email" autofocus>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper">
										<input type="password" name="password" id="password">
										<div class="field-placeholder">Password</div>
									</div>
									<div class="actions">
										<button type="submit" name="signup" id="signup"
											class="btn btn-primary ms-auto">Sign Up</button>
									</div>
								</div>
								<div class="login-footer">
									<span class="additional-link">Have an account? <a href="login.php"
											class="btn btn-light">Login</a></span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->


		</div>
	</div>
	<!-- *************
			************ Login container end *************
		************* -->

	<!-- *************
			************ Required JavaScript Files *************
		************* -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/moment.js"></script>

	<!-- *************
			************ Vendor Js Files *************
		************* -->

	<!-- Main Js Required -->
	<script src="js/main.js"></script>

</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:59:27 GMT -->

</html>