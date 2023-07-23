<?php

$user_id=isset($_GET['id']) ? $_GET['id'] :0 ;

define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DB', 'hidb');
    $con = new mysqli(HOST, USERNAME, PASSWORD, DB);
    if($con->connect_error) die($con->connect_error);
    else{
    $sql = "DELETE * FROM users WHERE user_id=$user_id";
    $resultSet = $con->query($sql);
    $rows=$resultSet->effected_rows;
    $con->close();
    if($rows == 1){
    	$_SESSION['message'] ="<div class='alert alert-success'>One user profile has been removed successfully!</div>";
    }else{
    	$_SESSION['message'] ="<div class='alert alert-danger'>Something went wrong please try after some time!</div>";
    }
    echo "<script>
                window.location.href='index.php';
        </script>";
}