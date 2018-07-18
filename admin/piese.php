<?php include("header.php") ?>
<?php
    $sql="SELECT * FROM piese";
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
                        <th>Imagine</th>
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
                            <td>
			                	<?php if(strlen($row['poza'])>0)  : ?>
	                                <img width="50" src="../<?php echo $row['poza']; ?>" alt="">
	                            <?php endif; ?> 
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