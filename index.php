<?php
session_start();
include "components/functions.php";
$categories = getAllCategories();
if (!empty($_POST)) {
  $produits = getProduitsBySearch($_POST['search']);
} else {
  $produits = getAllProduits();
}
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
    foreach ($produits as $produit) {
      print('
              
            <div class="card" style="width: 18rem;">
              <img src="images/' . $produit["image"] . '" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">' . $produit["nom"] . '</h5>
                <p class="card-text">' . $produit["description"] . '.</p>
                <h6 class="card-title">' . $produit["prix"] . '</h6>
                <a href="produit.php?id=' . $produit["id"] . '" class="btn btn-primary"> Afficher</a>
              </div>
            </div>
            
            ');
    }

    ?>

  </div>

  <!-- footer-->
 <?php
  include "components/footer.php";
 ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!--integration de bootstrap styles-->

</body>

</html>