<?php
session_start();
$nom = $_POST["nom"];
$description = $_POST["description"];
$date_modification = date("Y-m-d");
$id = $_POST["idC"];
include "../../components/functions.php";
$conn = connect();
$createur = $_SESSION['id'];
$req = "UPDATE categories SET nom = '$nom' , description = '$description', date_modification='$date_modification' WHERE id=$id ";
$res = $conn->query($req);
if($res){
    header("location:list.php?modif=ok");
}

?>