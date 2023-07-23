<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Welcome</title>
</head>

<body>
    <div class="container-fluid">
        <?php

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            session_destroy();
        }

        ?>
        <section class="table-responsiv">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Profile Pic:</th>
                    <th>Created</th>
                </tr>

                <?php
                define('HOST', 'localhost');
                define('USERNAME', 'root');
                define('PASSWORD', '');
                define('DB', 'hidb');
                $con = new mysqli(HOST, USERNAME, PASSWORD, DB);
                if ($con->connect_error)
                    die($con->connect_error);
                else {
                    //echo "database connected !";
                    $sql = "select * from users";
                    $resultSet = $con->query($sql);
                    //print_r($resultSet);
                    while ($rows = $resultSet->fetch_assoc()) {
                        //echo "<pre>";
                        //print_r($rows);
                        $created = strtotime($rows['created']);
                        $customDate = date('d-m-y h-m-sA', $created);
                ?>
                        <tr>
                            <td>
                                <a href="info.php?id=<?php echo $rows['user_id']; ?>" class="btn btn-sm btn-outline-success">View</a> |
                                <a href="editInfo.php?id=<?php echo $rows['user_id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a> |
                                <a href="" class="btn btn-sm btn-outline-danger">Delete</a>

                            </td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><a href="tel:<?php echo $rows['phone'] ?>"><?php echo $rows['phone'] ?></a></td>
                            <td><a href="mailto:<?php echo $rows['email'] ?>"><?php echo $rows['email'] ?></a></td>
                            <td><img src="<?php echo $rows['profile_pic']; ?>" height="120px" width="120px" title="<?php echo $rows['name']; ?>'s Pic" alt="no image preview"></td>
                            <td><?php echo $customDate ?></td>
                        </tr>
                <?php
                    }
                }
                $con->close();
                ?>
            </table>
           
            <div align='center'>
                <button class="btn btn-sm btn-outline-danger" type="button" onclick="window.print();">
                    Print </button>
            </div>
        </section>
    </div>
</body>

</html>