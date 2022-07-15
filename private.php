<?php
include('inc/connect.php');
include('inc/functions.php');

session_start();

if(!isLogin()){
	redirectTo('login.php');
}

display($_SESSION);


?>

<html>
<head>
	<title>Demo</title>
</head>
<body>
<h1>Only login users can view this page</h1>
</body>
</html>