<?php 

  
function escape($string){
global $connectin;
return mysqli_real_escape_string($connection , trim($string));

};

  function user_online(){
    global $connection;
    $session = session_id();
    $time = time();
    $time_out_in_sec= 60;
    $time_out = $time - $time_out_in_sec; 

    $query="SELECT * FROM users_online WHERE session = '$session'";
    $query_users_on=mysqli_query($connection ,$query);
    $count = mysqli_num_rows($query_users_on);
        
        if($count == NULL){
            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");
        } else{
            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'"); 
        }
    $users_online_query = mysqli_query($connection , "SELECT * FROM users_online WHERE time > '$time_out'");
     return $count_user=mysqli_num_rows($users_online_query);
}
        
    

function insert_categories(){
     global $connection;
if(isset($_POST['submit'])){
    $cat_title= $_POST['cat_title'];
    if($cat_title == ""|| empty($cat_title)){
    echo"this field should not be empty";
        }else {
            $query ="INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
            $create_category = mysqli_query($connection,$query);
            if(!$create_category){
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    };                               
}

function findAllCategories (){
    global $connection;
    $query="SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_categories)){
$cat_id = $row["cat_id"];
$cat_title = $row["cat_title"];
echo"<tr>";
echo"<td>$cat_id</td>";
echo"<td>$cat_title</td>";
echo"<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
 echo"<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
                }
}

function deleteCat(){
    global $connection;
    if(isset($_GET['delete'])){
     $delete=$_GET['delete'];
     $query="DELETE FROM categories WHERE cat_id={$delete} ";
     $delete_cat=mysqli_query($connection,$query);
     header("Location: categories.php");
 }
}
?> 