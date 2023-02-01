<?php
include "../../components/functions.php";
$id = $_GET['id'];
$conn = connect();
$req = "DELETE FROM panier WHERE id = '$id'";
$res = $conn->query($req);
if ($res) {
    header("location:list.php?supp=ok");
}
