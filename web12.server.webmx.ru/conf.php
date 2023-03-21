<?php
	$host = "localhost";
	$db_name = "pscommun_database";
	$user = "pscommun_login";
	$password = "pscommun_password";

	$dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
?>