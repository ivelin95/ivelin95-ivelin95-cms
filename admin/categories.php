<?php include"includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
   <?php include"includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                     
 
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Subheading</small>
                        </h1>
    
                        <div class="col-xs-6 ">
                            <?php  insert_categories(); ?>
                            <form action="" method="post">
                                <div class="form_group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                    </div>
                                <div class="form_group">
                                    <input class="btn btn-primary" type="submit" value="Add Category" name="submit">
                                </div>
                            </form>
                           <?php 
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                             include"includes/update_categories.php";
                            }
                            ?>
                         
                            
                        </div>
                        <div class="col-xs-6 ">
                                <table class=" table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- /display info from DB -->
                                        <?php
                                        findAllCategories();
                                        //delete categories from db
                                        deleteCat();
                                        ?>
                                    </tbody>
                                </table>
                            
                </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include"includes/admin_footer.php"?>;
