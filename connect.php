<?php
	$server = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'webchat';
	$conn = mysqli_connect($server, $user, $pass, $db);
	if (!$conn) {
	    die('Could not connect to the database server: ' . mysqli_connect_error($conn));
	}
?>