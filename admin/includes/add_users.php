<?php 
if(isset($_POST['add_user'])){
    
    $username = $_POST['username'];
    $user_password = $_POST['password'];
    $user_firstname = $_POST['first_name'];
    $user_lastname = $_POST['last_name'];
     $user_email = $_POST['email'];
     
   $user_role = $_POST['user_role'];
  
    
   
   $query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_role) VALUES('$username','$user_password','  $user_firstname','$user_lastname','$user_email','$user_role')";
    $query_update = mysqli_query($connection , $query);
    if(!$query_update){
        die("query failed". mysqli_error($connection));
    }
    echo "User Created:".""."<a href='./users.php'>View all Users</a>";
}



?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>

    
        
            
<?php 
       /*$query_for_id="SELECT * FROM categories";
        $edit_query = mysqli_query($connection,$query_for_id);
            
        while($row=mysqli_fetch_assoc($edit_query)){
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
        };
   */ 
?>
        
   
    <div class="form-group">
        <label for="author">Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>
    <div class="form-group">
        <label for="post_status">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
     <div class="form-group">
        <select class="mdb-select md-form" name="user_role">
                <option disabled selected>Choose your option</option>
                <option>Admin</option>
                <option>User</option>
        </select>
         
        </div>
   
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <input type="submit" name="add_user" value="Add user" class=" btn btn-primary">
    </div>
</form>
