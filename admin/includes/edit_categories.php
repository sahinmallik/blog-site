<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Update categories</label>

        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM `categories` WHERE `cat_id`={$cat_id}";
            $slecte_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($slecte_categories_id)) {
                $cat_title = $row['cat_title'];

        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="cat_title">
        <?php
            }
        }
        ?>
        <?php

        if (isset($_POST['update_category'])) {
            $the_cat_title = $_POST['cat_title'];
            $query = "UPDATE `categories` SET `cat_title`='{$the_cat_title}' WHERE `categories`.`cat_id` = {$cat_id}";
            $update_query = mysqli_query($connection, $query);
        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>