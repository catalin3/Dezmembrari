<?php include ('header.php'); ?>
<?php
$error=0;
$message='';

if(count($_POST)){
	if(empty($_POST['name'])){
		$message .= 'Numele obligatoriu<br />';
		$error = 1;
	}
	if(empty($_POST['text'])){
		$message .= 'Textul obligatoriu<br />';	
		$error = 1;
	}
	if(empty($_FILES['image']['name'])){
		$message .= 'Imagine obligatoriu<br />';
		$error = 1;

	}
	if($error==0){
		$tmp_name = $_FILES['image']['tmp_name'];
		$name = $_FILES['image']['name'];
		$destination = 'images/'.$name;
		move_uploaded_file($tmp_name, '../'.$destination);
		$sql="INSERT INTO posts (name,`text`,date_added,image) VALUES ('".$_POST['name']."','".$_POST['text']."',NOW(),'".$destination."')";
		$query1=$db->query($sql);
			if($query1){
			echo $div3;
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
					<input type="text" name="name" class="form-control">
				</div>
				 <div class="form-group">
					<label>Text:</label>
					<textarea class="form-control" rows="5" name="text"></textarea>
				</div>
				 <div class="form-group">
					<label>Imagine:</label>
					<input type="file" name="image" class="form-control">
				</div>
				 <div class="form-group">
					<label>Categorie:</label>
					 <select name="cat_id" class="form-control">
					 <?php while($row = $sql->fetch_assoc()) : ?>
				        <option value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
			        <?php endwhile; ?>
				    </select>
				</div>
				<button type="submit" name="submit" class="btn btn-default">Adauga</button>
			</form>
		</div>
	</div>
</div>


<?php include ('footer.php'); ?>
