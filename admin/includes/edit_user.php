<?php
if (isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];
}



$query = "SELECT * FROM `users` WHERE `users`.`user_id` = {$the_user_id}";
$select_users_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_users_by_id)) {
    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
}
if (isset($_POST['update_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "UPDATE `users` SET `username`='{$username}',`user_password`='{$user_password}',`user_firstname`='{$user_firstname}',`user_lastname`='{$user_lastname}',`user_email`='{$user_email}',`role`='{$user_role}' WHERE `users`.`user_id`=$the_user_id";

    $update_query = mysqli_query($connection, $query);
    confirm($update_query);
    header("Location:users.php");
}



?>




<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
    </div>
    <div class="form-group">
        <select name="user_role" id="">

            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
            <?php
            if ($user_role == 'admin') {

                echo '<option value="subscriber">Subscriber</option>';
            } else {
                echo '<option value="admin">Admin</option>';
            }
            ?>

        </select>
    </div>
    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="text" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Edit User">
    </div>
</form>