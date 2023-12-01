<?php
session_start(); 
$query = new mysqli('localhost', 'root', '', 'projek_akhir');

$data = mysqli_query($query, "SELECT * FROM user WHERE username='Guest'") or die(mysqli_error($query));

$row = mysqli_fetch_assoc($data);

if ($row) {
   
    $_SESSION['username'] = $row['username'];
    $_SESSION['status'] = "login";
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['id']; 
    
    header("location: home.php");
} 
?>
