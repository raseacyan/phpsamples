<?php
include("inc/header.php");
include("../inc/connect.php");
include("../inc/functions.php");


$id = isset($_GET['id'])? $_GET['id'] : 0 ;
$form_submit_to = "resource_update.php?id={$id}";

$resource = getResourceById($id, $conn);
$resource['checkbox'] = unserialize($resource['checkbox']);



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
	$file_name = $resource['file'];
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

	display($data);

	

	if(updateRecord($table, $data, $id, $conn)){
		redirectTo("resource_update.php?id={$id}");
	}



	

	echo "Updated Successfully ";

	


	

	






}

?>




<h1 class="mt-4">Update Resource</h1>

<div class="row">
	<div class="col-lg-6 ">
		<form action="<?php echo $form_submit_to; ?>" method="post" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="">Short Text</label>
		    <input type="text" class="form-control" name="short_text" value="<?php echo $resource['short_text']; ?>">
		  </div>


		  <div class="form-group">
		    <label for="">Number</label>
		    <input type="number" class="form-control" name="number" value="<?php echo $resource['number']; ?>">
		  </div>


		  <div class="form-group">
		    <label for="">Long Text</label>
		    <textarea class="form-control"  rows="3" name="long_text"><?php echo nl2br($resource['long_text']); ?></textarea>
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Select Option</label>
		    <select class="form-control" name="select_option">

		      <option value="sid-1" <?php echo ($resource['select_option']=='sid-1')?'selected':''; ?>>option 1</option>
		      <option value="sid-2" <?php echo ($resource['select_option']=='sid-2')?'selected':''; ?>>option 2</option>
		      <option value="sid-3" <?php echo ($resource['select_option']=='sid-3')?'selected':''; ?>>option 3</option>
		      <option value="sid-4" <?php echo ($resource['select_option']=='sid-4')?'selected':''; ?>>option 4</option>
		      <option value="sid-5" <?php echo ($resource['select_option']=='sid-5')?'selected':''; ?>>option 5</option>
		    </select>
		  </div>

		  <label>Checkbox</label><br>
		  <div class="form-check">
		  	<input class="form-check-input" type="checkbox" value="cid-1" name="checkbox[]" <?php echo (in_array('cid-1',$resource['checkbox']))?'checked':'';  ?>>
		  	<label class="form-check-label" >Checkbox 1</label>
		  </div>
		  <div class="form-check">
		  	<input class="form-check-input" type="checkbox" value="cid-2" name="checkbox[]" <?php echo (in_array('cid-2',$resource['checkbox']))?'checked':'';  ?>>
		  	<label class="form-check-label" >Checkbox 2</label>
		  </div>
		  <div class="form-check">
		  	<input class="form-check-input" type="checkbox" value="cid-3" name="checkbox[]" <?php echo (in_array('cid-3',$resource['checkbox']))?'checked':'';  ?>>
		  	<label class="form-check-label" >Checkbox 3</label>
		  </div>

		  <label>Radio</label><br>
		  <div class="form-check">
			  <input class="form-check-input" type="radio" name="radio"  value="rid-1" <?php echo ($resource['radio']=='rid-1')?'checked':''; ?> >
			  <label class="form-check-label">
			    radio 1
			  </label>
		  </div>
		  <div class="form-check">
			  <input class="form-check-input" type="radio" name="radio"  value="rid-2" <?php echo ($resource['radio']=='rid-2')?'checked':''; ?>>
			  <label class="form-check-label">
			    radio 2
			  </label>
		  </div>

		  <lable>Old Image</lable><br>
		  <img src="../uploads/<?php echo $resource['file']; ?>" height="100"/>

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