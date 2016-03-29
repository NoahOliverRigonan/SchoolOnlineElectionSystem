<?php
	session_start();
	if(isset($_SESSION["isLoggedIn"])) {
		header("Location: ../admin/admin.php");
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Voting System</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<!-- Font awesome -->
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css">
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="home.php">Online Election</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="home.php" title="Home">Home</a></li>
					<li><a href="#" title="About the system">About</a></li>
					<li><a href="#" title="Subscribe us">Subscribe</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#loginModal" title="Sign in">Sign In</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- section -->
	<div class="container">
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<form class="form-horizontal" role="form" method="POST" action="../../subController/registerSubController.php">
					<div class="panel panel-default border-sharp-edge panel-register-custom">
						<div class="panel-heading border-sharp-edge"><h4><i class="fa fa-pencil-square-o"></i> Sign-up for FREE!</h4></div>
						<div class="panel-body">
							<div class="col-sm-offset-4 col-sm-8">
								<?php
								if(isset($_SESSION["firstnameError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "<strong>Firstname</strong> field is empty."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["lastnameError"])) {

								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "<strong>Lastname</strong> field is empty."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["genderError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "Provide a Gender."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["emailAddressError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "<strong>Email Address</strong> field is empty."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["usernameError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "<strong>Username</strong> field is empty."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["passwordError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "<strong>Password</strong> field is empty."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["passwordStrengthError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "Password must have atleast 6 characters."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["confirmPasswordError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "<strong>Confirm Password</strong> field is empty."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["confirmPasswordMatchError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "Password and Confirm Password is not match."; 
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["emailAddressTakenError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "Sorry. the email address is already taken.";
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["usernameTakenError"])) {
								?>
									<div class="alert alert-danger border-sharp-edge">
										<?php 
											echo "Sorry. the username is already taken.";
											session_destroy();
										?>
									</div>
								<?php
								} else if (isset($_SESSION["successfullyRegistered"])) {
								?>
									<div class="alert alert-success border-sharp-edge">
										<?php 
											echo "<i class='fa fa-check'></i> Successfully Registed. <a href='#' data-toggle='modal' data-target='#loginModal' title='Login now'>Login now!</a>";
										?>
									</div>
								<?php
								} else {

								}
								?>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">First Name</label>
								<div class="col-sm-8">
									<input type="text" name="firstname" class="form-control border-sharp-edge" placeholder="Enter first name" value="<?php 
										if(isset($_SESSION["firstnameRememberData"])) {
											echo $_SESSION['firstnameRememberData'];
										};
									 ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Last Name</label>
								<div class="col-sm-8"> 
									<input type="text" name="lastname" class="form-control border-sharp-edge" placeholder="Enter last name" value="<?php 
										if(isset($_SESSION["lastnameRemeberData"])) {
											echo $_SESSION['lastnameRemeberData'];
										};
									 ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Gender</label>
								<div class="col-sm-8"> 
									<div class="radio">
										<label><input type="radio" name="gender" value="Male"> Male </label>
										<label><input type="radio" name="gender" value="Female"> Female </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Email Address</label>
								<div class="col-sm-8"> 
									<input type="email" name="emailAddress" class="form-control border-sharp-edge" placeholder="Enter email address" value="<?php 
										if(isset($_SESSION["emailAddressRememberData"])) {
											echo $_SESSION['emailAddressRememberData'];
										};
									 ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Username</label>
								<div class="col-sm-8">
									<input type="text" name="username" class="form-control border-sharp-edge" placeholder="Enter username" value="<?php 
										if(isset($_SESSION["usernameRememberData"])) {
											echo $_SESSION['usernameRememberData'];
										};
									 ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Password</label>
								<div class="col-sm-8"> 
									<input type="password" name="password" class="form-control border-sharp-edge" placeholder="Enter password"  value="<?php 
										if(isset($_SESSION["passwordRememberData"])) {
											echo $_SESSION['passwordRememberData'];
										};
									 ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Confirm Password</label>
								<div class="col-sm-8"> 
									<input type="password" name="confirmPassword" class="form-control border-sharp-edge" placeholder="Enter confirm password" />
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="form-group"> 
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" name="btn-register" class="btn btn-lg btn-success border-sharp-edge btn-wide-custom"><i class="fa fa-check"></i> Register</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<hr />
	</div>

	<!-- login modal -->
	<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content border-sharp-edge">
				<div class="modal-header modal-header-custom">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-user"></i> Sign in</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" method="POST" action="../../subController/loginSubController.php">
						<div class="form-group">
						<label class="control-label col-sm-3">Username</label>
							<div class="col-sm-9">
								<input type="text" name="username" class="form-control border-sharp-edge" placeholder="Enter username" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Password</label>
							<div class="col-sm-9"> 
								<input type="password" name="password" class="form-control border-sharp-edge" placeholder="Enter password" required>
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-3 col-sm-9">
								<div class="checkbox">
									<label><input type="checkbox" class="border-sharp-edge"> Remember me</label>
									<a href="#" class="pull-right">Forgot password?</a>
								</div>
							</div>
						</div>
						<br />
						<div class="form-group"> 
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" name="btn-login" class="btn btn-primary btn-lg border-sharp-edge btn-wide-custom"><i class="fa fa-sign-in"></i> Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

	<footer class="footer-custom">
		<div class="container">
			<span>Online Election System Copyright by Noah Oliver Rigonan - 2016</span>
		</div>
	</footer>

	<!-- Scripts -->
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/carousel.js"></script>
	<script type="text/javascript" src="../../js/collapse.js"></script>
	<script type="text/javascript" src="../../js/dropdown.js"></script>
	<script type="text/javascript" src="../../js/modal.js"></script>
	<script type="text/javascript" src="../../js/transition.js"></script>
	<script type="text/javascript">

	</script>
</body>
</html>