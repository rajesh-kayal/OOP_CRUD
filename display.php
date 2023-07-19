<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
</head>

<body>
    <table border="1px" cellpadding="10px" cellspasing="10px">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
        </tr>
        <?php
        define("HOST", "localhost");
        define("USERNAME", "root");
        define("PASS", '');
        define("DB", "crud");
        $con = new mysqli(HOST, USERNAME, PASS, DB);
        if ($con->connect_error)
            die($con->connect_error);
        else {
            $sql = "SELECT * FROM form";
            $resultSet=$con->query($sql);
            while ($rows = $resultSet->fetch_assoc()) {
        ?>
                <tr>
                    <td><button><a href="?view.phpid=<?php echo $_POST['id'] ?>">View</a></button> |
                        <button><a href="?edit.phpid=<?php echo $_POST['id'] ?>">Edit</a></button> |
                        <button><a href="delete.php?id=<?php echo $_POST['id'] ?>">Delete</a></button>
                    </td>
                    <td><?php echo $_POST['name']; ?></td>
                    <td><a href=" <?php echo $_POST['email'] ?>"><?php echo $_POST['email'] ?></a></td>
                    <td><a href="tell:<?php echo $_POST['phone'] ?>"><?php echo $_POST['phone'] ?></a> </td>
                    <td><img src="<?php echo $_POST['image'] ?>" width="100px" height="100px" alt="no image preview"></td>
                </tr>
        <?php
            }
        }
        ?>
        <div align='center'>
            <input type="button" onclick="window.print()">
        </div>
    </table>
</body>

</html>