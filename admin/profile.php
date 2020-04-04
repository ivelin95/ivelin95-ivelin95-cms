<?php include"includes/admin_header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include"includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Subheading</small>
                    </h1>

    
        
            
<?php //we take the username from the session and then make query to DB/
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $query_select = mysqli_query($connection ,$query);
      
        while($row=mysqli_fetch_assoc($query_select)){
         $user_id = $row['user_id'];
        $user_name = $row['username'];
        $user_passowrd = $row['user_password'];   
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role = $row['user_role'];
        }
        
    }
?>
                    <?php //update user info
       if(isset($_SESSION['user_id'])){
           $user_id =$_SESSION['user_id'];
              if(isset($_POST['update'])){
        
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['user_role'];
        
        $query = "UPDATE users SET username = '{$username}', user_password = '{$password}',user_firstname = '{$first_name}', user_lastname = '{$last_name}', user_email = '{$email}', user_role = '{$role}' WHERE user_id = {$user_id}";
        $query_update=mysqli_query($connection , $query);
                  $query = mysqli_query($connection,$query);
        if(!$query){
            die('querry fail' .mysqli_error($connection));
        }
    }
 
           
       
    }   
       
       
       ?>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $user_name ;?>">
    </div>
     <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $user_firstname ;?>">
    </div>
   
    <div class="form-group">
        <label for="author">Last Name</label>
        <input type="text" class="form-control" name="last_name"value="<?php echo $user_lastname ;?>">
    </div>
    
     <div class="form-group">
        <select class="mdb-select md-form" name="user_role" >
             
                <option value="Admin"><?php echo $user_role ;?></option>
            <?php   
            if ($user_role == "Admin"){
               echo"<option value='User'>User</option>";
            }else {
                echo " <option value='Admin'>Admin</option>";
            }
                ?>
        </select>
         
        </div>
   
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $user_email ;?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $user_passowrd ;?>">
    </div>
    <div class="form-group">
        <input type="submit" name="update" value="Update profile" class=" btn btn-primary">
    </div>
</form>



                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include"includes/admin_footer.php"?>
