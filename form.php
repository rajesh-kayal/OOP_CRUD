<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <?php
    if(isset($_SESSION['massage'])){
        echo $_SESSION['massege'];
        session_destroy();
    }
    ?>
    <form action="formaction.php" method="post" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name"><br>
        <label>Email</label>
        <input type="email" name="email"><br>
        <label>Phone</label>
        <input type="number" name="phone"><br>
        <label>Propile pic</label>
        <input type="file" name="avatar">
        <div>
            <img id="preview" alt="no image preview" width="100px" height="100px" style="display: none;">
        </div>
        <label>Passsword</label>
        <input type="password" name="pass">
        <div>
            <input type="submit" name="submit" value="submit"> |
            <input type="reset" name="rest" value="reset">
        </div>

    </form>
    <div>
        <a href="display.php">All Users</a>
    </div>
</body>

</html>