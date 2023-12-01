<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include "konek.php";
        $komen =$_POST['komen'];
        $tahun_komen = date('Y-m-d');
        $id_news =$_POST['id_news'];
        $id_user =$_POST['id_user'];
        // input
        if(isset($_POST ['submit-komen'])){
            $query=mysqli_query($konek,"INSERT INTO komentar VALUES('','$komen','$tahun_komen','$id_news','$id_user')"
            ) or die(mysqli_error($konek));  
        }

        echo "<script>window.location.href = 'news.php?id=$id_news';</script>";
?>
</body>
</html>


