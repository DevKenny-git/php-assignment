<?php
 session_start();
 $username = $_SESSION['username'];

?>


<!doctype html>
<html>
<head>
 	<meta charset="utf-8">
	<title>Welcome Page</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<?php
		echo "<h2>Welcome ". $username . "<h2>";
		if ($_SESSION['loggedIn'] == true) {
			echo "You are logged In";
		}

	?>
	<button><a href="sign-out.php">Logout</a></button>
</body>
</html>