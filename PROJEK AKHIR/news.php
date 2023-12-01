<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kabar Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="New folder/kabar-kuliner-favicon-white.png" />
</head>
<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:index.php?pesan=belum_login");
        }
    ?>
<style>

        article{
        margin: 10% 10% 5% 10%;
        border : 3px #FF7C5E solid;
        padding: 10px 30px;
        border-radius: 40px;
        }


.comment {
    border: 1px solid #FF7C5E;
    float: left;
    border-radius: 5px;
    padding: 5px 30px; 
    width: 100%; 
    overflow: hidden; 
}



.form-group input,.form-group textarea{

    border-radius: 12px;
}

form{

    background-color: #FF7C5E;
    border-radius: 10px;
    padding: 20px;
 }



</style>
<body>
<?php include 'navbar.php';  
include 'konek.php';
$id = $_GET['id'];
$query=mysqli_query($konek, "select * from news where id = $id;");
$data = mysqli_fetch_array($query)
?> 
        <article class="article-card">
        <h2 style="text-align: center;"><?php echo $data['judul'];?></h2>
        <p class="card-text text-muted" style="text-align: center;"><?php echo $data['penulis']. ', '. $data['tahun'];?></p>
        <div class="col-md-12 d-flex align-items-center justify-content-center">
        <img src="<?php echo $data['image'];?>" class="img-fluid rounded-start" style="height: 400px;" alt="...">
        </div>
        <p style="white-space: pre-wrap;"><?php echo $data['konten'];?></p>
        </article>
<!-- Main Body -->

<section style="margin-bottom: 5%;">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 pb-4">
                <h1>Comments</h1>
                <?php

                
                $query=mysqli_query($konek, "SELECT * FROM komentar k INNER JOIN user u ON k.id_user = u.id INNER JOIN news n ON k.id_news = n.id WHERE n.id = $id;");
                while($data=mysqli_fetch_array($query)){
                ?>
                <div class="comment mt-4 text-justify float-left">
                    <h4 style="display: inline;"><?php echo $data['username'];?></h4>
                    <span><?php echo '- '.$data['tahun_komen'];?></span>
                    <br>
                    <p><?php echo $data['komen'];?></p>
                </div>
<?php
$id_news = $data['id_news'];
$id_user = $_SESSION['id'];
}?>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form onsubmit="return checkUserRole();" method="POST" action="komen.php">
                <input type="hidden" name="id_news" value="<?php echo $id_news; ?>">
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                    <div class="form-group">
                        <h4>Leave a comment</h4>
                        <label for="message" style="color: antiquewhite;">Message</label>
                        <textarea name="komen" msg cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input name="submit-komen" class="btn btn-secondary" type="submit" value="Post Comment" style="margin-top: 10px; text-align : center">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>

<script>
function checkUserRole() {
    var userRole = "<?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'guest'; ?>";

    if (userRole === 'guest') {
        alert('Guests cannot submit comments. Please log in or register.');
        return false;
    }

    // If the user has a different role, the form will be submitted
    return true;
}
</script>

</body>
</html>