<?php
session_start(); 
$query = new mysqli('localhost', 'root', '', 'projek_akhir');

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($query, "SELECT * FROM user WHERE username='$username' AND password='$password' AND role IN ('admin', 'visitor')")
    or die(mysqli_error($query));

$cek = mysqli_num_rows($data);
if ($cek > 0) {
    $row = mysqli_fetch_assoc($data);
    
    $_SESSION['id'] = $row['id']; 
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    $_SESSION['role'] = $row['role']; 
    
    header("location: home.php");
} else {
    header("location: index.php?pesan=gagal");
}
?>
