<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quote - QOTD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="chat-right-quote.svg">
    <?php
        session_start();

        if (empty($_SESSION['username'])) {
            header("location:index.php?pesan=belum_login");
            exit();
        }
        if ($_SESSION['role'] !== 'admin') {
            header("location:home.php?pesan=not_admin");
            exit();
        }
        ?>
    <style> 
        .container-fluid{
        margin: 0 10% 0 10%;
        }
        .card{
            margin: 2% 10% 4% 10%;
        }
        .card-header{
            background-color: #FF9B50;
        }
        .card-body{
            background-color: #faf1e4;
        }
        .btn {
        background-color: #FF9B50;
        color: white;
        transition: background-color 0.3s ease;
        }
    .btn:hover {
        background-color: #E5812B;
        color: white; 
        }
    </style>
    </head>
<body>
<?php include 'navbar.php';
include 'konek.php';

$query = mysqli_query($konek, "SELECT MAX(id) as max_id FROM news");
$data = mysqli_fetch_array($query);
$id = $data['max_id'] +1;
?>
</body>
<main>
    <div class="card shadow" style="margin-top: 8%;">
        <h5 class="card-header">Tambah Berita</h5>
        <div class="card-body">

          <form action="sqlcode.php" method="post" enctype="multipart/form-data">


          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group row p-2 g-col-6">
              <label for="inputauthor" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputjudul" name="judul" placeholder="Silakan isi Judul">
              </div>
            </div>
            <div class="form-group row p-2 g-col-6">
              <label for="inputquote" class="col-sm-2 col-form-label">Konten</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="konten" rows="3" placeholder="Silakan isi konten"></textarea>
              </div>
            </div>
            <div class="form-group row p-2 g-col-6">
              <label for="inputauthor" class="col-sm-2 col-form-label">Penulis</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputpenulis" name="penulis" placeholder="Silakan isi penulis">
              </div>
            </div>
            <div class="form-group row p-2 g-col-6">
                <label for="inputtahun" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="inputtahun" name="tahun">
                </div>
            </div>
            <div class="form-group row p-2 g-col-6">
                <label for="inputtahun" class="col-sm-2 col-form-label">Thumbnail Img</label>
                <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" name="image">
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12 d-flex flex-row-reverse bd-highlight">
                <button type="submit" value="submit" name="submit-btn" class="btn btn-submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
</main>
</html>