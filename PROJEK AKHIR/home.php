<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kabar Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="New folder/kabar-kuliner-favicon-white.png" />
    <link rel="stylesheet" href="style.css">
    <?php
    session_start();
    if(empty($_SESSION['username'])){
        header("location:index.php?pesan=belum_login");
        }
    ?>

    <style>
      .carousel-item {
        height: 100vh;
        min-height: 300px;
      }
      .card {
        margin: 0 5%;
      }
      .carousel-caption {
        bottom: 220px;
        z-index: 2;
      }
      .carousel-caption h5 {
        font-size: 45px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 25px;
      }
      .carousel-caption p {
        width: 60%;
        margin: auto;
        font-size: 18px;
        line-height: 1.9;
      }
      .carousel-inner:before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
      }
      .text-link {
        text-decoration: none; 
        color: inherit; 
        cursor: pointer; 
      }

    </style>
</head>
<body>

  <?php include 'navbar.php'; ?>
  <!-- carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="New folder/home-1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>Your Dream House</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="New folder/home-2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>Always Dedicated</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                             
            </div>
          </div>
          <div class="carousel-item">
            <img src="New folder/home-3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>True Construction</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                              
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- news -->
      <div id="News"></div>
      <section class="news section-padding" >
        <div class="container" style="margin-top: 5%; margin-bottom: -5%;">
        <div class="row">
                <div class="col-md-12" >
                    <div class="section-header text-center pb-5">
                        <h2 >Jews</h2>
                        <p>Our lastest news</p>
                    </div>
                </div>
            </div>
        </div>
      <div class="d-flex justify-content-between" style="margin: 0 5% 1% 5%;">
        <div>
        <?php
                  if ($_SESSION['role'] === 'admin') {
                  ?>
        <a class="btn-oren btn btn-lg" href="add_news.php" role="button">Tambah Berita</a>
        
        <?php
        }
        ?>
      </div>
        <div>
        <a class="btn-oren btn" href="?sort=newest" role="button">Newest</a>
        <a class="btn-oren btn" href="?sort=popular" role="button">Popular</a>
        </div>
      </div>
<?php 
include 'konek.php';

$sortOrder = "ORDER BY tahun DESC";

if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'newest':
            $sortOrder = "ORDER BY tahun DESC";
            break;
        case 'popular':
            $sortOrder = "ORDER BY komentar_count DESC";
            break;
    }
}

// SQL query with JOIN to get the count of comments for each news
$query = mysqli_query($konek, "
    SELECT news.*, COUNT(komentar.id) AS komentar_count
    FROM news
    LEFT JOIN komentar ON news.id = komentar.id_news
    GROUP BY news.id
    $sortOrder
");

while ($data = mysqli_fetch_array($query)) 
{?> 
        <div class="card shadow mb-3">
          <div class="row g-0">
            <div class="col-md-3">
              <img src="<?php echo $data['image'];?>"  class="img-fluid rounded-start mx-auto d-block h-100" alt="...">
            </div>
            <div class="col-md-9">
              <div class="card-body">
              <a href="news.php?id=<?php echo $data['id'];?>" class="text-link">
                    <h5 class="card-title"><?php echo $data['judul'];?></h5>
                </a>
                <p class="card-text"><?php echo substr($data['konten'], 0, 180).'...';?></p>
                <div class="d-flex justify-content-between">
                <div>
                <p class="card-text"><small class="text-muted"><?php echo $data['penulis']. ', '. $data['tahun'];?></small></p>
                </div>
                <div>
                  <script>
                      function konfirmasiHapus(x) {
                      var konfirmasi = confirm("Apakah yakin ingin menghapus?");
                      if (konfirmasi) {
                          window.location.href = "sqlcode.php?id="+x;
                      }}  
                  </script>
                  <?php
                  if ($_SESSION['role'] === 'admin') {
                  ?>
                      <a class="btn-admin btn btn-oren" href="edit_news.php?id=<?php echo $data['id'];?>" role="button">Edit</a>
                      <button class="btn btn-oren"onclick="konfirmasiHapus(<?php echo $data['id'];?>)">Delete</button> </div>
            
                  <?php
                  }
                  ?>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
    <?php }?>
        </div>
      </section>

      
      <?php include 'footer.php'; ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>