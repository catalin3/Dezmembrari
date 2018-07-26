<?php include ('header.php'); ?>
<?php
    $error=0;
    $message='';
    if(count($_POST)){
        if(empty($_POST['nume'])){
            $message .='Numele este obligatoriu<br/>';
            $error=1;
        }
        /*
        if(empty($_POST['descriere'])){
            $message.='Descrierea este obligatorie<br/>';
            $error=1;
        }*/
        if(empty($_POST['pret'])){
            $message.='Pretul este obligatoriu<br/>';
            $error=1;
        }
        if(empty($_POST['id_cat'])){
            $message.='Categoria este obligatorie<br/>';
            $error=1;
        }
        if($error==0){
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
            //$sql="INSERT INTO oferte (nume,descriere,data_adaugarii,poza) VALUES ('".$_POST['nume']."','".$_POST['descriere']."',NOW(),'".$destination."')";
            $sql="INSERT INTO vanzari (nume,id_cat,descriere,pret,moneda,image1,image2,image3,image4,image5,image6,image7,image8) VALUES ('".$_POST['nume']."','".$_POST['id_cat']."','".$_POST['descriere']."','".$_POST['pret']."','".$_POST['moneda']."','".$destination1."','".$destination2."','".$destination3."','".$destination4."','".$destination5."','".$destination6."','".$destination7."','".$destination8."')";
            $query1=$db->query($sql);
                if($query1){
                echo "Piesa adaugata cu succes!";
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
					<label>Moneda:</label>
					<input type="text" name="moneda" class="form-control">
				</div>
				<div class="form-group">
					<label>Imagine1:</label>
					<input type="file" name="poza1" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine2:</label>
					<input type="file" name="poza2" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine3:</label>
					<input type="file" name="poza3" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine4:</label>
					<input type="file" name="poza4" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine5:</label>
					<input type="file" name="poza5" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine6:</label>
					<input type="file" name="poza6" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine7:</label>
					<input type="file" name="poza7" class="form-control">
				</div>
                <div class="form-group">
					<label>Imagine8:</label>
					<input type="file" name="poza8" class="form-control">
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