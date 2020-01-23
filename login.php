<!DOCTYPE html>
<html>
<head>
	<title>WebChat - Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="main">
<?php
	session_start();
	require_once ('connect.php');
	if (isset($_POST['login'])) {
	    $user_name = $_POST['user_name'];
	    $password = $_POST['password'];
	    $sql = "SELECT * FROM webchat_user WHERE BINARY user_name='$user_name' AND password='$password'";
	    $retval = mysqli_query($conn, $sql);
	    if (mysqli_num_rows($retval) > 0) {
	        $_SESSION['user_name'] = $user_name;
	        header("Location:index.php");
	    } else {
	        echo "Your Username and Password do not match.";
	    }
	}
?>
	<h2 style="text-align: center">Login</h2>
	<form method="POST">
		Username:<br>
		<input type="text" name="user_name" placeholder="Username" required><br><br>
		Password:<br>
		<input type="password" name="password" placeholder="Password" required><br><br>
		<center>
			<button type="submit" name="login">Login</button><br><br>
			<a href="register.php">Create an account</a>
		</center>
		
	</form>
</div>
</body>
</html>