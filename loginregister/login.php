<?php

session_start();

include('inc/connect.php');
include('inc/functions.php');

if(isset($_POST['login'])){



		$table = "users";	

		$email = $_POST['email'];
		$password = md5($_POST['password']);


		$data = checkUser($table, $email, $password, $conn);

		if($data){
			echo "login successful";
			$_SESSION['user_id'] = $data['id'];
			$_SESSION['user_email'] = $data['email'];
			$_SESSION['user_role'] = $data['role'];
		}

		
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
<h1>Login</h1>

<form action="login.php" method="post">

	Email: <input type="email" name="email"/> <br><br>
	Password: <input type="password" name="password"/><br><br>

	<input type="submit" name="login" value="Login"/>


</form>
</body>
</html>