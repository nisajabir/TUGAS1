<?php 
include 'fungsi.php';
$daily = query("SELECT * FROM daily");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
</head>
<link rel="stylesheet" href="style.css">
<!-- icon boastrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<style>
  .navbar .brand a {
    text-decoration: none;
  }

  .isi .container .row .col {
    margin-top: 30px;
    margin-bottom: 30px;
  }

  .kegiatan {
    width: 90%;
    background-color: silver;
    margin: -50px auto auto auto;
    padding: 20px;
  }

  .bg-warning {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important;
  }

  .footer .sosmed a {
    text-decoration: none;
    color: black;
  }

  .footer {
    color: black;
  }

  .row {
    margin: auto;
  }

  .table {
    width: 40%;
  }

  /*  */
</style>

<body>

  <section class>
    <nav class="navbar  navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid">
        <div class="brand d-flex justify-content-between align-items-center">
          <a href="index.php#home" class="logo d-flex">
            <img src="logo.png" width="150" alt="" class="ms-4 border-3-light">
            <!-- <h3 class="ms-3  text-bold fw-bold text-dark">aidil.com</h3> -->
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="nav navbar-nav ms-auto  ">
            <li class="bar nav-item active">
              <a class="nav-link me-5 " href="index.php#home">Beranda</a>
            </li>
            <li class="bar nav-item">
              <a class="link nav-link me-5 " href="index.php#bio">Biodata</a>
            </li>
            <li class="bar nav-item active">
              <a class="link nav-link me-5" href="daily.php">daily</a>
            </li>
            <li class="bar nav-item">
              <a class="nav-link me-5 " href="#contact">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>


  <section>
    <div class="container  p-3 ">
      <h2 id="daily">Daily</h2>
      <div class="row g-3 ">
        <?php foreach ($daily as $kar) : ?>
        <div class="col col-lg-3">
          <div class="card" >
            <img src="img/<?= $kar['img'];?>" class="card-img-top" style="height: 250px;" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?=$kar['nama']?></h5>
            </div>
          </div>
        </div>  
      <?php endforeach; ?>
    </div>
    </div>
  </section>


  <section class="footer bg-warning">
    <div class="container-fluid  mt-5 p-3 d-flex justify-content-evenly">

      <div class="row">
        <div class="col-sm-12 col-lg-4 col-md-12">
          <div class="sosmed">
            <h5>SOCIAL MEDIA</h5>
            <h6><a href="https://www.instagram.com/nisajabir/"><i class="bi bi-instagram">
                  nisajabir</i></a></h6>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 col-md-12">
          <div class="address">
            <h5>ADDRESS</h5>
            <h6> <i class="bi bi-geo-alt"></i> Jl. Perintis Kemerdekaan VII, Perum. Trika Mahkota Indah C/14</h6>
          </div>
        </div>
        <div class=" col-sm-12 col-lg-4 col-md-12">
          <div id="contact" class="contact">
            <h5>CONTACT</h5>
            <h6><i class="bi bi-telephone"></i> <i class="bi bi-whatsapp"></i>+62895802740322</h6>
            <h6><i class="bi bi-envelope"></i> nisajabir95@gmail.com</h6>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

</body>
</html>