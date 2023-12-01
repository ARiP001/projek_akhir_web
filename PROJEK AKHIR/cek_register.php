<?php
$query = new mysqli('localhost', 'root', '', 'projek_akhir');

$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$checkUsername = mysqli_query($query, "SELECT * FROM user WHERE username='$username'");
    $numRows = mysqli_num_rows($checkUsername);
if ($numRows == 0) {
    if (strlen($password1) >= 8) {
        if($password1 == $password2){
            $query = mysqli_query($query, "INSERT INTO user VALUES('', '$username', 'visitor', '$password1')") or die(mysqli_error($konek));
            header("location: index3.php?pesan=sukses_register");
        }else header("location: index2.php?pesan=password_missmatch");
    } else header("location: index2.php?pesan=password_kurang");      
} else header("location: index2.php?pesan=username_exists");
?>
