<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
 <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js'></script>  -->
</head>

<body>
    <div class="container">
        <header>
            <h4>Sing Up Form</h4>
        </header>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" required class="form-control" />
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phn" id="phn" required class="form-control" />
                <span id="s2"></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="email" required class="form-control" />
                <span id="s1"></span>
            </div>


<div class="form-group">
    <label>Upload Profile Pic:</label>
    <input type="file" id="avatar" name="avatar" required class="form-control" />
</div>
<div class="form-group">
    <img id="preview" class="img-thumbnail" width="80px" height="80px" style="display:none;" />
</div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" id="pass" required class="form-control" />
                <span id="s3"></span>
            </div>
            <div class="form-group">
                <label>Confirm-Password</label>
                <input type="password" name="pass1" id="pass1" required class="form-control" />
                <span id="s4"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-outline-primary">Submit</button>
                <button type='reset' class="btn btn-sm btn-outline-danger">Reset</button>
            </div>
        </form>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            session_destroy();
        }
        ?>
        <div align='center'>
            <button class="btn btn-sm btn-outline-secondary" type="button"><a href="index.php
            ">View users</a>
            </button>
        </div>
    </div>
    <script src="script.js"></script>

    <script src="preview.js"></script>

    
</body>

</html>