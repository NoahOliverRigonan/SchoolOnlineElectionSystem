<?php
	include '../controller/userSecurityController.php';
	
	$user = new userSecurity();
	
	session_start();
	$user->logout();
?>