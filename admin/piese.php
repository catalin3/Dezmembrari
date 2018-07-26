<?php include("header.php") ?>
<?php
    $sql="SELECT * FROM vanzari";
    $myData=$db->query($sql);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Table
        <div class="pull-right">
            <a href="add_piesa.php">
                <i class="fa fa-plus"></i>
                Adauga
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Descriere</th>
                        <th>Pret</th>
                        <th>Moneda</th>
                        <th>Imagini</th>
                        <th>Categorie</th>
                        <th>Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($myData)) : ?>
                        <tr class="odd gradeX" data-id="<?php echo $row['id']; ?>">
                            <td><?php echo $row['nume']; ?></td>
                            <td><?php echo $row['descriere']; ?></td>
                            <td><?php echo $row['pret']; ?></td>
                            <td><?php echo $row['moneda']; ?></td>
                            <td class="col-md-7">
                                                    <div class="col-md-10">
                                                        <div id="<?php echo $row['id']; ?>" class="carousel slide" data-interval="false">
                                                        <ol class="carousel-indicators">
                                                            
                                                            <?php 
                                                            $aux = $row['image1'];
                                                            $i = 0;
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>" class="active"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image2'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image3'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image4'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image5'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image6'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image7'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>"></li>
                                                            <?php $i = $i + 1;endif; ?>
                                                            <?php 
                                                            $aux = $row['image8'];
                                                            if (!($aux == "images/" or $aux == "")): ?>
                                                                <li data-target="#<?php echo $row['id'];?>" data-slide-to="<?php echo $i; ?>1"></li>
                                                            <?php endif; ?>
                                                        </ol>

<!-- ........................................................................................................................................................... -->

                                                        <div class="carousel-inner">
                                                            <?php
                                                                if (!($row['image1']=="images/" or $row['image1']=="")){
                                                                    echo "<div class=\"item active\"><img class=\"slide-image\" src=\"../".$row['image1']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image2']=="images/" or $row['image2']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image2']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image3']=="images/" or $row['image3']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image3']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image4']=="images/" or $row['image4']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image4']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image5']=="images/" or $row['image5']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image5']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image6']=="images/" or $row['image6']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image2']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image7']=="images/" or $row['image7']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image2']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image8']=="images/" or $row['image8']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"../".$row['image2']."\" alt=\"\"></div>";
                                                                }
                                                            ?>
                                                        </div>
<!-- ************************************************************************************************************************************************************ -->

                                                        <a class="left carousel-control" href="#<?php echo $row['id']; ?>" data-slide="prev">
                                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                                        </a>
                                                        <a class="right carousel-control" href="#<?php echo $row['id']; ?>" data-slide="next">
                                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                                        </a>
                                                        </div>
                                                    </div>
                            </td>
                            <td>
                                <?php
                                    $id_cat = $row['id_cat'];
                                    $sqlP="SELECT nume FROM categorii WHERE id=$id_cat";
                                    $myDataP=$db->query($sqlP);
                                    $rowP=mysqli_fetch_assoc($myDataP);
                                    echo $rowP['nume'];
                                ?>
                            </td>
                            <td class="text-center delete">
                                <a href="#"><i class="fa fa-trash"></i></a>
                                <a href="edit_piesa.php?id=<?php echo $row['id'];?>">
                                    <i class="fa fa-edit" style="color: green;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
	$(".delete .fa-trash").click(function(){
		id = $(this).closest('tr').data('id');
		swal({   
			title: "Esti sigur??",  
			text: "You will not be able to recover this imaginary file!",
			type: "warning",  
			showCancelButton: true, 
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Da",  
			cancelButtonText: "Cancel",  
			closeOnConfirm: false, 
			closeOnCancel: false 
		}, 
		function(isConfirm){  
			if (isConfirm) {    
				swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
				$.ajax({
					type: "POST",
					data: {"delete_piesa": id},
					url: 'ajax.php',
					success: function(result) {
						$('tr[data-id='+id+']').remove();
					},
					error: function(result) {
						console.log(result);
					}
				});
			} else {   
				swal("Cancelled", "Your imaginary file is safe :)", "error"); 
			} 
	    });
	})
    });
</script>
<?php include("footer.php");