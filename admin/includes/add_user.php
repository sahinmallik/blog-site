<?php

if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];

    // $post_date = date('d-m-y');

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    // $query = "INSERT INTO `users`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`,`post_comment_count`, `post_status`) VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}',0,'{$post_status}')";

    $query = "INSERT INTO `users`(`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `role`, `randSalt`) VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','','{$user_role}','')";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);
    if ($create_user_query) {
        echo "<div class='alert alert-success' role='alert'>
            User created successfully!!!
          </div>";
    }
}

?>





<form action="users.php?source=add_user" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <select name="user_role" id="">

            <option value="subscriber">Select Role</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>


        </select>
    </div>
    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>