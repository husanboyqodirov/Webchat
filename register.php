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

	    $stmt = $conn->prepare("SELECT user_name FROM webchat_user WHERE user_name=?");
	    $stmt->bind_param("sss", $user_name);
	    $stmt->execute();
	    $retval = $stmt->get_result();
	    if (mysqli_num_rows($retval) != 0) {
	        echo "Username already exists.";
	    } else {
	    	$stmt = $conn->prepare("INSERT INTO webchat_user (first_name, last_name, user_name, password) VALUES (?, ?, ?, ?)");
	    	$stmt->bind_param("sss", $first_name, $last_name, $user_name, $password);
	    	$stmt->execute();
	    	$retval = $stmt->get_result();
            header("location:login.php");
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