<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
	header("Location:./page_requestList.php");
}
if (isset($_GET['status'])) {
	switch ($_GET['status']) {
		case 401:
			echo '<div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
		<strong>Invalid Credentials!</strong> Please type your login credentials correctly.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&#10005;</span>
		</button>
	</div>';
			break;
		case 500:
			echo '<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
	  <strong>Internal Server Error!</strong> Please try again in a few minutes.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&#10005;</span>
	  </button>
	</div>';
			break;
	}
}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="assets/img/icons/favicon.ico" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="assets/css/util.css">
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
		<!--===============================================================================================-->

	</head>

	<body>

		<div class="limiter">
			<div class="container-login100" style="background-image: url('./assets/img/bg-01.jpg');">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<form class="login100-form validate-form" action="./script/login.php" method="POST">
						<span class="login100-form-title p-b-49">
							Login
						</span>

						<div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Type your username" required>
							<span class="focus-input100" data-symbol="&#xf206;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="password" placeholder="Type your password" required>
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</div>

						<div class="text-right p-t-8 p-b-31">
							<a href="#">
								Forgot password?
							</a>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="submit" type="submit">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!--===============================================================================================-->
		<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="assets/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="assets/vendor/bootstrap/js/popper.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="assets/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="assets/vendor/daterangepicker/moment.min.js"></script>
		<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="assets/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="assets/js/main.js"></script>

	</body>

	</html>