<?php
	include 'databaseConnectionController.php';

	class userSecurity {
		private $connection;

		// Register User
		public function register($firstname, $lastname, $gender, $emailAddress, $username, $password) {
			try {
				$connection = new dbConnection();
				$registerQuery = $connection->connectDatabase()->prepare("INSERT INTO tblusers (Username, Password, Firstname, Lastname, Gender, Email) VALUES(:username, :password, :firstname, :lastname, :gender, :email)");

				$registerQuery->bindparam(":username", $username);
				$registerQuery->bindparam(":password", $password);
				$registerQuery->bindparam(":firstname", $firstname);
				$registerQuery->bindparam(":lastname", $lastname);
				$registerQuery->bindparam(":gender", $gender);
				$registerQuery->bindparam(":email", $emailAddress);

				$registerQuery->execute();

				return true;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		// Remeber the data after register error
		public function rememberData() {
			$_SESSION["firstnameRememberData"] = $_POST["firstname"];
			isset($_SESSION["firstnameRememberData"]);

			$_SESSION["lastnameRemeberData"] = $_POST["lastname"];
			isset($_SESSION["lastnameRemeberData"]);

			$_SESSION["emailAddressRememberData"] = $_POST["emailAddress"];
			isset($_SESSION["emailAddressRememberData"]);

			$_SESSION["usernameRememberData"] = $_POST["username"];
			isset($_SESSION["usernameRememberData"]);

			$_SESSION["passwordRememberData"] = $_POST["password"];
			isset($_SESSION["passwordRememberData"]);
		}

		// login as user or admin
		public function login($username, $password) {
			try {
				$connection = new dbConnection();
				$loginQuery = $connection->connectDatabase()->prepare("SELECT * FROM tblusers WHERE Username=:username AND Password=:password");
				$loginQuery->execute(array(':username'=>$username, ':password'=>$password));
				// $userSecurityRow = $loginQuery->fetch(PDO::FETCH_ASSOC);

				if($loginQuery->rowCount() > 0) {
					$_SESSION['isLoggedIn'] = true;
					isset($_SESSION['isLoggedIn']);

					// password verification code
					// if(password_verify($upass, $userRow['user_pass']))
					// {
					// 	$_SESSION['user_session'] = $userRow['user_id'];
					// 	return true;
					// }
					// else
					// {
					// 	return false;
					// }

					return true;
				} else {
					return false;
				}

			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		// log out
		public function logout() {
			session_start();
			unset($_SESSION['isLoggedIn']);

			session_destroy();

			header("Location: ../view/home/index.php");
		}
	}
?>