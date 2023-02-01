<?php

session_start();
include "../components/functions.php";

if( !isset($_SESSION['pannier']["commande"])){
    header("location:../index.php");
    
}
$pannier = $_SESSION['pannier'];

//create th pannier
$conn = connect();
$stmt = $conn->prepare("INSERT INTO panier (visiteur, total) VALUES (:visiteur ,:total )");
$stmt->bindParam(":visiteur", $pannier["visiteur"]);
$stmt->bindParam(":total", $pannier["total"]);
$stmt->execute();
$id = $conn->lastInsertId();
// create commandes
$commandes = $pannier["commande"];


$stmt1 = $conn->prepare("INSERT INTO `commande`(`produit`, `quantite`, `panier`, `total`, `date_creation`, `date_modification`) 
VALUES ( :produit ,:qte, :panier , :total , :date1 , :date2)");
$stmt1->bindParam(":produit", $produit); //$commande[0][0]
$stmt1->bindParam(":qte", $qte); //$commande[0][2]
$stmt1->bindParam(":panier", $id);
$stmt1->bindParam(":total", $total); //$commande[0][3]
$stmt1->bindParam(":date1", $date1); //$commande[0][4]
$stmt1->bindParam(":date2", $date2); //$commande[0][5]
foreach ($commandes as $cmd) {
    $produit = $cmd[0];
    $qte = $cmd[2];
    $total = $cmd[3];
    $date1 = $cmd[4];
    $date2 = $cmd[5];
    $stmt1->execute();
}


$_SESSION["pannier"]=null;
header("location:../index.php");
