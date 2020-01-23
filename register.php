<!DOCTYPE html>
<html>
<head>
	<title>WebChat - Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	require_once ('connect.php');
	if (isset($_POST['register'])) {
	    $first_name = $_POST['first_name'];
	    $last_name = $_POST['last_name'];
	    $user_name = $_POST['user_name'];
	    $password = $_POST['password'];
	    $sql = "SELECT user_name FROM webchat_user WHERE user_name='$user_name'";
	    $retval = mysqli_query($conn, $sql);
	    if (mysqli_num_rows($retval) != 0) {
	        echo "Username already exists.";
	    } else {
	        $sql = "INSERT INTO webchat_user (first_name, last_name, user_name, password) VALUES ('$first_name', '$last_name', '$user_name', '$password')";
	        if (mysqli_query($conn, $sql)) {
	            header("location:login.php");
	        } else {
	            echo $sql;
	        }
	    }
	}
?>

<div id="main">
	<h2 align="center">Registration</h2>
	<form method="POST" >
		First Name:<br>
		<input type="text" name="first_name" placeholder="First Name" required><br><br>
		Last Name:<br>
		<input type="text" name="last_name" placeholder="Last Name" required><br><br>
		Username:<br>
		<input type="text" name="user_name" placeholder="Username" required><br><br>
		Password:<br>
		<input type="password" name="password" placeholder="Password" required><br><br>
		<center>
			<button type="submit" name="register">Register</button>
		</center>
	</form>
</div>
</body>
</html>