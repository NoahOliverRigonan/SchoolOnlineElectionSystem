<?php
	session_start();
	if(isset($_SESSION["isLoggedIn"])) {
		header("Location: ../admin/adminDashboard.php");
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
					<li><a href="signIn.php">Sign In</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- section -->
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form class="form-horizontal" role="form" method="POST" action="../../subController/loginSubController.php">
					<div class="panel panel-default border-sharp-edge panel-register-custom">
						<div class="panel-heading border-sharp-edge"><h4><i class="fa fa-user"></i> Sign In</h4></div>
						<div class="panel-body">
							<div class="form-group"> 
								<div class="col-sm-offset-3 col-sm-9">
									<?php
									if(isset($_SESSION["loginError"]))
									{
									?>
										<div class="alert alert-danger">
											<?php echo "<strong>Invalid Username or Password.</strong> Please try again."; ?>
										</div>
									<?php
										session_destroy();
									} 
									?>
								</div>
							</div>
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
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

	<div class="container">
		<hr />
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