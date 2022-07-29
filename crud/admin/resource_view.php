<?php

include("inc/header.php");
include("../inc/connect.php");
include("../inc/functions.php");

$id = isset($_GET['id'])? $_GET['id'] : 0 ;

$resource = getResourceById($id, $conn);

$resource['checkbox'] = unserialize($resource['checkbox']);

//display($resource);




?>


<h1 class="mt-4"><?php echo $resource['short_text']; ?></h1>



<p>
 <img src="../uploads/<?php echo $resource['file']; ?>" height="100"/>
</p>

<p>
 <?php echo $resource['long_text']; ?>
</p>

<p>
 Numbeer: <?php echo $resource['number']; ?>
</p>



<p>
 Selected Option: <?php echo $resource['select_option']; ?>
</p>

<p>
 Radio Option: <?php echo $resource['radio']; ?>
</p>

<ul>
<?php foreach($resource['checkbox'] as $element): ?>
	<li><?php echo $element; ?></li>
<?php endforeach; ?>
</ul>





<?php include("inc/footer.php"); ?>