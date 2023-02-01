<?php
session_start();
include "components/functions.php";
if (!isset($_SESSION["email"])) {
  header("location:login.php");
}
if (isset($_SESSION['pannier'])) {
  if (count($_SESSION['pannier'])) {
    $pannier = $_SESSION['pannier'];
    $commandes = $pannier["commande"];
  }
}

$categories = getAllCategories();



?>




<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-SHOP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!--integration de bootstrap styles-->
  <link rel="stylesheet" href="./styles/style_index.css">
</head>

<body>
  <?php
  include "components/header.php";
  ?>
  <!-- fin nav -->
  <div id="conteneur">
    <?php

    if (isset($_GET['supp']) && $_GET['supp'] == "ok") {
      print '<div class="alert alert-danger">
            Produit enlever de la pannier avec succés
        </div>';
    }


    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col"> Produit</th>
          <th scope="col">Quantite</th>
          <th scope="col">Totale</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

        if (isset($commandes)) {
          foreach ($commandes as $i => $commande) {
            print '<tr>
              <td >' . ($i + 1) . '</td>
              <td>' . $commande[1] . '</td>
              <td>' . $commande[2] . ' piéces</td>
              <td>' . $commande[3] . 'TND</td>
              <td>  <a href="action/deleteFromPannier.php?id=' . $i . '" class="btn btn-danger">Supprimer</a></td>
            </tr>';
          }
        }
        ?>
      </tbody>
    </table>
    <div class="text-end">
      <p>Totale de votre pannier est <?php echo (isset($pannier['total'])) ?  $pannier['total'] :  '0'; ?> TND</p>
      <a href="action/validerPannier.php" class="btn btn-success m-3">Valider</a>
    </div>





  </div>




  <!-- footer-->
  <?php
  include "components/footer.php";
  ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!--integration de bootstrap styles-->

</body>

</html>