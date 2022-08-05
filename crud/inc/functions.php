
<?php
/***********************************
@Helper
************************************/

function display($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function redirectTo($url){
	header("Location:".$url);
}

function createRecord($table, $data, $conn){

	$columns = "";
	$values = "";
	foreach($data as $key=>$val){
		$columns .= "{$key},";
		$values .= "'{$val}',";
	}
	$columns = substr($columns, 0,-1);
	$values = substr($values, 0,-1);


	$sql = "INSERT INTO {$table} ({$columns}) 
	VALUES ({$values})";



	if ($conn->query($sql) === TRUE) {	  
	  return  $conn->insert_id;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	  die();
	}
	
}

function updateRecord($table, $data, $id, $conn){

	$set = "";
	foreach($data as $k=>$v){
		$set .= "`".$k."`='".$v."',";
	}
	$set = substr($set, 0,-1);


	$sql = "UPDATE {$table} set {$set} WHERE id={$id}";
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}
}



function deleteRecord($table, $id, $conn){
	$sql = "DELETE FROM {$table} WHERE id={$id}";	
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}	
}


/***********************************
@Login
************************************/


function checkUser($table, $email, $password, $conn){	
	$sql = "SELECT id,email,role FROM $table WHERE email='{$email}' AND password = '{$password}'";

	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	   $row = $result->fetch_assoc();
	   $data = $row; 
	   return $data;
	} 

	return false;	
}


function isLogin(){
	if(!isset($_SESSION['user_id'])){
		return false;
	}else{
		return true;
	}
}

function isAdminLogin(){
	if(!isset($_SESSION['user_id'])){	
		return false;
	}elseif($_SESSION['user_role'] !== 'admin'){		
		return false;
	}else{
		return true;
	}
}


/***********************************
@Resource
************************************/

function getResources($conn){	
	$sql = "SELECT * FROM resources";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getResourceById($id, $conn){
	$sql = "SELECT * FROM  resources  WHERE id={$id}";
	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row;	
	} 
	return $data;	
}







