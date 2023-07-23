<?php
session_start();

function generateHashPass($pass){
        $hashPass = password_hash($pass, PASSWORD_DEFAULT);
        return $hashPass;
   }

// To see entire Data from the HTML form
// print '<pre>';
// print_r($_POST);
// print_r($_FILES); // File info will be shown.

define('HOST', '127.0.0.1');
define('USERNAME', 'root');
define('PASS', '');
define('DB', 'hidb');

$name = $_POST['name'];
$phn = $_POST['phn'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$hasPass = generateHashPass($pass);

// Accepting the input file
//$customTime = strftime('%Y-%m-%d-%H:%M:%S');
$filename = time(). "_" . $_FILES['avatar']['name'];
$fileType = $_FILES['avatar']['type'];
$fileSize = $_FILES['avatar']['size']; // Bytes
$fileTmp = $_FILES['avatar']['tmp_name'];
$uploadPath = './uploads/' . $filename;

if ($fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/gif') {
    if ($fileSize < 100 * 1024) {
        move_uploaded_file($fileTmp, $uploadPath);

        try {
            $con = new mysqli(HOST, USERNAME, PASS, DB);
            if ($con->connect_error) {
                die($con->connect_error);
            } else {
                $sql = "INSERT INTO users (name, phone, email, pass, avatar) VALUES ('$name', '$phn', '$email', '$hasPass', '$uploadPath')";
                $smtp = $con->prepare('call addUsers(?,?,?,?,?)');
                $smtp->bind_param('sssss', $name, $phn, $email, $hasPass, $uploadPath);
                $smtp->execute();
                $rows = $con->affected_rows;

                if ($rows == 1) {
                    $_SESSION['message'] = "<div class='alert alert-success'>You have successfully signed up!</div>";
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger'>Unable to sign up. Please try again!</div>";
                }

                $con->close();
            }
        } catch (Exception $e) {
            $_SESSION['message'] = "<div class='alert alert-warning'>Phone number and email already exist!</div>";
        } finally {
            echo "<script>
            window.location.href='signup.php'; 
            </script>";
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Image file is too large to upload.</div>";
    }
} else {
    $_SESSION['message'] = "<div class='alert alert-danger'>Only image files are acceptable i.e *.jpeg | *.jpg | *.png | *.gif</div>";
}
echo "<script>
    window.location.href='signup.php';
</script>";
