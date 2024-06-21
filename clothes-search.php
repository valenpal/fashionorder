<?php include('partials-front/navbar.php') ?>

<!-- clothes SEARCH Section Starts Here -->
<section class="clothes-search text-center">
    <div class="container">
        <?php 
            $search = isset($_POST['search']) ? $_POST['search'] : '';
        ?>
        <h2 class="text-white">
            Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a>
        </h2>
    </div>
</section>
<!-- clothes SEARCH Section Ends Here -->

<!-- clothes Menu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php 
        // Pastikan $_POST['search'] ada sebelum mengaksesnya
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        // Query SQL dengan penulisan variabel yang benar
        $sql = "SELECT * FROM tbl_clothes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row["id"];
                $title = $row["title"];
                $price = $row["price"];
                $description = $row["description"];
                $image_name = $row["image_name"];
                ?>
        <div class="clothes-menu-box">
            <div class="clothes-menu-img">
                <?php 
            if($image_name== "") {
                echo "<div class='error'>Image not available</div>";
            } else {
                ?>
                <img src="<?php echo SITEURL; ?>images/clothes/<?php echo $image_name; ?>"
                    class="img-responsive img-curve">
                <?php
            }
            ?>
            </div>

            <div class="clothes-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="clothes-price"><?php echo $price; ?></p>
                <p class="clothes-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="<?php echo SITEURL; ?>order.php?clothes_id=<?php echo $id; ?>" class="btn btn-primary">Order
                    Now</a>
            </div>
        </div>
        <?php
        } 
        } else {
            echo "<div class='error'>Clothes not found</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- clothes Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>