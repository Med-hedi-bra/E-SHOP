<?php
session_start();
$aux = true;
if ($_SESSION['admin'] != $aux) {
  header("location:../index.php");
}
include "../components/functions.php";

  if(isset($_POST["submit"])){
  modifyProfil($_POST['id'],$_POST["nom"], $_POST["prenom"], $_POST['email'] , $_POST["pass"]);
  $_SESSION['nom'] = $_POST["nom"];
  $_SESSION['prenom'] = $_POST["prenom"];
  $_SESSION['email'] = $_POST["email"];

}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.83.1">
  <title>Profil</title>

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


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style_index.css">
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
          <h1 class="h2">Profile</h1>

        </div>

        <div class="container ml-auto mr-auto">
          <h1>Nom : <span class="text-primary"><?php echo $_SESSION["nom"] ?> </span></h1>
          <h1>prenom : <span class="text-primary"><?php echo $_SESSION["prenom"] ?> </span></h1>
          <h1>Email : <span class="text-primary"> <?php echo $_SESSION["email"] ?></span></h1>
          <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModallModif">Modifier</a>

        </div>




        <!-- Modal -->






      </main>
    </div>

  </div>



  <div class="modal fade" id="exampleModallModif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification des coordonnées</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <input type="hidden" name="id" value="<?= $_SESSION["id"] ?>">
            <div class="form-group">
              <input type="text" class="form-control mb-2" name="nom" placeholder="Nom ..." value="<?= $_SESSION["nom"] ?>">
            </div>
            <div class="form-group">
              <input name="prenom" class="form-control mb-2" cols="30" placeholder="Prenom ..." value="<?= $_SESSION["prenom"] ?>"></input>
            </div>
            <div class="form-group">
              <input type="text" class="form-control mb-2" name="email" placeholder="Email ..." value="<?= $_SESSION["email"] ?>">
            </div>
            <div class="form-group">
              <input type="password" class="form-control mb-2" name="pass" placeholder="Mot de passe ..." >
            </div>
            <div class="modal-footer">
              <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Button trigger modal -->






  <script src="../js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../js/dashboard.js"></script>
</body>

</html>