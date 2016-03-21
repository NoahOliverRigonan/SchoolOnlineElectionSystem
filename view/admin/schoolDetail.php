<?php
	include '../../controller/schoolController.php';

	session_start();
	if(!isset($_SESSION["isLoggedIn"])) {
		header("Location: ../home/signIn.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>School Detail</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<!-- Font awesome -->
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css">

	<!-- Data tables -->
	<link rel="stylesheet" type="text/css" href="../../css/dataTables.jqueryui.css">
	<link rel="stylesheet" type="text/css" href="../../css/dataTables.jqueryui.min.css">
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
		<div class="row">
			<div class="col-md-6">
				<h4><i class="fa fa-university"></i> Schoo Detail</h4>
			</div>
			<div class="col-md-6" align="right">
				<a href="school.php" class="btn btn-danger border-sharp-edge"><i class="fa fa-close"></i> Close</a>
			</div>
		</div>
		<hr />
		<?php
			$Id = $_GET['schoolId'];

			$school = new schoolController();
			$school->retrieveSchoolById($Id);
		?>
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
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
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

		$(document).ready(function() {
			$('#schoolTable').dataTable({
		    	"oLanguage": { "sSearch": '' },
				"columns": [
					{ "title": "<center>Edit</center>" },
					{ "title": "<center>Delete</center>" },
					{ "title": "<center>School</center>" },
					{ "title": "<center>Address</center>" },
					{ "title": "<center>Contact No.</center>" }
				]
		    });

		    $('div.dataTables_filter input').addClass('form-control input-sm border-sharp-edge pull-right');
		    $('div.dataTables_filter input').attr("placeholder", "search");
		});
	</script>
</body>
</html>