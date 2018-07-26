<?php include('init.php'); ?>

<?php include('header.php'); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php include('sidebar.php'); ?>

        <div class="col-md-9">

                <?php
                $query = $db->query("SELECT * FROM piese WHERE id_cat=". $_GET['id']);
                ?>
                <?php if($query->num_rows >= 1) : ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Table
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Nume</th>
                                        <th>Descriere</th>
                                        <th>Pret</th>
                                        <th>Poza</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row=$query->fetch_assoc()) : ?>
                                            <tr class="odd gradeX" data-id="<?php echo $row['id']; ?>">
                                                <td><?php echo $row['nume']; ?></td>
                                                <td><?php echo $row['descriere'];?></td>
                                                <td><?php echo $row['pret'];?></td>
                                                <td>
                                                <div class="col-sm-4 col-lg-6 col-md-2">
                                                    <div class="thumbnail">
                                                        <?php if(strlen($row['poza'])==0)  : ?>
                                                            <img src="http://placehold.it/320x150" alt="">
                                                        <?php else: ?>
                                                            <img src="<?php echo $row['poza']; ?>" alt="">
                                                        <?php endif; ?>
			                	                    </div>
                                                </div> 
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    <p>Nu exista cuvinte in aceasta categorie</p>
                <?php endif; ?>

            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<?php include ("footer.php"); ?>