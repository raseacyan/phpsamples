<?php
include('../inc/connect.php');
include('../inc/functions.php');

session_start();


var_dump(isAdminLogin());

if(!isAdminLogin()){
	redirectTo('login.php');
}

display($_SESSION);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
</head>
<body>
<h1>Only login as admin can view this page</h1>
</body>
</html>