<?php include('partials-front/navbar.php') ?>
<!-- clothes search Section Starts Here -->
<section class="clothes-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>clothes-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for any clothes.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- Clothes Search Section Ends Here -->

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Clothes</h2>

        <?php 
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
        <a href="<?php echo SITEURL; ?>category-clothes.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <?php
                    if($image_name=="") {
                        echo "<div class='error'>Image not available</div>";
                    } else {
                        ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"
                    class="img-responsive img-curve">
                <?php
                }
                ?>

                <h3 class="float-text text-color text-center"><?php echo $title; ?></h3>
            </div>
        </a>
        <?php
                }
            } else {
                echo'<div class="error">Catergory not Added</div>';
            }
        ?>


        <div class=" clearfix">
        </div>
    </div>
    <p class="text-center underline">
        <a href="categories.php">See All Categories</a>
    </p>
</section>
<!-- Categories Section Ends Here -->



<!-- Clothes MEnu Section Starts Here -->
<section class="clothes-menu">
    <div class="container">
        <h2 class="text-center">Clothes Menu</h2>

        <?php 
             $sql2 = "SELECT * FROM tbl_clothes WHERE active='Yes' AND featured='Yes' LIMIT 6";
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

    <p class="text-center underline">
        <a href="clothes.php">See All Clothes</a>
    </p>
</section>
<!-- clothes Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>