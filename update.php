<?php
session_start();
  function generateHashPass($pass1){
        $hashPass = password_hash($pass1, PASSWORD_DEFAULT);
        return $hashPass;
   }
 //   print '<pre>';
 // print_r($_POST);
   $hid         = $_POST['hid'];
  $editName    = $_POST['editName'];
  $editPhone   = $_POST['editPhone'];
  $editEmail   = $_POST['editEmail'];

  $editNewPass= $_POST['newPass'];
  $editPassword = $_POST['oldPassword'];

  define("HOST","127.0.0.1");
       define("USERNAME","root");
       define("PASSWORD","");
       define("DB","hidb");

  $con = new MySQLi(HOST,USERNAME,PASSWORD,DB);
  if(empty($editPassword)){
  	$sql="UPDATE `users` SET `name`='$editName',`phone`='$editPhone',`email`='$editEmail' WHERE user_id=$hid";
  }else{
  	$sql2="SELECT pass FROM users WHERE email='$editEmail'";
  	$resultSet=$con->query($sql2);
    if($rows = $resultSet->fetch_assoc()){
    	$oldPass =$rows['pass'];
    	$check =password_verify($editPassword, $oldPass);
    	if($check){
    		$sql="UPDATE `users` SET `name`='$editName',`phone`='$editPhone',`email`='$editEmail' WHERE user_id=$hid";
    }else{
    	$_SESSION['message']="<div class='alert alert-danger'>Invalid Old password!</div>";
    	echo "<script>
                 window.location.href='index.php';
          </script>";
    }
	}

  }

  if($con->connect_error) die($con->connect_error);
  else{
  	$con->query($sql);
  	 $rows = $con->affected_rows;
       $con->close();

       if($rows ==1){
           $_SESSION['message']="<div class='alert alert-success'>User profile successfully Updated....</div>";
       }else{
          $_SESSION['message'] ="<div class='alert alert-danger'>Unable to update ! Soething went wrong !</div>"; 
       }
  }
  echo "
  	<script>
  	window.location.href='index.php';
  	</script>
  ";
