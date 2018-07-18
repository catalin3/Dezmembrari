<?php include ('header.php') ?>
<?php
if(count($_POST)):
	$query = false;
	if(empty($_POST['nume'])) : ?>
        <div class="alert alert-danger">
            Numele obligatoriu
        </div>
    <?php else :
        $query=$db->query("UPDATE categorii SET nume='".$_POST['nume']."' WHERE id=".$_GET['id']);
	endif;
	if($query == true): ?>
	<div class="alert alert-success">
		Categorie <?php echo $_POST['nume']; ?> adaugata
	</div>
	<?php endif; ?>
<?php endif; ?>
<?php if(isset($_GET['id'])):
$sql=$db->query("SELECT * FROM `categorii` WHERE id=".$_GET['id']);
$row=$sql->fetch_assoc();
?>
<div class="panel panel-default">
	    <div class="panel-heading">
	        Table
	    </div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
		    	<form method="post" class="col-md-6" enctype="multipart/form-data">
		    	<div class="form-group">
			    		<label>Categorie:</label>
				    	<input type="text" class="form-control" name="nume" value="<?php echo  $row['nume']; ?>">
				    </div>
				<button type="submit" class="btn btn-default">Edit</button>
		    	</form>
		    	</div>
 		</div>
	</div>
<?php else : ?>
	Nu este setat id-ul!
<?php endif; ?>
<?php include ('footer.php') ?>