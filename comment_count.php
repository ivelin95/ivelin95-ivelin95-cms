<?php 
function commentCount(){
     //comment count +
    global $connection;
    global $first_post_id;
     if(isset($_POST['post_comment'])){
                  $first_post_id =$_GET['pst_id'];
                $comment_author= $_POST['author'];
                    $comment_email= $_POST['email'];
                    $comment= $_POST['comment'];
         if (!empty($comment_author) && !empty($comment_email) && !empty($comment)) {         
     $query_comment = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES('$first_post_id', '$comment_author', '$comment_email', '$comment', 'unapproved', now())";
    $query=mysqli_query($connection, $query_comment);
    $query_comment_count= "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $first_post_id " ;
$query_count = mysqli_query($connection ,$query_comment_count);
         } else {
             echo "<script> alert('Fields cannot be empty')</script>";
         }
   };                   
                
};

function commentCountMinus(){
    global $connection;
           if(isset($_GET['delete'])){
             $delete_comment=$_GET['delete'];
             $select_from_comments = "SELECT*FROM comments WHERE comment_id=$delete_comment";
            $select_from_comments_query=mysqli_query($connection,$select_from_comments);
            while($row=mysqli_fetch_assoc($select_from_comments_query)){
               $comment_post_id=$row['comment_post_id']; 
            }
            
             //comment count - (minus)
             $query_comment_count= "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $comment_post_id ";
                
             $query_countt = mysqli_query($connection ,$query_comment_count);
                
              $delete_query = "DELETE FROM comments WHERE comment_id = {$delete_comment}";
            $delete_selected_comment= mysqli_query($connection,$delete_query);
             header("Location: comments.php");
             if(!$query_countt){
                die("QUERY FAILED" . mysqli_error($connection));
            };
            
         };
         
};
?>