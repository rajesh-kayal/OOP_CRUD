<?php

$user_id=$_POST['hid'];

   $filename = time()."_".$_FILES['editAvatar']['name'];
   $fileTmp = $_FILES['editAvatar']['tmp_name'];
   $fileSize = $_FILES['editAvatar']['size'];//bytes
   $fileType = $_FILES['editAvatar']['type'];

   $imagePath='./uploads/'.$filename;
 if($fileType =='image/jpeg' || $fileType=='image/png' || $fileType=='image/gif'){
   	if($fileSize<=100*1024){
   		move_uploaded_file($fileTmp,$imagePath);

   	define("HOST",'127.0.0.1');
    define("USERNAME","root");
    define("PASSWORD","");
    define("DB","hidb");

    $con = new MySQLi(HOST,USERNAME,PASSWORD,DB);
    if($con->connect_error) die($con->connect_error);
    else {
    	$sql="SELECT profile_pic FROM users WHERE user_id=$user_id";
    	$resultSet=$con->query($sql);
    	if($rows= $resultSet->fetch_assoc()){
    		$oldImagePath=$rows['profile_pic'];
    		unlink($oldImagePath);
    		$sql2="UPDATE FROM users SET profile_pic=$imagePath WHERE user_id = $user_id";
    		$con->query($sql);
    		$rows= $con->affected_rows;
    		if($rows ==1){
    			            $_SESSION['message']="<div class='alert alert-success'>User Profile Picture has been changed Successfully!</div>";
    			        }else{
    			        	            $_SESSION['message']="<div class='alert alert-danger'>Unable to changed Profile at this movement..</div>";
    			        }
    			        $con->close();
    	echo "<script>
                window.location.href='index.php';
        </script>";      
    	}
   	}
   }
}
   