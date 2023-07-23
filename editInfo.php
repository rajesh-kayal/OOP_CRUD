<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
</head>
<body>
	<?php
      $user_id=isset($_GET['id']) ? $_GET['id'] : 0;
      define("HOST","127.0.0.1");
       define("USERNAME","root");
       define("PASSWORD","");
       define("DB","hidb");
       $user=[];
       $con = new MySQLi(HOST,USERNAME,PASSWORD,DB);
       if($con->connect_error) die($con->connect_error);
       else {
       	$sql="SELECT * FROM users WHERE user_id = $user_id";
       	$resultSet=$con->query($sql);
       	if($rows =$resultSet->fetch_assoc()){
       		  $user =[
                  'NAME'  => $rows['name'],
                  'PHONE' => $rows['phone'],
                  'EMAIL' => $rows['email'],
                  'PASS1' => $rows['pass']
              ];
       	}
       	$con->close();
       }
	?>
	<div class="container">
		<header class='modal-header'>
			<h1>Edit User</h1>
			<form method="post" action="update.php">
				<div class="form-group">
    		<label>Name :</label>
    		<input type="text" name="editName" required class="form-control" value="<?php echo $user['NAME'];?>">
    	</div>
    	<div class="form-group">
    		<label>Phone :</label>
    		<input type="number" name="editPhone" required class="form-control" value="<?php echo $user['PHONE'];?>">
    	</div>
    	<div class="form-group">
    		<label>Email :</label>
    		<input type="text" name="editEmail" required class="form-control" value="<?php echo $user['EMAIL'];?>">
    	</div>
    	<details>
    		<summary><h4>Click Here to Change Password:</h4></summary>
    		<fieldset>
    			<legend>
    				<h5>Change password Wizard: </h5>
    			</legend>

    		<div class="form-group">
    		<label>Old Password:</label>
    		<input type="password" name="oldPassword" class="form-control" >
    	</div>
    	 <div class="form-group">
    		<label>New Password:</label>
    		<input type="password" name="oldPassword" class="form-control" >
    		<input type="hidden" name="hid" value="<?php echo $user_id; ?>">
    	</div>
    </fieldset>
   </details>
			<div class="form-group">
    		<button class="btn btn-sm btn-outline-info">Update</button>
    	</div>
			</form>
			
		</header>
		
	</div>
</body>
</html>