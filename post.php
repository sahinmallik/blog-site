<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
            }

            $query = "SELECT * FROM `posts` WHERE `posts`.`post_id`= $the_post_id ";
            $select_all_posts_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php } ?>

            <!-- Blog Comments -->
            <?php
            if (isset($_POST['create_comment'])) {
                $the_post_id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                $query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','Unapproved',now())";
                $creat_comment_query = mysqli_query($connection, $query);
                if (!$creat_comment_query) {
                    die('error' . mysqli_error($connection));
                }
                $query = "UPDATE `posts` SET `post_comment_count`=`post_comment_count`+1 WHERE `posts`.`post_id` = $the_post_id";
                $update_comment_count = mysqli_query($connection, $query);
                if (!$update_comment_count) {
                    die('error' . mysqli_error($connection));
                }
            }



            ?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <input placeholder="Name" class="form-control" type="text" name="comment_author">
                    </div>
                    <div class="form-group">
                        <input placeholder="Email" class="form-control" type="email" name="comment_email">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Type your comment...." class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php
            $query = "SELECT * FROM `comments` WHERE `comments`.`comment_post_id`={$the_post_id} AND `comments`.`comment_status`='Approved' ORDER BY `comments`.`comment_id` DESC";
            $select_comment_query = mysqli_query($connection, $query);
            if (!$select_comment_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
            ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

            <?php }
            ?>
            <!-- Comment -->


            <!-- Comment -->



        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<?php include "includes/footer.php"; ?>