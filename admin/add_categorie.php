<?php include('header.php') ?>
<?php
$div='<div class="alert alert-danger">
				Numele obligatoriu
	</div>';
if(count($_POST)):
	$query = false;
	if (empty($_POST['nume'])) {
		echo $div;
	}else{
		$query=$db->query("INSERT INTO categorii(nume) VALUES ('".$_POST['nume']."') ");
	}
	if($query == true) : ?>
		<div class="alert alert-success">
			Categorie adaugata
		</div>
	<?php endif; ?>
<?php endif; ?>	

<div class="panel panel-default">
    <div class="panel-heading">
        Table
    </div>
	<div class="panel-body">
		<div class="dataTable_wrapper">
		    <form method="post" class="col-md-6" enctype="multipart/form-data">
			    <div class="form-group">
					<label>Categorie:</label>
					<input type="text" name="nume" class="form-control">
				</div>
				<button type="submit" name="submit" class="btn btn-default">Adauga</button>
			</form>
		</div>
	</div>
</div>

<?php include('footer.php') ?>
