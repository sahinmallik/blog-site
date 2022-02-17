<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Change Role</th>
            <th>Delete</th>
    </thead>
    <tbody>


        <?php

        $query = "SELECT * FROM `users`";
        $select_users = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['role'];


            echo "<tr>";
            echo    "<td>{$user_id}</td>";
            echo    "<td>{$username}</td>";
            echo    "<td>{$user_firstname}</td>";


            // $query = "SELECT * FROM `categories` WHERE `cat_id`={$post_category_id}";
            // $slecte_categories_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($slecte_categories_id)) {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];
            // echo    "<td>{$cat_title}</td>";
            //}



            echo    "<td>{$user_lastname}</td>";
            echo    "<td>{$user_email}</td>";
            echo    "<td>{$user_role}</td>";


            // $query = "SELECT * FROM `posts` WHERE `posts`.`post_id`=$comment_post_id";
            // $fetching_post_query = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($fetching_post_query)) {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];
            // }



            // echo    "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";








            echo   " <td><a class='btn btn-success' href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
            echo   " <td><a class='btn btn-success' href='users.php?change_role_admin=$user_id'>Admin</a> <a class='btn btn-success' href='users.php?change_role_subs=$user_id'>Subscriber</a></td>";
            echo    "<td><a class='btn btn-danger' href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <?php
        //this the approve functonality
        if (isset($_GET['change_role_admin'])) {
            $the_user_id = $_GET['change_role_admin'];
            $query = "UPDATE `users` SET `role`='Admin' WHERE `users`.`user_id`=$the_user_id";
            $change_role_admin_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }


        ?>
        <?php
        //this the unapprove functonality
        if (isset($_GET['change_role_subs'])) {
            $the_user_id = $_GET['change_role_subs'];
            $query = "UPDATE `users` SET `role`='Subscriber' WHERE `users`.`user_id`=$the_user_id";
            $change_role_subs_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }


        ?>

        <?php
        // his is the deleting functionality
        if (isset($_GET['delete'])) {
            $the_user_id = $_GET['delete'];
            $query = "DELETE FROM `users` WHERE `users`.`user_id` = {$the_user_id}";
            $delete_comment = mysqli_query($connection, $query);
            header("Location: users.php");
        }


        ?>

    </tbody>
</table>