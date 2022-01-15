<?php

function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Error 404" . mysqli_error($connection));
    }
}
function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This Field can not be empty";
        } else
            $query = "INSERT INTO `categories`(`cat_title`) VALUES ('{$cat_title}')";
        $create_category_query = mysqli_query($connection, $query);
        if (!$create_category_query) {
            die("Query Failed" . mysqli_error($connection));
        }
    }
}
?>

<?php
function findAllCategory()
{
    global $connection;
    $query = "SELECT * FROM `categories`";
    $select_categories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
            <td><a class='btn btn-success' href='categories.php?edit={$cat_id}'>Edit</a> <a class='btn btn-danger' href='categories.php?delete={$cat_id}'>Delete</a></td>
        </tr>";
    }
}

?>

<?php
function DeleteCategory()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM `categories` WHERE `categories`.`cat_id` = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

?>