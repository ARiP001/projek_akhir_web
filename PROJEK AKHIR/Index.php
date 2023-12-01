<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabar Kuliner - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="New folder/kabar-kuliner-favicon-white.png" />
    <link rel="stylesheet" href="style.css">
    <script>
        function showNotification() {
            alert("Cuma dummy bg!");
        }
    </script>
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
            <img src="New folder/svg/logo-no-background.svg" class="img-fluid" style="width: 350px;">
           </div>
       </div> 
    <!-------------------------- Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Halo Pemirsa</h2>
                     <p>Kembali lagi bersama saya</p>
                </div>

            <form method="POST" action="cek_login.php">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" 
                    name="username" placeholder="Username">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password" id="passwordInput">
                    
                </div>
                <div class="input-group-append">
        <div>
            <input type="checkbox" onclick="togglePasswordVisibility()">
            <label class="form-check-label" for="passwordCheckbox">Tampilkan Password</label>
        </div>
    </div>
                <div class="input-group mb-4 d-flex justify-content-end">
                    
                    <div class="forgot">
                        <small><a href="index_lupa.php">Forgot Password?</a></small>
                    </div>
                </div>
                    <?php 
                    if(isset($_GET['pesan']))
                    {
                    if($_GET['pesan'] == "gagal")
                    {
                    echo "Login gagal! username dan password salah!";
                    }else if($_GET['pesan'] == "logout")
                    {
                        echo "Anda telah berhasil logout";
                        }else if($_GET['pesan'] == "belum_login")
                        {
                        echo "Anda harus login untuk mengakses laman";
                        }
                        }
                    ?>
                <div class="input-group mb-2">
                    <button class="btn btn-lg w-100 fs-6 btn-oren" type="submit" >Login</button>
                </div>
            </form>
            <div class="input-group mb-3">
                <a class="btn btn-lg w-100 fs-6 btn-oren" href="cek_guest.php" role="button">Login as guest</a>
            </div>

                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6" onclick="showNotification()">
                    <img src="New folder/google.png" style="width:20px" class="me-2">
                    <small>Sign In with Google</small></button>
                </div>
                <div class="row">
                    <small>Don't have account? <a href="index2.php">Sign Up</a></small>
                </div>
          </div>
       </div> 
      </div>
    </div>
    <script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("passwordInput");
    var passwordCheckbox = document.querySelector('input[type="checkbox"]');
    passwordInput.type = passwordCheckbox.checked ? "text" : "password";
}
</script>
</body>
</html>