<?php 
if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp= $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count =0;
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
   $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) VALUES('$post_category_id',' $post_title','  $post_author',now(),'$post_image','$post_content','$post_tags','$post_comment_count','$post_status')";
    $query_update = mysqli_query($connection , $query);
    if(!$query_update){
        die("query failed". mysqli_error($connection));
    }
    echo "<p class='text-center text-monospace text-primary'>Your post has been created <a href='./posts.php'>View All post</a></p>";
}



?>

<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    
         <div class="form-group">
             <label for="post_category">Post Categories</label>
             </br>
        <select name="post_category" id="post_category">
            
<?php 
        $query_for_id="SELECT * FROM categories";
        $edit_query = mysqli_query($connection,$query_for_id);
            
        while($row=mysqli_fetch_assoc($edit_query)){
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
        };
    
?>
        </select>
    </div>


    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        
          <label for="post_status">Post Status</label>
        </br>
        <select name="post_status">
            <option value="Active">Active</option>
            <option value="Unacive">Unactive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" id="editor" name="post_content" cols="30" rows="10"></textarea>
        <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
    </div>
    <div class="form-group">
        <input type="submit" name="create_post" value="Publish post" class=" btn btn-primary">
    </div>
</form>
