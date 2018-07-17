<?php include('init.php'); ?>

<?php include('header.php'); ?>

    <!-- Page Content -->
    <div class="container">

<div class="row">

    <?php include('sidebar.php'); ?>

    <div class="col-md-9">
        
        <div class="row carousel-holder">

            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="images/slide1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="images/slide2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="images/slide3.jpg" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>
    
        <div class="row">

            <?php
            
            $query = $db->query("SELECT * FROM oferte ORDER BY id DESC LIMIT 3");
            ?>
            <?php if($query->num_rows >= 1) : ?>
                <?php
                while ($row=$query->fetch_assoc()) : ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <?php if(strlen($row['poza'])==0)  : ?>
                                <img src="http://placehold.it/320x150" alt="">
                            <?php else: ?>
                                <img src="<?php echo $row['poza']; ?>" alt="">
                            <?php endif; ?>
                            <div class="caption">
                                <h4><a href="#"><?php echo $row['nume']; ?></a></h4>
                                <p><?php echo $row['descriere']; ?></p>
                                <h4><a href="#"><?php echo $row['pret']; ?></a></h4>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else : ?>
                <p>Nu exista posturi in aceasta categorie</p>
            <?php endif; ?>

        </div>

    </div>


</div>

</div>
<!-- /.container -->

<?php include('footer.php'); ?>