<?php
session_start();
function generateHashPass($pass){
    $hashPass=password_hash($pass,PASSWORD_DEFAULT);
    return $hashPass;
}
// echo"<pre>";
// print_r($_POST);
// print_r($_FILES);
$name =$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['pass'];
$hashPass=generateHashPass($pass);

//image
$fileName=time()."_".$_FILES['avatar']['name'];
$fileTmp=$_FILES['avatar']['tmp_name'];
$upload='./upload/'.$fileName;
move_uploaded_file($fileTmp,$upload);

define("HOST", "localhost");
define("USERNAME", "root");
define("PASS", '');
define("DB", "crud");
$con = new mysqli(HOST, USERNAME, PASS, DB);
if ($con->connect_error)
    die($con->connect_error);
    else{
    $sql= "INSERT INTO `form`(`name`, `email`, `phone`, `image`, `password`) VALUES ('$name','$email','$phone','$hashPass','$upload')";
    $resultSet=$con->query($sql);
    if($rows=$con->affected_rows == 1){
     echo $_SESSION['massege']="Data Inserted Successfully";
     header('Location:form.php');
    }else{
    echo $_SESSION['massege'] = "Data NotInserted!";
    header('Location:form.php');
    }
    }