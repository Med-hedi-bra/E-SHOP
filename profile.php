<?php
session_start();
if (!isset($_SESSION["email"])) {
    header('location:login.php');
}

include "components/functions.php";
if (isset($_POST["submit"])) {
    modifyProfilUser($_POST['id'], $_POST["nom"], $_POST["prenom"], $_POST['email'], $_POST["pass"]);
    $_SESSION['nom'] = $_POST["nom"];
    $_SESSION['prenom'] = $_POST["prenom"];
    $_SESSION['email'] = $_POST["email"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--integration de bootstrap styles-->

    <title>Document</title>
</head>

<body>
    <?php
    
    $categories = getAllCategories();
    include "components/header.php";


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
                            <input type="hidden" name="id" value="<?= $_SESSION["idV"] ?>">
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
                                <input type="password" class="form-control mb-2" name="pass" placeholder="Mot de passe ...">
                            </div>
                            <div class="modal-footer">
                                <button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>





    </main>
    <?php
    include "components/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!--integration de bootstrap styles-->

</body>

</html>