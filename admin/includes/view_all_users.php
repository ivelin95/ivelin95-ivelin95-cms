<?php include"../comment_count.php"?>
<table class="table table-bordered table-hover">
     <thead>
         <tr>
             <th>Id</th>
             <th>Username</th>
             <th>Firtsname</th>
             <th>Lastname</th>
             <th>Email</th>
             <th>Role</th>
             <th>Delete</th>
             <th>Edit</th>
             

         </tr>
     </thead>
     <tbody>
<?php //display users from db;
$query = "SELECT * FROM users";
$query_select = mysqli_query($connection , $query);
    while($users = mysqli_fetch_assoc($query_select)){
        $id = $users['user_id'];
        $username = $users['username'];
        $user_firstname = $users['user_firstname'];
        $user_lastname = $users['user_lastname'];
        $user_email=$users['user_email'];
        $user_role = $users['user_role'];
        
        echo "<tr>";
        echo "<td> $id</td>";
        echo "<td> $username</td>";
        echo "<td> $user_firstname</td>";
        echo "<td>$user_lastname</td>";
         echo "<td> $user_email</td>";
        echo "<td>$user_role</td>";
        echo "<td><a href='users.php?delete=$id'>Delete</a></td>";
         echo "<td><a href='users.php?source=edit_users&edit_users=$id'>Edit</a></td>";
        echo "<td><a href='users.php?Admin=$id'>Admin</a></td>";
        echo "<td><a href='users.php?User=$id'>User</a></td>";
        echo "</tr>";
    }
        if(isset($_GET['delete'])){
            $user_id=$_GET['delete'];
            $query_delete_user ="DELETE FROM users WHERE user_id = $user_id";
            $querydelete=mysqli_query($connection,$query_delete_user);
            header('location: users.php');
        } 

         if(isset($_GET['Admin'])){
            $user_id=$_GET['Admin'];
           $select_query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id ";
             $query_admin=mysqli_query($connection,$select_query);
            header('location: users.php');
        } 
  if(isset($_GET['User'])){
            $user_id=$_GET['User'];
           $select_query = "UPDATE users SET user_role = 'User' WHERE user_id = $user_id ";
         $query_user=mysqli_query($connection,$select_query);
            header('location: users.php');
        } 
         
         ?>
     </tbody>
 </table>
