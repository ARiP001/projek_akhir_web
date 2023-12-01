<?php
$query = new mysqli('localhost', 'root', '', 'projek_akhir');

$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

$checkUsername = mysqli_query($query, "SELECT * FROM user WHERE username='$username'");
    $numRows = mysqli_num_rows($checkUsername);
if ($numRows == 1) {
    if (strlen($password1) >= 8) {
        if($password1 == $password2){
            $query = mysqli_query($query, "UPDATE user SET password='$password1' WHERE username='$username'") or die(mysqli_error($konek));
            header("location: index_lupa2.php?pesan=sukses_ganti");
        }else header("location: index_lupa.php?pesan=password_missmatch");
    } else header("location: index_lupa.php?pesan=password_kurang");      
} else header("location: index_lupa.php?pesan=username_noexists");
?>
