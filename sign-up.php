<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SignUp Page</title>
	<link rel="stylesheet" href="style.css">
	
	</style>
</head>
<body>
	<div class="center">
		<h2>Sign Up</h2>
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
			 <div class="txt_field">
			 	<input type="password" name="con_password" required>
			 	<span></span>
			 	<label>Confirm Password</label>
			  </div>
			 	<input type="submit" name="sign_up" value="Sign Up">
			 	
			
		</form>

	</div>
	
		

<?php
	$username = $password = "";
	$username_err = $password_err = "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// validate username
		if (empty(trim($_POST['username']))) {
			$username_err = 'Please enter a username';
		} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
			$username_err = "User name can only contain numbers, letters and underscore";
			echo $username_err;
		} else {
			$username = $_POST['username'];
			$_SESSION['username'] = $username;
		}

		// validate password
		if(empty(trim($_POST["password"]))){
	        $password_err = "Please enter a password.";     
	    } elseif(strlen(trim($_POST["password"])) < 6){
	        $password_err = "Password must have atleast 6 characters.";
	        echo $password_err;
	    } else{
	        $password = trim($_POST["password"]);
	        $_SESSION['password'] = $password;
	        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	    }
	    // validate password confirm
	    if (empty(trim($_POST['con_password']))) {
	    	$password_err = "Re-enter your password";
	    	echo $password_err;
	    } elseif($password !== $_POST['con_password']) {
	    	$password_err = "Password do not match";
	    	echo $password_err;
	    } else {
	    	$con_password = trim($_POST['con_password']);
	    	
	    }

	    // Redirect to success page
	    if (password_verify($con_password, $hashed_password)) {
	    	$_SESSION['loggedIn'] = true;	    	
	    	header("Location: success.php");
	    
	    } else {
	    	echo "password do not match";
	    }

	}

?>
</body>
</html>