<?php
if (isset($_GET['edit_users'])) {
    $the_post_id = $_GET['edit_users'];
}
 
$query_id = "SELECT * FROM users WHERE user_id = $the_post_id";
$select_user = mysqli_query($connection,$query_id);
while ($row = mysqli_fetch_assoc($select_user)) {
    $user_id = $row['user_id'];
    $password = $row["user_password"];
    $username = $row['username'];
    $firstname = $row['user_firstname'];
    $lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $email= $row['user_email'];
    
   
};
  


// if add user button is clicked
if (isset($_POST['update_user'])) {
   $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name= $_POST['first_name'];
    $last_name = $_POST['last_name'];
     $email = $_POST['email'];
     $user_role = $_POST['user_role'];
    
    
        $randQuery= "SELECT randSalt FROM users";
        $query_select = mysqli_query($connection , $randQuery);
        $rand=mysqli_fetch_array($query_select);
        $randSalt = $rand['randSalt'];
        $password = crypt($password,$randSalt);
   
$query_to_server = "UPDATE users SET username = '{$username}',user_password = '{$password}',user_firstname = '{$first_name}', user_lastname = '{$last_name}', user_email = '{$email}', user_role = '{$user_role}' WHERE user_id = {$the_post_id}";
    $query = mysqli_query($connection,$query_to_server);
        if(!$query){
            die('querry fail' .mysqli_error($connection));
        }


};
    



?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $firstname; ?>">
    </div>

    
    <div class="form-group">
        <label for="author">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $lastname; ?>" >
    </div>
    <div class="form-group">
        <label for="post_status">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" >
    </div>
     <div class="form-group">
        <select class="mdb-select md-form" name="user_role">
                <option disabled selected>Choose your option</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
        </select>
         
            </div>
   
    <div class="form-group">
        <label for="post_tags" >Email</label>
        <input type="text" class="form-control" value="<?php echo $email; ?>" name="email">
    </div>
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" value="<?php echo $password; ?>" name="password">
    </div>
    <div class="form-group">
        <input type="submit" name="update_user" value="Update user" class=" btn btn-primary">
    </div>
</form>

