<!DOCTYPE html>
<html lang="en">
<?php include"includes/header.php" ?>
<?php include"includes/db.php" ?>
<body>

    <!-- Navigation -->
    <?php include"includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
        <?php
    if(isset($_GET['cat_id'])){
        $catid=$_GET['cat_id'];
    }
                $query = "SELECT * FROM posts WHERE post_category_id =$catid";
                $select_posts = mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_posts)){
                    $post_id= $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    
                ?>
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?pst_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo  $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image">
                <hr>
                <p><?php echo  $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    
                <?php } ?>
    
                <hr>
               
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            

               <?php include"includes/sidebar.php"?>

                <!-- Side Widget Well -->
                
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
 <?php include"includes/footer.php"?>

   

</html>
