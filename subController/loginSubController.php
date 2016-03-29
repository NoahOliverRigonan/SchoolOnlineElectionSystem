<?php
	include '../controller/userSecurityController.php';

	session_start();

	if(isset($_POST["btn-login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$user = new userSecurity();
		if($user->login($username, $password)) {
			header("Location: ../view/admin/admin.php");

			$_SESSION['currentUserLoggedIn'] = $_POST["username"];
			isset($_SESSION['currentUserLoggedIn']);
		} else {
			header("Location: ../view/home/signIn.php");
			
			$_SESSION["loginError"] = true;
			isset($_SESSION["loginError"]);
		}
	}
?>