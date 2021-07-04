<?php
	session_start();
	$_SESSION['loggedIn'] = false;
	$_SESSION['username'];
	$_SESSION['password'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="style.css">
	
	</style>
</head>
<body>
	<div class="center">
		<h2>Login</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
			 <div class="txt_field">
			 	<input type="text" name="username" required>
			 	<span></span>
			 	<label>Username</label>
			 </div>
			 <div class="txt_field">
			 	<input type="password" name="password" required>
			 	<span></span>
			 	<label>Password</label>
			 </div>
			 	<div class="pass">Forgot Password?</div>
			 	<input type="submit" name="login" value="Login">
			 	<div class="signup_link">
			 		Not a member? <a href="sign-up.php">Signup</a>
			 	</div>
			 
		</form>

	</div>
	
		

<?php
	$username = $password = "";
	$username_err = $password_err = "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// validate username
		if (empty(trim($_POST['username']))) {
			$username_err = 'Please enter a username';
			echo $username_err;
		} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
			$username_err = "User name can only contain numbers, letters and underscore";
			echo $username_err;
		} elseif ($username == $_SESSION['username']) {
			echo $username;
		}

		// validate password
		if(empty(trim($_POST["password"]))){
	        $password_err = "Please enter a password.";  
	        echo $password_err;   
	    } elseif(strlen(trim($_POST["password"])) < 6){
	        $password_err = "Password must have atleast 6 characters.";
	        echo $password_err;
	    } else{
	        $password = trim($_POST["password"]);
	        $hash_password = password_hash($password, PASSWORD_DEFAULT);
	    }
	    if ($password = password_verify($_SESSION['password'], $hash_password)) {
	    	$_SESSION['loggedIn'] = true;
	    	header('success.php');
	    } else {
	    	echo "password do not match";
	    }

	}

?>
</body>
</html>