<?php

include('../inc/connect.php');
include('../inc/functions.php');

if(isset($_POST['register'])){

		$table = 'users';
		$data = array(
			'email'=>$_POST['email'],
			'password'=> md5($_POST['password']),
			'role'=>'admin'
		);

		$id = createRecord($table, $data, $conn);

		if($id)
			echo "saved successfully";
		



}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
<h1>Register</h1>

<form action="register.php" method="post">

	Email: <input type="email" name="email"/> <br><br>
	Password: <input type="password" name="password"/><br><br>

	<input type="submit" name="register" value="Register"/>


</form>
</body>
</html>