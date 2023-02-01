<?php
session_start();
include "../../components/functions.php";

$id = $_POST["idCommande"];
$qte = $_POST["quantite"];

$conn = connect();
$stmt = $conn->prepare(
    "UPDATE commande
    set quantite=:quantite
    WHERE id=:id");
$stmt->bindParam(":quantite" , $qte);
$stmt->bindParam(":id" , $id);
$res = $stmt->execute();

if($res){
    header("location:list.php?modif=ok");
}


?>