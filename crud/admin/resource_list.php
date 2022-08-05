<?php
include("inc/header.php");
include("../inc/connect.php");
include("../inc/functions.php");

$resources = getResources($conn);



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
                        <!--<th>id</th>-->
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
                        <!--<th>id</th>-->
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
                        <!--<td><?php echo $resource['id']; ?></td>-->
                        <td><a href="resource_view.php?id=<?php echo $resource['id']; ?>"><?php echo $resource['short_text']; ?></a></td>
                        <td><?php echo $resource['number']; ?></td>
                        <td><?php echo $resource['long_text']; ?></td>
                        <td><?php echo $resource['select_option']; ?></td>
                        <td><?php echo $resource['radio']; ?></td>
                        <td><?php echo $checkbox_string ; ?></td>
                        <td><?php echo $resource['file']; ?></td>
                        <td>
                        	<a href="resource_update.php?id=<?php echo  $resource['id']; ?>" class="btn btn-primary btn-sm btn-block mb-2">Edit</a>
                        	<form action="resource_delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $resource['id']; ?>"/>
                                <button  class="btn btn-danger btn-sm btn-block" >Delete</button>
                            </form>

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