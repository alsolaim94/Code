<?php
	function getMySQLConnection() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "akari";

		$connection = new mysqli($servername, $username, $password, $database);
		
		return $connection;
	
	
	}
	
	





?>