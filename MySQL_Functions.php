<?php
	function getMySQLConnection() {
		$servername = "localhost:3307";
		$username = "root";
		$password = "";
		$database = "akari";

		$connection = new mysqli($servername, $username, $password, $database);
		
		return $connection;
	
	
	}
	
	





?>