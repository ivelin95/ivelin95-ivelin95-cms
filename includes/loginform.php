<!DOCTYPE html>

 <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
     <link href="style_nav.css" rel="stylesheet">
       <link href="change_colors.css" rel="stylesheet">
      <script src="../js/jquery.js"></script>
   
<html lang="en">

<style type="text/css">
    
.form_box {
    /* left: 261px; */
    border-color: beige;
    display: block;
    width: 47%;
    position: relative;
    /* left: 26%; */
    border-style: ridge;
    border-width: 8px;
    margin-left: auto;
    margin-right: auto;
}
    }
    .form{
          
  
}
    .input-group{
        font-size: 20px;
    padding-left: 28%;
    margin-top: 2px;
    padding-top: 2%;
    text-align: center;
    }
    #btn{
        width: 40%;
         margin-left: 1%;
         margin-top: 10%;
    }


</style>


<?php include"login.php" ?>


    <body>
        <?php include"navigation.php" ?>
        <div class="form_box">
                    <form class="form" method="post" action="login.php">
                        <div class="input-group">
                            <label for="username">Username</label>
                                <input placeholder="Enter username" name="username" type="text" class="form-control">
                                    </div>
                                        <br/>
                        <div class="input-group"> 
                            <label for="username">Password</label>
                             <input placeholder="Enter password" name="password" type="password" class="form-control">
                            <br>
                        
                            <input type="submit" name="submit" class=" btn btn-primary" value="Login" id="btn"/>
                        </div>
                        
                            </div>
                    </form>
        </body>

</html> 
