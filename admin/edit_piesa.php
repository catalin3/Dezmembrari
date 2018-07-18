<?php include ("header.php"); ?>
<?php

if(count($_POST)) {
	$errros = array();
	if(empty($_POST['nume'])) {
		$errors[] = 'Numele este obligatoriu';
	}
	if(empty($_POST['descriere'])) {
		$errors[] = 'Descrierea este obligatorie';
	}
	/*if(empty($_POST['image'])){
		$errors[] = 'Imaginea este obligatorie';
	}*/
	if(empty($_POST['id_cat'])){
		$errors[]='Selectia categoriei este obligatorie';
	}

	if(empty($errors)) :
		$tmp_name = $_FILES['poza']['tmp_name'];
		$name = $_FILES['poza']['name'];
		$destination = 'images/'.$name;
		move_uploaded_file($tmp_name, '../'.$destination);
		$query=$db->query("UPDATE piese SET nume='".$_POST['nume']."',id_cat='".$_POST['id_cat']."',descriere='".$_POST['descriere']."',pret='".$_POST['pret']."', poza='".$destination."' WHERE id = ".$_GET['id']);

		if($query == true) : ?>
			<div class="alert alert-success">
				Post adaugat
			</div>
		<?php endif; ?>	
	<?php else : ?>
		<div class="alert alert-danger">
			<?php foreach($errors as $value) : ?>
				<p><?php echo $value; ?></p>
			<?php endforeach; ?>
		</div> 	

	<?php endif; 

}
if(isset($_GET['id'])) : 

	$sql= $db->query("SELECT * FROM `piese` WHERE id = ".$_GET['id']);
	$row = $sql->fetch_assoc();
	$sql1= $db->query("SELECT * FROM `categorii`");
	?>
	
	<div class="panel panel-default">
	    <div class="panel-heading">
	        Table
	    </div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
		    	<form method="post" class="col-md-6" enctype="multipart/form-data">
			    	<div class="form-group">
			    		<label>Nume:</label>
				    	<input type="text" class="form-control" name="nume" value="<?php echo  $row['nume']; ?>">
				    </div>
			    	<div class="form-group">
			    		<label>Descriere:</label>
						<textarea class="form-control" rows="5" name="descriere"><?php echo $row['descriere']; ?></textarea>
					</div>
					<div class="form-group">
			    		<label>Pret:</label>
						<input type="text" class="form-control" name="pret" value="<?php echo  $row['pret']; ?>">
					</div>
					<div class="form-group">
			    		<label>Imgine:</label>
						<input type="file"  class="form-control" name="poza">
						<img src="../<?php echo $row['poza']; ?>" width="50" />
					</div>
					 <div class="form-group">
						<label>Categorie:</label>
						<select name="id_cat" class="form-control">
							 <?php while($row1 = $sql1->fetch_assoc()) : ?>
						        <option value="<?php echo $row1['id']; ?>"  <?php if($row1['id'] == $row['id_cat']) : ?> selected <?php endif; ?> ><?php echo $row1['nume']; ?></option>
					        <?php endwhile; ?>
					    </select>
					</div>
					<button type="submit" class="btn btn-default">Edit</button>
				</form>
	     	</div>
 		</div>
	</div>
<?php else: ?>
	<h2>Nu e setat id-ul</h2>
<?php endif; ?>
<?php include ("footer.php"); ?>

