<?php
session_start();
if (isset($_SESSION["email"])) {
  header("location:profile.php");
}

include "components/functions.php";
$categories = getAllCategories();
$user = true;
if (!empty($_POST)) {
  $user = visiteurConnect($_POST);
  if ($user) { //utilisateur trouvé
    session_start();
    // set the session variable for user
    $_SESSION['idV'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['telephone'] = $user['telephone'];
    $_SESSION['admin'] = false;
    $_SESSION['etat'] = $user["etat"];

    // set the session variables for pannier
    $visiteur = $user['id'];
    $_SESSION['pannier'] = array("visiteur"=>$visiteur ,"total"=>0,"commande"=> array() ,"date_creation"=> date("d-m-y"),"date_modification"=> null );

    header("location: profile.php");
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
</head>

<body>
  <?php
  include "components/header.php";
  ?>

  <!-- fin nav -->



  <h1 class="text-center">Connexion</h1>
  <form class="p-5" method="post" action="login.php">
    <div class="mb-3 ">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="mp" type="password" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
  </form>




  <!-- footer-->

  <?php
  include "components/footer.php";
  ?>
  <!-- finn footer-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!--integration de bootstrap alert-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
<?php
if (!$user) {

  print "
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Utilisateur introuvable',
                  text: 'Vérifier votre email ou votre mot de passe',
                  
                })
              </script>
              ";
}
?>

</html