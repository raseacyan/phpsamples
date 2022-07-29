<?php

include("inc/header.php");
include("../inc/connect.php");
include("../inc/functions.php");

$id = isset($_POST['id'])? $_POST['id'] : 0 ;

$table = "resources";

deleteRecord($table, $id, $conn);

redirectTo("resource_list.php");



