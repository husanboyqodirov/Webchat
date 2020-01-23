<!DOCTYPE html>
<html>
<head>
	<title>WebChat - Chats</title>
	<style type="text/css">
		html, body {
			font-family: calibri;
		}

	    * {
	        margin: 0px;
	        padding: 0px;
	    }

	    #main {
	        border: 1px solid black;
	        width: 450px;
	        height: 500px;
	        margin: 24px auto;
		    border-radius: 10px;
	        box-shadow: 3px 3px 2px 2px grey;
	    }

	    #message_area {
	        overflow: auto;
	        width: 98%;
	        padding: 0% 1%;
	        border: 1px solid blue;
	        border-radius: 10px;
	        height: 440px;
	    }

	    #inputArea {
			width: 365px;
			height: 50px;
			border: solid white;
			border-radius: 10px;
	    }

	    #btnMessage {
			width: 70px;
			height: 50px;
			border: solid white;
			border-radius: 10px;
			color: white;
			background: grey;
	    }
	    #btnMessage:hover {
	    	cursor: pointer;
			color: black;
			background: #D0D0D0;
	    }
	</style>
</head>
<body>

<?php
	session_start();
	if (isset($_SESSION['user_name'])) {
	    echo 'Welcome ' . $_SESSION['user_name'] . '! ';
	    echo '<a href="logout.php">Logout</a><br>';
	} else {
	    header("Location:login.php");
	}
?>

<div id="main">
	<div id="message_area">
	<?php
		include ('connect.php');
		$sql1 = "SELECT * FROM webchat_message ORDER BY `id` ASC";
		$retval1 = mysqli_query($conn, $sql1);
		while ($row = mysqli_fetch_assoc($retval1)) {
		    $message = $row['message'];
		    $user_name = $row['user_name'];
		    echo '<h4 style="color:red;">' . $user_name . '</h4>';
		    echo '<p>' . $message . '</p>';
		    echo '<hr>';
		}
		if (isset($_POST['submit'])) {
		    $message = $_POST['message'];
		    $user_name = $_SESSION['user_name'];
		    $sql = "INSERT INTO webchat_message (message, user_name) VALUES ('$message', '$user_name')";
		    if (mysqli_query($conn, $sql)) {
		        echo '<h4 style="color:red;">' . $_SESSION['user_name'] . '</h4>';
		        echo '<p>' . $message . '</p>';
		    }
		}
	?>
	</div>

	<form method="POST">
		<table>
			<tr>
				<td><input id="inputArea" type="text" name="message" placeholder="Type your message..." required></td>
				<td><input id="btnMessage" type="submit" name="submit" value="Message"></td>
			</tr>
		</table>
	</form>
</div>

</body>
</html>