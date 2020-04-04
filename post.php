<!DOCTYPE html>
<html lang="en">
<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link href="includes/style_nav.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
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
                        
    if(isset($_GET['pst_id'])){
        $first_post_id =$_GET['pst_id'];
        $query_views="UPDATE posts SET post_views= post_views + 1 WHERE post_id = $first_post_id";
        $query_update_views= mysqli_query($connection , $query_views);
         if(!$query_update_views){
                die("QUERY FAILED" . mysqli_error($connection));
            };
    }
            //detect the post id and select the right post from db
                $query = "SELECT * FROM posts WHERE post_id=$first_post_id";
                $select_posts = mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_posts)){
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
                    <a href="#"><?php echo $post_title ?></a>
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

                <!-- Blog Comments -->
                <?php //query to server and insert the comment into DB
               
                     commentCount();
                
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        <div class="form-group">
                            <label for="author">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="post_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- display Comments -->

                <?php 
$query_com=" SELECT * FROM comments WHERE comment_post_id = $first_post_id AND comment_status = 'approve' ORDER BY comment_id DESC ";
$query_select_com=mysqli_query($connection, $query_com);
                
        while($query_fetch=mysqli_fetch_assoc($query_select_com)){
          $author =$query_fetch['comment_author'];
          $date = $query_fetch['comment_date'];
          $content = $query_fetch['comment_content'];
       // $comment_id = $query_fetch['$comment_id'];     
      
    ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body"><?php echo $date; ?>
                        <h4 class="media-heading">
                            <small><?php echo $author; ?></small>
                        </h4>
                        <?php echo $content; ?>
                        
                    </div>
                </div>
                <?php }  ?>

                <!-- End Nested Comment -->


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
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include"includes/footer.php"?>



</html>
