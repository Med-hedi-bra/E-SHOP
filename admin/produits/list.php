<?php
session_start();
$aux = true;
if ($_SESSION['admin'] != $aux) {
  header("location:../../index.php");
}
include "../../components/functions.php";
$Produits = getAllProduits();
$categories = getAllCategories();
$Stocks = getAllStocks();




?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.83.1">
  <title>Produits</title>

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
          <h1 class="h2">Liste des Produits</h1>
          <div>
            <a href="ajout.php" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAjout">Ajouter</a>
          </div>

        </div>
        <?php
        if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
          print '<div class="alert alert-success">
            Produit ajouté avec succés
        </div>';
        }
        if (isset($_GET['supp']) && $_GET['supp'] == "ok") {
          print '<div class="alert alert-danger">
            Produit supprimé avec succés
        </div>';
        }
        if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
          print '<div class="alert alert-success">
            Produit modifié avec succés
        </div>';
        }
       if(isset($_GET["image"])){
        print $_GET["image"];
       }
        ?>
        <div>
          <!-- Liste de Produits -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Créateur</th>
                <th scope="col">Date de Création</th>
                <th scope="col">Date de dernier modification</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($Produits as $Produit) {
                print '<tr>
            <th scope="row">' . $i . '</th>
            <td>' . $Produit["nom"] . '</td>
            <td>' . $Produit["description"] . '</td>
            <td>' . $Produit["prix"] . '</td>
            <td>' . $Produit["categorie"] . '</td>
            <td>' . $Produit["createur"] . '</td>
            <td>' . $Produit["date_creation"] . '</td>
            <td>' . $Produit["date_modification"] . '</td>
            <td><a class="btn btn-success" data-toggle="modal" data-target="#exampleModallModif' . $Produit['id'] . '">Modifier</a>  <a href="supprimer.php?id=' . $Produit['id'] . '" class="btn btn-danger">Supprimer</a></td>
          </tr>';
                $i++;
              }
              ?>
            </tbody>
          </table>


        </div>



      </main>
    </div>


    <!-- Modal Ajout -->
    <div class="modal fade" id="exampleModalAjout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="ajout.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <div class="form-group">
                  <input type="text" class="form-control" name="nom" placeholder="Nom de Produit ...">
                </div>
                <div class="form-group">
                  <textarea name="description" class="form-control" cols="30" placeholder="Description de produit ..."></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="prix" placeholder="Prix de produits">
                </div>
                <div class="form-group">
                  <input type="file" class="form-control" name="image" id="image" placeholder="image de produits">
                </div>
                <div class="form-group">
                  <select class="form-control" name="categorie">
                    <?php
                    foreach ($categories as $categorie) {
                      print '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                    }
                    ?>
                  </select>
                  <input type="hidden" name="createur" value="<?php echo $_SESSION['id']; ?>">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="stock" placeholder="Taper la quntite de produit">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>


    <!-- Modal Modification-->
    <?php
    foreach ($Produits as $index => $Produit) { ?>

      <div class="modal fade" id="exampleModallModif<?php echo $Produit['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="modifier.php" method="post">
                <div class="form-group">
                  <input type="hidden" value=<?php echo $Produit['id']; ?> name="idC">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="nom" value=<?php echo $Produit['nom']; ?>>
                </div>
                <div class="form-group">
                  <textarea name="description" class="form-control" cols="30"><?php echo $Produit['description']; ?></textarea>
                </div>
                <div class="form-group">
                  <input type="number" step="0.5" class="form-control" name="prix" value=<?php echo $Produit['prix']; ?>>
                </div>
                <div class="form-group">
                  <input type="file" class="form-control" name="image" value=<?php echo $Produit['image']; ?>>
                  <div class="form-group">
                    <select name="categorie" class="form-control">
                      <?php
                      foreach ($categories as $categorie) {
                        if ($categorie['id'] ==  $Produit["categorie"]) {
                          print '<option selected value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                        } else {
                          print '<option value="' . $categorie['id'] . '">' . $categorie['nom'] . '</option>';
                        }
                      }
                      
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input required type="number" class="form-control" name="stock" placeholder="Taper la qunatité de produit">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>

              </form>

            </div>



          </div>

        </div>
      </div>

    <?php
    }
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