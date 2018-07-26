<?php include('init.php'); ?>

<?php include('header.php'); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php include('sidebar.php'); ?>

        <div class="col-md-9">

                <?php
                $query = $db->query("SELECT * FROM vanzari WHERE id_cat=". $_GET['id']);
                ?>
                <?php if($query->num_rows >= 1) : ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Piese
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Descriere</th>
                                        <th>Pret</th>
                                        <th>Imagini</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row=$query->fetch_assoc()) : ?>
                                            <tr class="odd gradeX" data-id="<?php echo $row['id']; ?>">
                                                <td class="col-md-4">
                                                    <h4  style="font-weight: bold;"><?php echo $row['nume']; ?></h4>
                                                    <hr/>
                                                    <?php echo "Cod Piesa:" .$row['id']; ?>
                                                    <br/>
                                                    <a  style="font-weight: underline;">Descriere:</a>
                                                    <?php echo $row['descriere'];?>
                                                </td>
                                                <td class="col-sm">
                                                    <?php echo $row['pret'];?>
                                                    <?php echo $row['moneda'];?>   
                                                </td>
<!-- ************************************************************************************************************************************************************ -->
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
                                                                    echo "<div class=\"item active\"><img class=\"slide-image\" src=\"".$row['image1']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image2']=="images/" or $row['image2']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image2']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image3']=="images/" or $row['image3']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image3']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image4']=="images/" or $row['image4']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image4']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image5']=="images/" or $row['image5']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image5']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image6']=="images/" or $row['image6']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image2']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image7']=="images/" or $row['image7']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image2']."\" alt=\"\"></div>";
                                                                }

                                                                if (!($row['image8']=="images/" or $row['image8']=="")){
                                                                    echo "<div class=\"item\"><img class=\"slide-image\" src=\"".$row['image2']."\" alt=\"\"></div>";
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

<script>
function getPhotos(){
    $divPoze = 
}
</script>