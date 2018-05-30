<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>
<body>
	<main>
	<div style="margin-left:45%;">
 <a href="index.html"><img src="img/bubble.png" height="5%" width="25%" style="margin-top:10px;"></a>
 </div>
		<div class="buttons login-button-active" data-action="animated">
			<button type="button" class="login-button">
				<span class="log-link login-button-active" data-action="animated">Login</span>
				<span class="login-underline login-button-active" data-action="animated"></span>
			</button>
			<button type="button" class="signup-button">
				<span class="sign-link" data-action="animated">Sign Up</span>
				<span class="signup-underline login-button-active" data-action="animated"></span>
			</button>
		</div>
		<div class="forms">
			<form class="login-form login-button-active" action="j.php" method="post" data-action="animated">
				<fieldset>
					<legend>Please, enter your email and password for login.</legend>
					<label for="login-email">E-mail</label>
					<input id="login-email" type="email" name="email" required>
					<label for="login-password">Password</label>
					<input id="login-password" type="password" name="password" required>
				</fieldset>
				<input type="submit" name="login_btn" value="Login">
			</form>
			<form class="signup-form" action="#" method="post" data-action="animated">
				<fieldset>
					<legend>Please, enter your email, password and password confirmation for sign up.</legend>
					<label for="signup-username">Username</label>
					<input id="signup-username" type="text" name="username" required>
					<label for="signup-email">E-mail</label>
					<input id="signup-email" type="email" name="email" required>
					<label for="signup-password">Password</label>
					<input id="signup-password" type="password" name="password" required>
					<label for="signup-confirm-password">Confirm password</label>
					<input id="signup-confirm-password" type="password" name="cpassword" required>
				</fieldset>
				<input type="submit" name="register_btn" value="Continue">
			</form>
		</div>
	</main>
	<script src="script.js" type="text/javascript"></script>
</body>
</html>
<?php
     session_start();
	 if(isset($_POST['register_btn'])){
     ini_set('display_errors', '1');
	 $db = mysqli_connect("localhost","root","","search");
	      $username = mysqli_real_escape_string($db,$_POST['username']);
	      $email = mysqli_real_escape_string($db,$_POST['email']);
	      $password = mysqli_real_escape_string($db,$_POST['password']);
	      $c_password = mysqli_real_escape_string($db,$_POST['cpassword']);

	 if ($password == $c_password) {
	 	 //create user
		 $password=sha1($password);
        $sql = "INSERT INTO login(username, email, password) VALUES('$username', '$email', '$password')";
        if(mysqli_query($db,$sql))
		echo "<script>alert('you have registered please login below')</script>";
       // $_SESSION['message'] = "You have successfully logged in!";
        //$_SESSION['username'] = $username;
      else { 
				echo "<script>alert('username already exist')</script>";
				//header("location: login.php"); 
	  }
	  //redirecting user to add his Site URL
	 }else{
	 	//failed
	 	//$_SESSION['message'] = "The two passwords do not match";
		echo "<script>alert('passwords did not match make sure they are equal')</script>";
	 }
}

?>