<?php include ('header.php'); ?>
<?php
$error=0;
$message='';

if(count($_POST)){
	if(empty($_POST['nume'])){
		$message .= 'Numele obligatoriu<br />';
		$error = 1;
	}
	if(empty($_POST['descriere'])){
		$message .= 'Descrierea obligatorie<br />';	
		$error = 1;
	}
	if(empty($_POST['pret'])){
		$message .= 'Pret obligatoriu<br />';	
		$error = 1;
	}
	/*
	if(empty($_FILES['poza']['nume'])){
		$message .= 'Imagine obligatorie<br />';
		$error = 1;

	}*/
	if($error==0){
		$tmp_name = $_FILES['poza']['tmp_name'];
		$name = $_FILES['poza']['name'];
		$destination = 'images/'.$name;
		move_uploaded_file($tmp_name, '../'.$destination);
		//$sql="INSERT INTO oferte (nume,descriere,data_adaugarii,poza) VALUES ('".$_POST['nume']."','".$_POST['descriere']."',NOW(),'".$destination."')";
		$sql="INSERT INTO oferte (id_cat,nume,descriere,pret,poza) VALUES ('".$_POST['id_cat']."','".$_POST['nume']."','".$_POST['descriere']."','".$_POST['pret']."','".$destination."')";
		$query1=$db->query($sql);
			if($query1){
			echo "Oferta adaugata cu succes!";
			}
	}else{
		echo '<div class="alert alert-danger">
				'.$message.'
		</div>';
	}
}
$sql= $db->query("SELECT * FROM `categorii`");
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
					<input type="text" name="nume" class="form-control">
				</div>
				<div class="form-group">
					<label>Descriere:</label>
					<textarea class="form-control" rows="5" name="descriere"></textarea>
				</div>
				<div class="form-group">
					<label>Pret:</label>
					<input type="text" name="pret" class="form-control">
				</div>
				 <div class="form-group">
					<label>Imagine:</label>
					<input type="file" name="poza" class="form-control">
				</div>
				 <div class="form-group">
					<label>Categorie:</label>
					 <select name="id_cat" class="form-control">
					 <?php while($row = $sql->fetch_assoc()) : ?>
				        <option value="<?php echo $row['id']; ?>" ><?php echo $row['nume']; ?></option>
			        <?php endwhile; ?>
				    </select>
				</div>
				<button type="submit" name="submit" class="btn btn-default">Adauga</button>
			</form>
		</div>
	</div>
</div>

<?php include ('footer.php'); ?>
