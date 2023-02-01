<?php
session_start();
include "../../components/functions.php";
    if(isset($_POST)){
        $conn = connect();
        $quantite = $_POST["quantite"];
        $idS =$_POST["idS"];
        $req = "update stock set quantite = $quantite where id=$idS";
        $res = $conn->query($req);
        if($res){
            header("location:list.php?modif=ok");
        }
        else {
            echo "Probléme au niveuax de modification";
        }
    }


?>