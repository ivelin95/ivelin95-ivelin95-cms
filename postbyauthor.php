<!DOCTYPE html>
<html lang="en">
<?php include"includes/header.php" ?>
<?php include"includes/db.php" ?>
<?php include"comment_count.php"?>
<body>

    <!-- Navigation -->
    <?php include"includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                        
    if(isset($_GET['author'])){
        $post_author=$_GET['author'];
       
    }
            //detect the post id and select the right post from db
                $query = "SELECT * FROM posts WHERE post_author='{$post_author}'";
                $select_posts = mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_posts)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
           
    
    
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead" >
                   All post by:  <?php echo  $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image">
                <hr>
                <p><?php echo  $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <?php } ?>

               
              
    <hr>

    <!-- Footer -->
    <?php include"includes/footer.php"?>



</html>
