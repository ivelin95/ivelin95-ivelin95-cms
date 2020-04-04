<?php 

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'cms';

//make const for sEcurity reasons
foreach($db as $key => $value){
   define(strtoupper($key), $value); 
};
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


/* checking connection/ if($connection){
    echo 'connection success';
}else{
    echo'connection failed';
}

*/
?>