<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                </div>
            </div>

            <div class="col-xs-6">
                <?php
                insert_categories();

                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="cat-title">Add categories</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                    </div>
                </form>

                <?php //Update code of the category
                if (isset($_GET['edit'])) {
                    $cat_id = $_GET['edit'];
                    include "includes/edit_categories.php";
                }
                ?>

            </div>
            <!-- add category form-->

            <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Add Categories Query
                        findAllCategory();
                        ?>

                        <?php
                        // Delete Category Query
                        DeleteCategory();
                        ?>
                    </tbody>
                </table>


            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>