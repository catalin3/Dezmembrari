<?php include ("header.php") ?>
<?php
$sql = "SELECT * FROM categorii";
$myData = $db->query($sql);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Table
        <div class="pull-right"><a href="add_categorie.php"><i class="fa fa-plus"></i> Adauga</a></div>
    </div>
<div class="panel-body">
	<div class="dataTable_wrapper">
	    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	        <thead>
	        	<tr>
	                <th>Nume</th>
	            	<th>Actiuni</th>
	            </tr>
	        </thead>
	     	<tbody>
	     		<?php while($row=$myData->fetch_assoc()) :?>
	     			<tr class="odd gradeX" data-id="<?php echo $row['id']; ?>"> 
	     				<td><?php echo $row['nume']; ?></td>  
	     				<td class="text-center delete" >
                            <a href="#"><i class="fa fa-trash"></i></a>
	     				    <a href="edit_categorie.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="color: green;"></i></a>
	     				</td>
		            </tr>
		        <?php endwhile; ?>
		    </tbody>
	    </table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".delete .fa-trash").click(function(){
			id= $(this).closest('tr').data('id');
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
					type:"POST",
					data:{"delete_categoria": id},
					url: 'ajax.php',
					success: function(result){
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

<?php include ("footer.php"); ?>
