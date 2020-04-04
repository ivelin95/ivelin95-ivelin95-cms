<?php include"../comment_count.php"?>
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
             <th>Delete</th>
             <th>Approve</th>
             <th>Unapprove</th>

         </tr>
     </thead>
     <tbody>
         <?php // select all comments form DB
       $query = "SELECT * FROM comments";
       $query_select = mysqli_query($connection,$query);
       while($row=mysqli_fetch_assoc($query_select)){
           $comment_id = $row["comment_id"];
           $comment_post_id=$row["comment_post_id"];
           $comment_author=$row["comment_author"];
           $comment_email =$row['comment_email'];
           $comment_content = $row["comment_content"];
           $comment_status=$row['comment_status'];
           $comment_date = $row['comment_date'];
          
                             
           echo "<tr>";
           echo "<td>   $comment_id</td>";
           echo "<td> $comment_author</td>";
           echo "<td> $comment_content</td>";
            echo "<td> $comment_email</td>";
           ?>
              
         <?php
           echo "<td>$comment_status</td>";
          //relating comment to posts
           $query_to_posts = "SELECT * FROM posts WHERE post_id= $comment_post_id";
           // selecting
           $query_to_db=mysqli_query($connection,$query_to_posts);
           while($select=mysqli_fetch_assoc($query_to_db)){
            $post_id=$select['post_id'];   
            $post_title=$select['post_title']; 
            echo "<td><a href='../post.php?pst_id=$post_id'> $post_title</a></td>";   
           }
           
           
            echo "<td> $comment_date</td>";
            
            echo "<td><a href='comments.php?delete= $comment_id'>Delete</a></td>";
             echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
            echo "</tr>";  
       
                }
                               
        //approve / unapprove comments
         if(isset($_GET['approve'])){
             $approve_comment=$_GET['approve'];
             $approve_comment_query ="UPDATE comments SET comment_status = 'approve' WHERE comment_id =$approve_comment ";
             $query_to_db= mysqli_query($connection, $approve_comment_query);
              header("Location: comments.php");
         }
         
         
           if(isset($_GET['unapprove'])){
             $unapprove_comment=$_GET['unapprove'];
             $unapprove_comment_query ="UPDATE comments SET comment_status = 'unapprove' WHERE comment_id =$unapprove_comment ";
             $query_to_db= mysqli_query($connection, $unapprove_comment_query);
                header("Location: comments.php");
         }
         
      
         
         //delete comments
 
        commentCountMinus()
         
         
         
?>

     </tbody>
 </table>
