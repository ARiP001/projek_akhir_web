<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Berita Kuliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body{
        background-color: #FFBB5C;
    }
</style>
<body>

<!----------------------- Main Container -------------------------->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!----------------------- Login Container -------------------------->
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <!--------------------------- Left Box ----------------------------->
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #DDCAEA;">
           <div class="featured-image mb-3">
            <img src="New folder/svg/logo-no-background.svg" class="img-fluid" style="width: 320px;">
           </div>
       </div> 
    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Change Password</h2>
                     <p>Lorem ipsum.</p>
                </div>

            <form method="POST" action="cek_lupa.php">

                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" 
                    name="username" placeholder="Username">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password1" placeholder="Password">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password2" placeholder="Password Ulang">
                </div>

                <?php 
                    if(isset($_GET['pesan']))
                    {
                    if ($_GET['pesan'] == "username_noexists") echo "Ganti password gagal!  Username tidak ditemukan!";
                    else if($_GET['pesan'] == "password_kurang") echo "Ganti password gagal!  password harus terdiri dari 8 karakter!";
                    else if ($_GET['pesan'] == "password_missmatch") echo "Ganti password gagal!  kedua password harus sama!";
                        }
                    ?>

                <div class="input-group mb-2" style="margin-top: 10%;">
                    <button class="btn btn-lg btn-oren w-100 fs-6" type="submit">Confirm</button>
                </div>
            </form>

                <div class="row">
                    <small>Already have account or sign in with google? <a href="index.php">Login</a></small>
                </div>
          </div>
       </div> 
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>