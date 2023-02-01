<?php
include '../components/functions.php';
// create pannier
// l'ajout au pannier ne ce fait que lors de login
// calcul de total de commande
// calcul de total de pannier
session_start();
if(!isset($_SESSION['email'])){
    header('location:../login.php');
}


$conn = connect();
$sql1 = "SELECT nom , prix from produits where id=".$_POST['id'].";";
$res = $conn->query($sql1);
$produit =  $res->fetch();
$total_commande = $_POST['quantite'] * $produit['prix'];


$date = date("d-m-y");
// to consider that the user validate the pannier and the pannier become null so we have to re intitlize it because we initilize the pannier after login
if(!isset($_SESSION['pannier'])){
    $date_creation = $date;
    $date_modification = $date;
    $_SESSION['pannier']["date_creation"] = $date_creation;
    $_SESSION['pannier']["date_modification"] = $date_modification;
    $_SESSION['pannier'] = array("visiteur"=>$_SESSION["idV"] ,"total"=>0,"commande"=> array() ,"date_creation"=> null,"date_modification"=> null );

}


    // to add the commande to the pannier
    $_SESSION["pannier"]["date_modification"] = date("d-m-y");
    $_SESSION["pannier"]["total"] +=$total_commande;
    $_SESSION["pannier"]["commande"][] = array($_POST["id"], $produit["nom"], $_POST["quantite"] , $total_commande,$date,$date );
   




 header("location:../pannier.php");
