<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript">
        addEventListener('load',function(){
            document.getElementById('changePic').style.display='none';

        });
        function showUploadControls(){
            document.getElementById('changePic').style.display='block';
        }
    </script>
    <title>View</title>
</head>

<body>
    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $user = [];
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DB', 'hidb');
    $con = new mysqli(HOST, USERNAME, PASSWORD, DB);
    $sql = "SELECT * FROM users WHERE user_id=$id";
    $resultSet = $con->query($sql);
    while ($rows = $resultSet->fetch_assoc()) {
        $created = strtotime($rows['created']);
        $customDate = date('d-m-y h:m:sA', $created);
        $user = [
            'ID' =>$rows['user_id'],
            'NAME' => $rows['name'],
            'PHONE' => $rows['phone'],
            'EMAIL' => $rows['email'],
            'PROFILE_PIC' => $rows['profile_pic'],
            'CREATED' => $customDate
        ];
        // echo "<pre>";
        // print_r($user);
        $con->close();
    }
    ?>
    <div class="card">
        <h4><?php echo $user['NAME'] ?>'s info</h4>
        <div class="card-body">
            <p>Name: <?php echo $user['NAME'] ?></p>
            <p>Phone: <?php echo $user['PHONE'] ?></p>
            <p>Email: <?php echo $user['EMAIL'] ?></p>
            <p><img src="<?php echo $user['PROFILE_PIC'] ?>" height="120px" width="120px" alt="no image" title="<?php echo $user['NAME'] ?>'s Pic">
            <a href="#" onclick="showUploadControls()">Change Profile Pic</a>
            <div class="form-group" id="changePic">
            <form method="post" action="update_pic.php" enctype="multipart/form-data">
                <input type="hidden" name="hid" value="<?php echo $user['ID'] ?>">
                <input type="file" name="editAvatar" class='form-control' required />
                <button class="btn btn-sm btn-outline-info">Save</button>
            </form>
            </div>
            </p>
            <p>Account Creation: <?php echo $user['CREATED'] ?></p>
            <a href="index.php">Back</a>
        </div>
    </div>
</body>

</html>