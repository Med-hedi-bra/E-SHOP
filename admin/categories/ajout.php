<?php
session_start();
$nom = $_POST["nom"];
$description = $_POST["description"];

include "../../components/functions.php";
$conn = connect();
$date = date("Y-m-d");
$createur = $_SESSION['id'];
$req = "INSERT INTO categories(nom,description,createur,date_creation) VALUES('$nom','$description','$createur','$date');";
$res = $conn->query($req);
if($res){
    header("location:list.php?ajout=ok");
}

?>