<?php
	include '../controller/schoolController.php';

	$schoolId = $_GET["SchoolId"];

	$deleteSchool = new schoolController();
	if($deleteSchool->deleteSchool($schoolId)) {
		header("Location: ../view/admin/school.php");

		$_SESSION["successfullyDeleteSchool"] = true;
		isset($_SESSION["successfullyDeleteSchool"]);
	}
?>