<?php
if (isset($_POST['submit-btn'])) {
    include "konek.php"; // Assuming this file contains your database connection code

    // Other form data
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    
    // File upload handling
    $uploadDir = 'uploads/'; // Specify the directory where you want to store the uploaded files
    
    // Get the file extension
    $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    
    // Construct the new file name
    $newFileName = "image" . $id . "." . $fileExtension;
    $uploadFile = $uploadDir . $newFileName;
    
    // Check if file already exists
    if (file_exists($uploadFile)) {
        // If it exists, delete the existing file
        unlink($uploadFile);
    }
    
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        echo "File is valid, and was successfully uploaded.";
    
        // Insert data into the database (replace with your actual database table and columns)
        $query = mysqli_query(
            $konek,
            "INSERT INTO news VALUES ('$id','$judul', '$konten', '$tahun', '$penulis', '$uploadFile')"
        ) or die(mysqli_error($konek));
    
        // Redirect or display success message
        header("Location: home.php");
        exit();
    } else {
        echo "File upload failed.";
    }
    
} else if (isset($_POST['edit-btn'])){
    include "konek.php"; // Assuming this file contains your database connection code

    // Other form data
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $escaped_konten = mysqli_real_escape_string($konek, $konten);
    // File upload handling
    $uploadDir = 'uploads/'; // Specify the directory where you want to store the uploaded files

    // Get the file extension
    $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // Construct the new file name
    $newFileName = "image" . $id . "." . $fileExtension;
    $uploadFile = $uploadDir . $newFileName;

    // Check if the file already exists
    if (file_exists($uploadFile)) {
        // If it exists, delete the existing file
        unlink($uploadFile);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        echo "File is valid, and was successfully uploaded.";

        // Update data in the database
        $query = mysqli_query(
            $konek,
            "UPDATE news SET judul='$judul', konten='$escaped_konten', tahun='$tahun', penulis='$penulis', image='$uploadFile' WHERE id=$id;"
        ) or die(mysqli_error($konek));

        // Redirect or display success message
        header("Location: success.php");
        exit();
    } else {
        echo "File upload failed.";
    }
}else if (isset($_GET['id'])){
    include "konek.php"; // Assuming this file contains your database connection code

    $id =$_GET['id'];
    $query=mysqli_query($konek,"DELETE FROM news where 
    id=$id");
    header("Location: home.php");
}
?>
