<?php
session_start();
$aux = true;
if ($_SESSION['admin'] != $aux) {
  header("location:../index.php");
}
include "../components/functions.php";

$data = getStats();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.83.1">
  <title>Home</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">




  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <link rel="stylesheet" href="../styles/styleForStats.css">


  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style_index.css">



  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../logout.php">Déconnexion</a>
      </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <?php
      include "templates/nav.php";
      ?>


      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Home</h1>

        </div>







        <!------ Include the above in your HEAD tag ---------->


        <div class="container  ">
          <div class="row">
            <div class="col-lg-2 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content dark-blue">
                  <div class="circle-tile-description text-faded">Customers</div>
                  <div class="circle-tile-number text-faded ">265</div>
                  <a class="circle-tile-footer" href="visiteur/list.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content dark-blue">
                  <div class="circle-tile-description text-faded"> Products </div>
                  <div class="circle-tile-number text-faded ">10</div>
                  <a class="circle-tile-footer" href="produits/list.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content dark-blue">
                  <div class="circle-tile-description text-faded"> Category </div>
                  <div class="circle-tile-number text-faded ">10</div>
                  <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content dark-blue">
                  <div class="circle-tile-description text-faded"> Pannier </div>
                  <div class="circle-tile-number text-faded ">10</div>
                  <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>






  </main>
  </div>

  </div>









  <script src="../js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../js/dashboard.js"></script>
</body>

</html>