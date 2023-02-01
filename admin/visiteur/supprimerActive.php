<?php
include "../../components/functions.php";

$conn = connect();
$stmt = $conn->prepare("UPDATE visiteur set etat=0 where id=:id");
$stmt->bindParam(":id" , $_GET["id"]);
$res = $stmt->execute();
header("location:list.php?active=notok");

?>