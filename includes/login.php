<?php include"db.php";?>
<?php session_start() ?> 
<?php 
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
    //escape bad symbols for secuity reasons
 $username = mysqli_real_escape_string($connection ,$username);
 $password =  mysqli_real_escape_string($connection ,$password);
    
  //query to server and select the userinfo
    $query = "SELECT * FROM users WHERE username =  '{$username}' ";
    $query_select = mysqli_query($connection,$query);
        
    if(!$query_select){
        die("query failed". mysqli_error($connection));
    }
    
    // take userinfo from DB 
    while($row=mysqli_fetch_assoc($query_select)){
        $db_user = $row['user_id'];
        $db_username=$row['username'];
        $db_firstname=$row['user_firstname'];
        $db_lastname=$row['user_lastname'];
        $db_password=$row['user_password'];
        $db_role=$row['user_role'];
        
    }
   
     $password = crypt($password, $db_password);
   
    //check User
    if($db_username == $username && $password== $db_password){
    $_SESSION['username']= $db_username;   
    $_SESSION['firstname']=  $db_firstname;  
    $_SESSION['lastname']= $db_lastname;  
    $_SESSION['role']= $db_role;
    $_SESSION['user_id']= $db_user;
        
header("location: ../admin/index.php");
            
    } else{
        
     
        header("location: ../index.php");
    }
}
                                                                                                                                                                                                                                                             

?>