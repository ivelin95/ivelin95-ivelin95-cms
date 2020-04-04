<!DOCTYPE html>

<html lang="en">
 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link href="includes/style_nav.css" rel="stylesheet">
       <link href="includes/change_colors.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
   

<?php include"includes/login.php" ?>

<body class="new_style">

    <!-- Navigation -->
    <?php include"includes/navigation.php"?>
    <link href="includes/style_nav.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <?php
                $post_per_page=5;
                $query = "SELECT * FROM posts ";
                $select_posts = mysqli_query($connection,$query);
                $count = mysqli_num_rows($select_posts);
                $count = ceil($count/ $post_per_page);
                
                 if(isset($_GET['page'])){
                 $page = $_GET['page'];   
                     }else {
                     $page="";
                 }
                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }else{
                        $page_1 = ($page * $post_per_page)-$post_per_page;
                    }
                    
                    
                
                $query = "SELECT * FROM posts WHERE post_status='active' LIMIT $page_1,$post_per_page ";
                $select_posts = mysqli_query($connection,$query);
                $count_active = mysqli_num_rows($select_posts);
               
                
    
               
                    
                
              if($count_active == 0){
                 echo "<h2>NO RESULT</h2>";
                    }else{
                 while($row=mysqli_fetch_assoc($select_posts)){
                    $post_id= $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    $post_status =$row['post_status'];
                    
            
                ?>



                <!-- First Blog Post -->
                <h2>

                    <a href="post.php?pst_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="postbyauthor.php?author=<?php echo $post_author ?>"><?php echo  $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?pst_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image"></a>
                <hr>
                <p><?php echo  $post_content ?></p>
                <a class="btn btn-primary" href="post.php?pst_id=<?php echo $post_id ?>">Read More</a>

                <?php //close the while loop and check the post status
                 }
                    }
                
                ?>

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <?php 
                        for($i= 1; $i<=$count ; $i++){
                            if($i == $page){
                            echo "<li><a id='active' href='index.php?page=$i'>{$i}</a></li>";
                            }else{
                            echo "<li><a href='index.php?page=$i'>{$i}</a></li>";
                                }
                        }
                    ?>
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