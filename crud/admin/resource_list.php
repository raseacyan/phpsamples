<?php
include("inc/header.php");
include("../inc/connect.php");
include("../inc/functions.php");

$resources = getResources($conn);

display($resources);

?>

<h1 class="mt-4">Resource List</h1>

<a href="resource_create.php" class="btn btn-primary">Add Resource</a>
    
<?php if(count($resources)): ?>

	<div class="card mb-4 mt-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                    	<th>short_text</th>
                        <th>number</th>
                        <th>long_text</th>
                        <th>select_option</th>
                        <th>radio</th>
                        <th>checkbox</th>
                        <th>file</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>short_text</th>
                        <th>number</th>
                        <th>long_text</th>
                        <th>select_option</th>
                        <th>radio</th>
                        <th>checkbox</th>
                        <th>file</th>
                        <th>action</th>
                    </tr>
                </tfoot>
                <tbody>
                	<?php foreach($resources as $resource): ?>
                	<?php
                		$checkbox_array = unserialize($resource['checkbox']);
                		$checkbox_string = implode(",",$checkbox_array);
                	?>
                    <tr>
                        <td><?php echo $resource['short_text']; ?></td>
                        <td><?php echo $resource['number']; ?></td>
                        <td><?php echo $resource['long_text']; ?></td>
                        <td><?php echo $resource['select_option']; ?></td>
                        <td><?php echo $resource['radio']; ?></td>
                        <td><?php echo $checkbox_string ; ?></td>
                        <td><?php echo $resource['file']; ?></td>
                        <td>
                        	EDIT |
                        	DELETE

                        </td>
                    </tr> 
                    <?php endforeach; ?>                        
                </tbody>
            </table>
        </div>
    </div>
	
<?php else: ?>
	<p>No Data</p>

<?php endif;?>






<?php
include("inc/footer.php");
?>