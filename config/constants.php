<?php
	session_start();
	ob_start();
	//Defining all database credentials 
	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'imbibliophile');
	
	define('SITEURL', 'http://localhost:8080/imbibliophile/');
	//conntecting to database
	$con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
	//selecting database
    $db = mysqli_select_db($con, DB_DATABASE) or die(mysqli_error());
?>