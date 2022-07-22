<?php
include('../inc/connect.php');
include('../inc/functions.php');

session_start();

if(!isAdminLogin()){
	redirectTo('login.php');
}




?>

<html>
<head>
	<title>Demo</title>
</head>
<body>
<h1>ABC</h1>
</body>
</html>