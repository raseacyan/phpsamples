<?php
include("inc/header.php");
include("../inc/connect.php");
include("../inc/functions.php");

$form_submit_to = "resource_create.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){


	$short_text = htmlspecialchars(trim($_POST['short_text']));
	$number = htmlspecialchars(trim($_POST['number']));
	$long_text = htmlspecialchars(trim($_POST['long_text']));
	$select_option = htmlspecialchars(trim($_POST['select_option']));
	
	$checkbox = array();
	if(isset($_POST['checkbox'])){
		foreach($_POST['checkbox'] as $item){
		array_push($checkbox, htmlspecialchars(trim($item)));
		}	
	}
	$checkbox = serialize($checkbox);

	$radio = '';
	if(isset($_POST['radio'])){
		$radio = htmlspecialchars(trim($_POST['radio']));
	}


	//file upload
	$file_name = '';
	if(file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])) {

		$target_dir = "../uploads";
		$tmp_name = $_FILES["file"]["tmp_name"];
		$file_name = basename(time()."_".$_FILES["file"]["name"]);	
		move_uploaded_file($tmp_name, "$target_dir/$file_name");
    	
	}

	


	




	$table = "resources";
	$data = array(
		"short_text" => $short_text,
		"number" => $number,
		"long_text" => $long_text,
		"select_option" => $select_option,
		"radio" => $radio,
		"checkbox" =>  $checkbox,
		"file" => $file_name
	);

	$last_id = createRecord($table, $data, $conn);

	echo "Submitted Successfully";

	echo $last_id;


	

	






}

?>




<h1 class="mt-4">Add Resource</h1>

<div class="row">
	<div class="col-lg-6 ">
		<form action="<?php echo $form_submit_to; ?>" method="post" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="">Short Text</label>
		    <input type="text" class="form-control" name="short_text">
		  </div>


		  <div class="form-group">
		    <label for="">Number</label>
		    <input type="number" class="form-control" name="number">
		  </div>


		  <div class="form-group">
		    <label for="">Long Text</label>
		    <textarea class="form-control"  rows="3" name="long_text"></textarea>
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Select Option</label>
		    <select class="form-control" name="select_option">
		      <option value="option 1">option 1</option>
		      <option value="option 2">option 2</option>
		      <option value="option 3">option 3</option>
		      <option value="option 4">option 4</option>
		      <option value="option 5">option 5</option>
		    </select>
		  </div>

		  <label>Checkbox</label><br>
		  <div class="form-check">
		  	<input class="form-check-input" type="checkbox" value="checkbox 1" name="checkbox[]" >
		  	<label class="form-check-label" >Checkbox 1</label>
		  </div>
		  <div class="form-check">
		  	<input class="form-check-input" type="checkbox" value="checkbox 2" name="checkbox[]">
		  	<label class="form-check-label" >Checkbox 2</label>
		  </div>

		  <label>Radio</label><br>
		  <div class="form-check">
			  <input class="form-check-input" type="radio" name="radio"  value="radio 1">
			  <label class="form-check-label">
			    radio 1
			  </label>
		  </div>
		  <div class="form-check">
			  <input class="form-check-input" type="radio" name="radio"  value="radio 2">
			  <label class="form-check-label">
			    radio 2
			  </label>
		  </div>


		  <div class="form-group">
		    <label>File</label>
		    <input type="file" class="form-control" name="file">
		  </div>

		  <div class="form-group">

		  <input type="submit" name="submit" value="submit" class="btn btn-primary mt-4">
		  </div>



		  
		</form>
	</div>

</div>



<?php
include("inc/footer.php");
?>