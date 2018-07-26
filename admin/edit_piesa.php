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
		$tmp_name1 = $_FILES['poza1']['tmp_name'];
		$name1 = $_FILES['poza1']['name'];
		$destination1 = 'images/'.$name1;
		move_uploaded_file($tmp_name1, '../'.$destination1);		//image1

		$tmp_name2 = $_FILES['poza2']['tmp_name'];
		$name2 = $_FILES['poza2']['name'];
		$destination2 = 'images/'.$name2;
		move_uploaded_file($tmp_name2, '../'.$destination2);		//image2

		$tmp_name3 = $_FILES['poza3']['tmp_name'];
		$name3 = $_FILES['poza3']['name'];
		$destination3 = 'images/'.$name3;
		move_uploaded_file($tmp_name3, '../'.$destination3);		//image3

		$tmp_name4 = $_FILES['poza4']['tmp_name'];
		$name4 = $_FILES['poza4']['name'];
		$destination4 = 'images/'.$name4;
		move_uploaded_file($tmp_name4, '../'.$destination4);		//image4

		$tmp_name5 = $_FILES['poza5']['tmp_name'];
		$name5 = $_FILES['poza5']['name'];
		$destination5 = 'images/'.$name5;
		move_uploaded_file($tmp_name5, '../'.$destination5);		//image5

		$tmp_name6 = $_FILES['poza6']['tmp_name'];
		$name6 = $_FILES['poza6']['name'];
		$destination6 = 'images/'.$name6;
		move_uploaded_file($tmp_name6, '../'.$destination6);		//image6

		$tmp_name7 = $_FILES['poza7']['tmp_name'];
		$name7 = $_FILES['poza7']['name'];
		$destination7 = 'images/'.$name7;
		move_uploaded_file($tmp_name7, '../'.$destination7);		//image7

		$tmp_name8 = $_FILES['poza8']['tmp_name'];
		$name8 = $_FILES['poza8']['name'];
		$destination8 = 'images/'.$name8;
		move_uploaded_file($tmp_name8, '../'.$destination8);		//image8

		//$query=$db->query("UPDATE piese SET nume='".$_POST['nume']."',id_cat='".$_POST['id_cat']."',descriere='".$_POST['descriere']."',pret='".$_POST['pret']."', poza='".$destination."' WHERE id = ".$_GET['id']);
		$query=$db->query("UPDATE vanzari SET nume='".$_POST['nume']."',id_cat='".$_POST['id_cat']."',descriere='".$_POST['descriere']."', pret='".$_POST['pret']."', moneda='".$_POST['moneda']."', image1='".$destination1."', image2='".$destination2."', image3='".$destination3."', image4='".$destination4."', image5='".$destination5."', image6='".$destination6."', image7='".$destination7."', image8='".$destination8."' WHERE id = ".$_GET['id']);
		
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

	$sql= $db->query("SELECT * FROM `vanzari` WHERE id = ".$_GET['id']);
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
			    		<label>Moneda:</label>
						<input type="text" class="form-control" name="moneda" value="<?php echo  $row['moneda']; ?>">
					</div>
					<div class="form-group">
			    		<label>Imgine1:</label>
						<input type="file"  class="form-control" name="poza1">
						<img src="../<?php echo $row['image1']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine2:</label>
						<input type="file"  class="form-control" name="poza2">
						<img src="../<?php echo $row['image2']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine3:</label>
						<input type="file"  class="form-control" name="poza3">
						<img src="../<?php echo $row['image3']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine4:</label>
						<input type="file"  class="form-control" name="poza4">
						<img src="../<?php echo $row['image4']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine5:</label>
						<input type="file"  class="form-control" name="poza5">
						<img src="../<?php echo $row['image5']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine6:</label>
						<input type="file"  class="form-control" name="poza6">
						<img src="../<?php echo $row['image6']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine7:</label>
						<input type="file"  class="form-control" name="poza7">
						<img src="../<?php echo $row['image7']; ?>" width="50" />
					</div>
					<div class="form-group">
			    		<label>Imgine8:</label>
						<input type="file"  class="form-control" name="poza8">
						<img src="../<?php echo $row['image8']; ?>" width="50" />
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

