<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approved</th>
            <th>Unapproved</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>


        <?php

        $query = "SELECT * FROM `comments`";
        $select_comments = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];


            echo "<tr>";
            echo    "<td>{$comment_id}</td>";
            echo    "<td>{$comment_author}</td>";
            echo    "<td>{$comment_content}</td>";


            // $query = "SELECT * FROM `categories` WHERE `cat_id`={$post_category_id}";
            // $slecte_categories_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($slecte_categories_id)) {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];
            // echo    "<td>{$cat_title}</td>";
            //}



            echo    "<td>{$comment_email}</td>";
            echo    "<td>{$comment_status}</td>";


            $query = "SELECT * FROM `posts` WHERE `posts`.`post_id`=$comment_post_id";
            $fetching_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($fetching_post_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
            }



            echo    "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";






            echo    "<td>{$comment_date}</td>";

            echo   " <td><a class='btn btn-success' href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo    "<td><a class='btn btn-danger' href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
            echo    "<td><a class='btn btn-danger' href='comments.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <?php
        //this the approve functonality
        if (isset($_GET['approve'])) {
            $the_comment_id = $_GET['approve'];
            $query = "UPDATE `comments` SET `comment_status`='Approved' WHERE `comments`.`comment_id`=$the_comment_id";
            $unapproved_comment_query = mysqli_query($connection, $query);
            header("Location: comments.php");
        }


        ?>
        <?php
        //this the unapprove functonality
        if (isset($_GET['unapprove'])) {
            $the_comment_id = $_GET['unapprove'];
            $query = "UPDATE `comments` SET `comment_status`='Unapproved' WHERE `comments`.`comment_id`=$the_comment_id";
            $unapproved_comment_query = mysqli_query($connection, $query);
            header("Location: comments.php");
        }


        ?>

        <?php
        // his is the deleting functionality
        if (isset($_GET['delete'])) {
            $the_comment_id = $_GET['delete'];
            $query = "DELETE FROM `comments` WHERE `comments`.`comment_id` = {$the_comment_id}";
            $delete_comment = mysqli_query($connection, $query);
            header("Location: comments.php");
        }


        ?>

    </tbody>
</table>