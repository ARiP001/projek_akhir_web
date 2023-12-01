<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="New folder/logo-no-background.svg" alt=""  height="35"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <img src="New folder/account.png" width="25px" alt="">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="showNotification()">
                  <?php
                  if ($_SESSION['role'] == 'admin') echo $_SESSION['username'].', The Almighty';
                  else echo $_SESSION['username'].', The Commoner';
                  ?>

            </a></li>
            <li><a class="dropdown-item" href="#" onclick="konfirmasiLogout()">Logout</a></li>
          </ul>
        </li>     
        <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#News">News</a>
              </li> 
              <li class="nav-item">
                  <a class="nav-link" href="#" onclick="konfirmasiLogout()">Logout</a>
              </li>

              
            </ul>
          </div>
        </div>
      </nav>

<script>
    function showNotification() {
        alert("It Does Nothing ehe!");
    }
    function konfirmasiLogout() {
        var konfirmasi = confirm("Apakah Anda yakin ingin logout?");
        if (konfirmasi) {
            window.location.href = "logout.php";
        }
    }
</script>