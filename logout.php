<?php
	session_start();
	if (isset($_SESSION['user_name'])) {
	    unset($_SESSION['user_name']);
	    header("Location:login.php");
	} else {
	    header("Location:login.php");
	}
?>