<?php
	include '../controller/schoolController.php';

	session_start();
	$sessionSchoolData = new schoolController();

	if(isset($_POST["saveSchool"])) {
		$schoolId = $_GET["schoolId"];
		$schoolName = $_POST["schoolName"];
		$schoolAddress = $_POST["schoolAddress"];
		$schoolContactNo = $_POST["schoolContactNo"];

		if($schoolName == "") {
			header("Location: ../view/admin/schoolDetail.php?schoolId=0&invalidEntryError=1");

			$_SESSION["emptySchoolNameError"] = true;
			isset($_SESSION["emptySchoolNameError"]);

			$sessionSchoolData->rememberSchoolData();
		} else if($schoolAddress == "") {
			header("Location: ../view/admin/schoolDetail.php?schoolId=0&invalidEntryError=1");

			$_SESSION["emptySchoolAddressError"] = true;
			isset($_SESSION["emptySchoolAddressError"]);

			$sessionSchoolData->rememberSchoolData();
		} else if($schoolContactNo == "") {
			header("Location: ../view/admin/schoolDetail.php?schoolId=0&invalidEntryError=1");

			$_SESSION["emptySchoolContactNoError"] = true;
			isset($_SESSION["emptySchoolContactNoError"]);

			$sessionSchoolData->rememberSchoolData();
		} else {
			$updateSchool = new schoolController();
			if($updateSchool->updateSchool($schoolId, $schoolName, $schoolAddress, $schoolContactNo)) {
				header("Location: ../view/admin/schoolDetail.php?schoolId=".$schoolId);

				$_SESSION["successfullyUpdateSchool"] = true;
				isset($_SESSION["successfullyUpdateSchool"]);
			}
		}
	}
?>