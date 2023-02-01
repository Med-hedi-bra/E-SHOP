<?php
    include "../../components/functions.php";
    $idV = $_GET['id'];
    $conn = connect();
    $req = "UPDATE visiteur SET etat='0' WHERE id=$idV  ";
    $res = $conn->query($req);
    if($res){
        header("location:list.php?oper=ok");
    }
    else{
        echo 'il ya un erreur';
    }
?>