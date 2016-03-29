<?php
	include '../controller/schoolController.php';

	session_start();
	$sessionSchoolData = new schoolController();

	if(isset($_POST["saveSchool"])) {
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
			$connection = new dbConnection();

			$checkSchoolQuery =  $connection->connectDatabase()->prepare("SELECT School FROM tblschool WHERE School=:school");
			$checkSchoolQuery->execute(array(':school'=>$schoolName));
			$rowSchool = $checkSchoolQuery->fetch(PDO::FETCH_ASSOC);

			if($rowSchool['School'] == $schoolName) {
				header("Location: ../view/admin/schoolDetail.php?schoolId=0&invalidEntryError=1");

				$_SESSION["schoolRecorded"] = true;
				isset($_SESSION["schoolRecorded"]);

				$sessionSchoolData->rememberSchoolData();
			} else {
				$newSchool = new schoolController();
				if($newSchool->addSchool($schoolName, $schoolAddress, $schoolContactNo)) {
					$getLastSchoolQuery =  $connection->connectDatabase()->prepare("SELECT * FROM tblschool ORDER BY Id DESC LIMIT 1");
					$getLastSchoolQuery->execute();
					$rowLastSchool = $getLastSchoolQuery->fetch(PDO::FETCH_ASSOC);
					if($rowLastSchool['Id'] > 0) {
						header("Location: ../view/admin/schoolDetail.php?schoolId=".$rowLastSchool['Id']);

						$_SESSION["successfullySaveSchool"] = true;
						isset($_SESSION["successfullySaveSchool"]);
					}
				}
			}
		}
	}
?>