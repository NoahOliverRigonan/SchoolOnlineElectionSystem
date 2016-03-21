<?php
	class dbConnection
	{
		private $dbHost = "localhost";
		private $dbName = "electiondb";
		private $dbUsername = "root";
		private $dbPassword = "";
		private $conn;

		// database connect to Mysql
		public function connectDatabase() {
			try {
				$conn = null;
				$conn = new PDO("mysql:dbhost=".$this->dbHost.";dbname=".$this->dbName."", $this->dbUsername, $this->dbPassword, array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				));;
				return $conn;
			} catch(PDOException $e) {
				echo "Connection Error: " .$e->getMessage();
			}
		}
	}
?>