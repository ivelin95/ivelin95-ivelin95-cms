<?php  include "includes/db.php"; ?>
<?php  include "includes/navigation.php"; ?>
 


    <!-- Navigation -->
    
 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link href="includes/style_nav.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
<?php 
if(isset($_POST['submit'])){
  
$username = mysqli_real_escape_string ($connection,$_POST['username']); 
$password = mysqli_real_escape_string ($connection,$_POST['password']);
$email = mysqli_real_escape_string ($connection,$_POST['email']);


    if (!empty($username)&& !empty($password) && !empty($email)) { 
        $randQuery= "SELECT randSalt FROM users";
        $query_select = mysqli_query($connection , $randQuery);
        
        $rand=mysqli_fetch_array($query_select);
        $randSalt = $rand['randSalt'];
        $password = crypt($password,$randSalt);
        
         
$regQuery= "INSERT INTO users(username,user_password,user_email) VALUES('$username','$password','$email')";
$query_registration = mysqli_query($connection , $regQuery);
            if(!$query_registration){
                die("query failed". mysqli_error($connection));
            } 
    $msg =  "<p class='text-center text-monospace text-primary'>your account has been created<p>";  
        
    }else{
        $msg = "<p class='text-center text-monospace text-primary'>Fields cannot be empty<p>"; 
    }
    
}else{
    $msg= '';
}




?>


    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                     <?php echo $msg  ?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                           
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-secondary btn-lg btn-block" value="Register">
                        
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
