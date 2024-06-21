<?php include('partials-front/navbar.php') ?>

<?php 
    if(isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row["title"];
    } else {
        header('location:'.SITEURL);
    }
?>

<!-- clothes sEARCH Section Starts Here -->
<section class="clothes-search text-center">
    <div class="container">
        <h2 class="text-white">Clothes on <a href="<?php echo $category_title; ?>" class="text-white">"Category"</a>
        </h2>
    </div>
</section>
<!-- clothes sEARCH Section Ends Here -->

<!-- clothes MEnu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php 
        $sql2 = "SELECT * FROM tbl_clothes WHERE category_id=$category_id";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        if ($count2 > 0) {
            while ($row2 = mysqli_fetch_assoc($res2)) {
                $id = $row2["id"];
                $title = $row2["title"];
                $price = $row2["price"];
                $description = $row2["description"];
                $image_name = $row2["image_name"];
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
        echo "<div class='error'>Clothes not available</div>";
    }
    ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- clothes Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>