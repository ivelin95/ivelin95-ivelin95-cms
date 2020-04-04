<form action="" method="post">
                                <div class="form_group">
                                    <label for="cat_title">Update</label>
                                    
<?php  //update categories
if(isset($_GET['edit'])){
 $edit_cat=$_GET['edit'];
 $query_for_id="SELECT * FROM categories WHERE cat_id = $edit_cat ";
 $edit_query = mysqli_query($connection,$query_for_id);
    while($row=mysqli_fetch_assoc($edit_query)){
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];
?>
                            
<input class="form-control" type="text" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" name="update">
 <?php }} ?> 
                            
</div>
    <div class="form_group">
        <input class="btn btn-primary" type="submit" value="Update" name="update_categories">
    </div>
</form>

<?php 
if(isset($_POST['update'])){
  $update_cat = $_POST['update'];
    $query_update="UPDATE categories SET cat_title = '{$update_cat}' WHERE cat_id ='{$cat_id}'";
    $edit_query = mysqli_query($connection,$query_update);
     if(!$edit_query){
         die('query failed' . mysqli_error($connection));
     }
}

?>