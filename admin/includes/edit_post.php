<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment = $row['post_comment_count'];
    $post_date = $row['post_date'];
}


// if update post button is clicked
if (isset($_POST['update_post'])) {
     $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];


    move_uploaded_file($post_image_temp, "../images/{$post_image}");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

    }


   
            
$query_to_server = "UPDATE posts SET post_author = '{$post_author}',post_title = '$post_title', post_category_id = '$post_category_id', post_date = now(), post_status = '$post_status', post_tags = '$post_tags', post_content = '$post_content', post_image = '$post_image 'WHERE post_id = $the_post_id";
    $query = mysqli_query($connection,$query_to_server);
        if(!$query_to_server){
            die('querry fail' .mysqli_error($connection));
        };

echo "<p class='text-center text-monospace text-primary'>Your post has been updated <a href='./posts.php'>View All post</a></p>";
};
    


?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo  $post_title ?>" class="form-control" name="title">
    </div>

    <div class="form-group">
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
        <input type="text" value="<?php echo  $post_author ?>" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
            <select name='post_status'>
                <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
                <?php 
                    if($post_status == 'active'){
                        echo "<option value='inactive'>Inactive</option>";
                    }else {
                        echo "<option value='active'>active</option>";
                    }
                
                ?>
        
        
            </select>
    </div>
     <div class="form-group">
        <label for="post_image">Post Image</label>
         <img width='100px' src='../images/$post_image' alt='image'>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags ?>" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="update_post" value="Update post" class=" btn btn-primary">
    </div>
</form>
