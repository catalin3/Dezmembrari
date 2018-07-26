<div class="col-md-3">
    <p class="lead">Categorii</p>
    <div class="list-group">
        <?php
        $query = $db->query("SELECT * FROM categorii");
        ?>
        <?php if($query->num_rows >= 1) : ?>
            <?php while ($row = $query->fetch_assoc()) : ?>
                <a href="categorySell.php?id=<?php echo $row['id']; ?>" class="list-group-item"><?php echo $row['nume']; ?></a>
            <?php endwhile; ?>
        <?php endif; ?>
        <!--<a href="dictionary.php" class="list-group-item">Dictionar</a>-->
        <!--<a href="articles.php" class="list-group-item">Articole</a>-->
    </div>
</div>