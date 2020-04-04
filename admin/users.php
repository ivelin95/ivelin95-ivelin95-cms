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

                    <?php 
if(isset($_GET['source'])){
    $source = $_GET['source'];
} else {
     $source = '';
}
    switch($source){
        case 'add_users';
       include "includes/add_users.php";
        break;
        case 'edit_users';
       include "includes/edit_users.php";    
        default: 
        include "includes/view_all_users.php";
        break;
    
}


?>

                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include"includes/admin_footer.php"?>
