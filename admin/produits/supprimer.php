<?php
include "../../components/functions.php";
    $id = $_GET['id'];
    $conn = connect();
    $req = "DELETE FROM produits WHERE id = '$id'";
    $req2 = "DELETE FROM stock WHERE produit = '$id' ";

    if($conn->query($req)){
        if($conn->query($req2)){
            header("location:list.php?supp=ok");
        }
    }

?>