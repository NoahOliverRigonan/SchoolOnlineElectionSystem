<?php
	session_start();
	if(!isset($_SESSION["isLoggedIn"])) {
		header("Location: ../home/signIn.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<!-- Font awesome -->
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css">
</head>
<body>

	<div id="o-wrapper" class="o-wrapper">
		<?php
			include 'adminHeader.php';
		?>
	</div><!-- /o-wrapper -->

	<?php
		include 'sidebarMenu.php';
	?>

	<div class="container">
		<h4>Set ups</h4>
		<div class="well border-sharp-edge">
			<div class="row">
				<div class="col-md-3"> 
					<a href="school.php" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-university fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>School <i class="fa fa-arrow-circle-right pull-right"></i></h4>

							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-book fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Departments <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-graduation-cap fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Students <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-legal fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Election Type <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<h4>Activites</h4>
		<div class="well border-sharp-edge">
			<div class="row">
				<div class="col-md-3"> 
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-file-text-o fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Candidacy Form <i class="fa fa-arrow-circle-right pull-right"></i></h4>

							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-bullhorn fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Parties <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-check-square-o fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Vote <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-list-ol fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Election Results <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<h4>Reports</h4>
		<div class="well border-sharp-edge">
			<div class="row">
				<div class="col-md-3"> 
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-print fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Voters Report <i class="fa fa-arrow-circle-right pull-right"></i></h4>

							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-print fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Candidates Report <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-print fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Results Report <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<h4>System</h4>
		<div class="well border-sharp-edge">
			<div class="row">
				<div class="col-md-3"> 
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-users fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>Users <i class="fa fa-arrow-circle-right pull-right"></i></h4>

							</div>
						</div>
					</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="dashboard-links">
						<div class="panel panel-default border-sharp-edge dashboard-link-panel">
							<div class="panel-body">
								<center>
									<i class="fa fa-table fa-5x"></i>
								</center>
							</div>
							<div class="panel-footer panel-footer-custom">
								<h4>System Tables <i class="fa fa-arrow-circle-right pull-right"></i></h4>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>
	</div>

	<?php
		include 'adminFooter.php';
	?>

	<div id="c-mask" class="c-mask"></div>


	<!-- Scripts -->
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/carousel.js"></script>
	<script type="text/javascript" src="../../js/collapse.js"></script>
	<script type="text/javascript" src="../../js/dropdown.js"></script>
	<script type="text/javascript" src="../../js/modal.js"></script>
	<script type="text/javascript" src="../../js/transition.js"></script>

	<script type="text/javascript" src="../../js/menu.js"></script>
	<script type="text/javascript">
		/**
		* Slide left instantiation and action.
		*/
		var slideLeft = new Menu({
			wrapper: '#o-wrapper',
			type: 'slide-left',
			menuOpenerClass: '.c-button',
			maskId: '#c-mask'
		});

		var slideLeftBtn = document.querySelector('#c-button--slide-left');
			slideLeftBtn.addEventListener('click', function(e) {
			e.preventDefault;
			slideLeft.open();
		});

	</script>
</body>
</html>