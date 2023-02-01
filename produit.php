<?php
  include "components/functions.php";
  session_start();
   $categories = getAllCategories();
   if(isset($_GET['id'])){
       $produit = getProduitbyId($_GET['id']);
         
   }
   foreach($categories as $categorie){
    if($produit['categorie'] == $categorie['id']){
      $produit_categorie = $categorie['nom'];
      
    }
    
  }
  
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style_index.css">
</head>
<body>
 
     
   
    <?php
      include "components/header.php";
    ?>
 <!-- fin nav -->

  <?php
    if(isset($_SESSION["etat"]) && $_SESSION["etat"]==0){
      print "<div class='alert alert-danger'>
        votre compte est non valide
        </div>";
    }
  
  ?>
 <div class="card" style="width: 70%; margin-left:auto; margin-right:auto;">
        <img src="<?php print "images/".$produit['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $produit['nom']?></h5>
            <h6><?=$produit_categorie?> </h6>
            <p class="card-text"><?php echo $produit['description']?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $produit['prix']?></li>

        </ul>
        <form action="./action/commander.php" method="post"  class="m-2">
          <input type="hidden" name="id" value=<?=$produit["id"];?>>
          <input placeholder="Quantite.." required name="quantite" type="number" step="1">
          <button type="submit" class="btn btn-primary" <?php if(isset($_SESSION["etat"]) && $_SESSION["etat"] == 0){echo "disabled";}  ?> >Ajouter au panier</button>
        </form>
    </div> 
      
      <!-- footer-->
      <?php
      include "components/footer.php";
     ?>

     

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script></body>
</html>
  </body>
</html>