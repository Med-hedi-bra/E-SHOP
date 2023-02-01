<?php
session_start();
include "../../components/functions.php";
$stock = $_POST['stock'];
$nom = $_POST["nom"];
$description = $_POST["description"];
$date_modification = date("Y-m-d");
$id = $_POST["idC"];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$createur = $_SESSION['id'];



$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
   $image =  $_FILES["image"]["name"];
  $aux = true;
  } else {
    echo "Sorry, there was an error uploading your file.";
    $aux = false;
  }


$conn = connect();
$req = "UPDATE produits SET nom = '$nom' , description = '$description',image = '$image',categorie = '$categorie' , date_modification='$date_modification',prix='$prix' WHERE id=$id ";
$req2 = "UPDATE stock SET quantite ='$stock' WHERE produit='$id'";
$res = $conn->query($req);
if($res){
  if($conn->query($req2)){
    header("location:list.php?modif=ok&image=$aux");
  }
}

?>