

<form method="post" action=""> 
<table class="table table-bordered table-hover">
    <div class="col-xs-4">
        <select class="form-control" id="" name="select_option">
            <option value="">Select option</option>
            <option value="Active">Active</option>
            <option value="Unactive">Unactive</option>
            <option value="Copy">Copy</option>
            <option value="Reset_Views">Reset Views</option>
        </select>
    </div> 
    <div class="col-xs-4">
        <input type="submit" class="btn btn-primary" value="Apply"/>
        <a class="btn btn-primary" href="posts.php?source=add_posts">Add New<a>
    </div>
     
     <thead>
         <tr>
             <th><input type="checkbox" id="mainBox"></th>
             <th>Id</th>
             <th>Author</th>
             <th>Title</th>
             <th>Category</th>
             <th>Status</th>
             <th>Image</th>
             <th>Tags</th>
             <th>Comments</th>
             <th>Date</th>
             <th>Edit</th>
             <th>Delete</th>
             <th>Views</th>

         </tr>
     </thead>
     <tbody>
         <?php 
       $query = "SELECT * FROM posts";
       $query_select = mysqli_query($connection,$query);
       while($row=mysqli_fetch_assoc($query_select)){
           $post_id = $row["post_id"];
           $post_author=$row["post_author"];
           $post_title=$row["post_title"];
           $post_category_id =$row['post_category_id'];
           $post_status = $row["post_status"];
           $post_image=$row['post_image'];
           $post_tags = $row['post_tags'];
           $post_comment_count =$row['post_comment_count'];
           $post_date =$row['post_date'];
           $post_views = $row['post_views'];                 
           echo "<tr>";
           ?>
           
            <td><input type='checkbox' name='checkBoxArray[]' class="box" value='<?php echo  $post_id; ?>'></td>
            
         <?php
           echo "<td> $post_id</td>";
           echo "<td> $post_author</td>";
           echo "<td>$post_title</td>";
        
           ?>
               <?php //query to categories table
           $query_for_id="SELECT * FROM categories WHERE cat_id = $post_category_id ";
            $edit_query = mysqli_query($connection,$query_for_id);
            while($row=mysqli_fetch_assoc($edit_query)){
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];
           echo "<td>$cat_title</td>";
            }
                ?>
         <?php
           echo "<td>$post_status</td>";
           echo "<td><img width='100px' src='../images/$post_image' alt='image'></td>";
           echo "<td> $post_tags</td>";
           echo "<td><a href='../post.php?pst_id={$post_id}'> $post_comment_count<a></td>";
            echo "<td> $post_date</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete') \" href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "<td> $post_views</td>";
            echo "</tr>";  
       
                }
                               
  
         //delete posts
         if(isset($_GET['delete'])){
             $delete_post=$_GET['delete'];
             $delete_query = "DELETE FROM posts WHERE post_id = {$delete_post}";
             $delete_selected_posts = mysqli_query($connection,$delete_query);
            header("Location: posts.php");
             if(!$delete_selected_posts){
                die("QUERY FAILED" . mysqli_error($connection));
            }
         }
         
         
         
         
?>
<?php if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $checkBox){
    
   $selectOption = $_POST['select_option'];
    
    switch ($selectOption){
        case 'Active':
            $query = "UPDATE posts SET post_status= '{$selectOption}' WHERE post_id = {$checkBox} ";
            $query_update = mysqli_query($connection , $query);
               header("Location: posts.php");
             if(!$query_update){
                die("QUERY FAILED" . mysqli_error($connection));
            }
            break;
         case 'Unactive':
            $queryto = "UPDATE posts SET post_status= '{$selectOption}' WHERE post_id = {$checkBox} ";
            $query_for_update = mysqli_query($connection , $queryto);  
               header("Location: posts.php");
               break;
            
         case 'Copy':
            $query_copy= "SELECT * FROM posts WHERE post_id ={$checkBox}";
            $query_get = mysqli_query($connection ,$query_copy);
             while($row=mysqli_fetch_assoc($query_get)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];
                    $post_comment_count =$row['post_comment_count'];
    
             }
             $query_clone="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) VALUES('$post_category_id',' $post_title',' $post_author',now(),'$post_image','$post_content','$post_tags','$post_comment_count','$post_status')";
            $query_clon = mysqli_query($connection , $query_clone);
               header("Location: posts.php");
             if(!$query_clon){
                 die("QUERY FAILED" . mysqli_error($connection));
}
            break;
              
        case 'Reset_Views':
             
            $query = "UPDATE posts SET post_views = 0 WHERE post_id = {$checkBox} ";
            $query_update = mysqli_query($connection , $query);
               header("Location: posts.php");
             if(!$query_update){
                die("QUERY FAILED" . mysqli_error($connection));
            }
            break;
            
           
    }
  }
} 


?> 
  <script>
   
</script>
     </tbody>
 </table>
</form>