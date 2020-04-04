<?php session_start(); ?>
<?php include "../includes/db.php"?>
<?php include "functions.php"?>
<?php ob_start(); ?>
<?php //check for session
if(!isset($_SESSION['role'])){
  
        header("Location: ../index.php");
} else if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
    if($role != 'Admin'){
        header("Location: ../index.php");
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<!--text editor -->


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <script src="css/script.js"></script>

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/loader.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
