<?php
session_start();
include "../../components/functions.php";
$aux = true;
if ($_SESSION['admin'] != $aux) {
  header("location:../../index.php");
}
if (isset($_POST["etat"], $_POST["idPannier"])) {
  $etat = $_POST["etat"];
  $id = $_POST["idPannier"];
  changeEtat($etat, $id);
}


$commandes = getAllCommandes();
$panniers = getAllPanier();


if (isset($_POST['selected_etat']) && $_POST["selected_etat"] != "all") {
  $panniers = getPannierByEtat($_POST["selected_etat"]);
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
  <title>Panniers</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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

      .modal-dialog {
        max-width: 900px;
        /* New width for default modal */
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../../css/dashboard.css" rel="stylesheet">
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
        <a class="nav-link" href="../../logout.php">Déconnexion</a>
      </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <?php
      include "../templates/nav.php";
      ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Liste des Pannier</h1>


        </div>

        <?php

        if (isset($_GET['supp']) && $_GET['supp'] == "ok") {
          print '<div class="alert alert-danger">
            Commande supprimé avec succés
        </div>';
        }
        if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
          print '<div class="alert alert-success">
            Commande modifié avec succés
        </div>';
        }

        ?>

        <form action="" method="POST">
          <div class="form-group d-flex ">
            <select name="selected_etat" id="" class="form-control">
              <option value="all">--------Choissiez une état-------</option>
              <option value="all">Tout</option>
              <option value="en livraison">En livraison</option>
              <option value="en cours">En cours</option>
              <option value="livraison termine">Livraison terminé</option>
            </select>
            <button type="submit" class="btn btn-primary ml-2">Filtrer</button>
          </div>
        </form>

        <div>
          <!-- Liste de Commandes -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Totale</th>
                <th scope="col">Etat</th>
                <th scope="col">Action</th>


              </tr>
            </thead>
            <tbody>
              <?php

              foreach ($panniers as $index => $pannier) {
                print '<tr>
            <th scope="row">' . ($index + 1) . '</th>
            <td>' . $pannier["nom"] . ' ' . $pannier["prenom"] . '</td>
            <td>' . $pannier["total"] . ' </td>
            <td>' . $pannier["etat"] . ' </td>
            <td><a class="btn btn-success" data-toggle="modal" data-target="#commande' . $pannier["id"] . '">Afficher</a>  <a data-toggle="modal" data-target="#traitement' . $pannier["id"] .  '" class="btn btn-primary">Traiter</a></td>
          </tr>';
              }
              ?>
            </tbody>
          </table>


        </div>



      </main>
    </div>





    <!-- Modal Modification-->
    <?php
    foreach ($panniers as $index => $pannier) { ?>

      <div class="modal fade" id="commande<?php echo $pannier["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Affichage des Commandes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id/Produit</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Totale</th>
                    <th scope="col">Date_creation</th>
                    <th scope="col">Pannier</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  foreach ($commandes as $index => $commande) {
                    if ($pannier["id"] == $commande["panier"]) {
                      print '
                        <tr>
                        <th>' . ($index + 1) . '</th>
                        <td>' . $commande["id"] . ' / ' . $commande["nom"] . '</td>
                        <td><img src="../../images/' . $commande["image"] . '" width="100" /></td>
                        <td>' . $commande["quantite"] . '</td>
                        <td>' . $commande["total"] . '</td>
                        <td>' . $commande["date_creation"] . '</td>
                        <td>' . $commande["panier"] . '</td>
                        <td><a class="btn  btn-danger" onclick="return popUpSupprimer()" href="supprimer?id=' . $commande["id"] . '">Supprimer</a></td>
                      </tr>
                        ';
                    }
                  }

                  ?>

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>








      <div class="modal fade" id="traitement<?php echo $pannier["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Traitement des Commandes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" class="form-group">
                <input type="hidden" name="idPannier" value="<?php echo $pannier["id"] ?>">
                <select name="etat" class="form-control">
                  <option value="en cours">En cours</option>
                  <option value="en livraison">En livraison</option>
                  <option value="livraison termine">Livraison Terminé</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary"> Sauvegarder</button>


              </form>
            </div>
          </div>
        </div>
      </div>
    <?php
    };



    ?>
  </div>


  <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="../../js/dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>