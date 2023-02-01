<?php
session_start();
$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$stock = $_POST['stock'];
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
   $image =  $_FILES["image"]["name"];
 
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


include "../../components/functions.php";
$conn = connect();
$date = date("Y-m-d");
$createur = $_SESSION['id'];
$req = "INSERT INTO produits(nom,description,createur,date_creation,prix,categorie,image) VALUES('$nom','$description','$createur','$date','$prix','$categorie','$image');";

if($conn->query($req)){
  $idS = $conn->lastInsertId();
  $req2 = "INSERT INTO stock(produit,quantite,createur,date_creation) VALUES('$idS','$stock','$createur','$date');";
  $res = $conn->query($req2);
  if($res){
    header("location:list.php?ajout=ok");
}


}


?>