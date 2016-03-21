<?php
	include 'userSecurityController.php';

	session_start();
	$sessionData = new userSecurity();

	if(isset($_POST["btn-register"])) {
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$gender = $_POST["gender"];
		$emailAddress = $_POST["emailAddress"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$confirmPassword = $_POST["confirmPassword"];

		if($firstname == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["firstnameError"] = true;
			isset($_SESSION["firstnameError"]);

			$sessionData->rememberData();
			
		} else if ($lastname == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["lastnameError"] = true;
			isset($_SESSION["lastnameError"]);

			$sessionData->rememberData();
		} else if ($gender == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["genderError"] = true;
			isset($_SESSION["genderError"]);
			
			$sessionData->rememberData();
		} else if ($emailAddress == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["emailAddressError"] = true;
			isset($_SESSION["emailAddressError"]);
			
			$sessionData->rememberData();
		} else if($username == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["usernameError"] = true;
			isset($_SESSION["usernameError"]);

			$sessionData->rememberData();
		} else if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
			$error[] = 'Please enter a valid email address.';
		} else if ($password == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["passwordError"] = true;
			isset($_SESSION["passwordError"]);

			$sessionData->rememberData();
		} else if (strlen($password) < 6) {
			header("Location: ../view/home/index.php");

			$_SESSION["passwordStrengthError"] = true;
			isset($_SESSION["passwordStrengthError"]);

			$sessionData->rememberData();
		} else if ($confirmPassword == "") {
			header("Location: ../view/home/index.php");

			$_SESSION["confirmPasswordError"] = true;
			isset($_SESSION["confirmPasswordError"]);

			$sessionData->rememberData();
		} else if ($password !== $confirmPassword) {
			header("Location: ../view/home/index.php");

			$_SESSION["confirmPasswordMatchError"] = true;
			isset($_SESSION["confirmPasswordMatchError"]);

			$sessionData->rememberData();
		} else {
			try {
				$connection = new dbConnection();
				$checkQuery =  $connection->connectDatabase()->prepare("SELECT Username, Email FROM tblusers WHERE Username=:username OR Email=:emailAddress");
				$checkQuery->execute(array(':username'=>$username, ':emailAddress'=>$emailAddress));
				$row = $checkQuery->fetch(PDO::FETCH_ASSOC);
				echo $row['Username'];

				if($row['Username'] == $username) {
					header("Location: ../view/home/index.php");

					$_SESSION["usernameTakenError"] = true;
					isset($_SESSION["usernameTakenError"]);

					$sessionData->rememberData();
				} else if($row['Email'] == $emailAddress) {
					header("Location: ../view/home/index.php");

					$_SESSION["emailAddressTakenError"] = true;
					isset($_SESSION["emailAddressTakenError"]);

					$sessionData->rememberData();
				} else
				{
					$user = new userSecurity();
					if($user->register($firstname, $lastname, $gender, $emailAddress, $username, $password)) 
					{
						header("Location: ../view/home/index.php");

						$_SESSION["successfullyRegistered"] = true;
						isset($_SESSION["successfullyRegistered"]);
					}
				}

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
?>