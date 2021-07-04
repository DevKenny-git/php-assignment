<?php

	session_start();
	$_SESSION['loggIn'] = false;
	$username = $_SESSION['username']
	

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Goodbye</title>
	<link rel="stylesheet" href="style.css">	
</head>
<body>

	<?php
		echo "Goodbye " . $username . ", we hate to see you go.";
	?>
	<button><a href="sign-in.php">Login</a></button> <br/>
	<button><a href="sign-up.php">Register</a></button>
</body>

</html>
