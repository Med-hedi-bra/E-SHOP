<?php
session_start();
if (isset($_GET["id"], $_SESSION["pannier"]["commande"])) {
    // get the index of product in the pannier list and removed it
    $index = $_GET["id"];
    $_SESSION["pannier"]["commande"][$index];

    $_SESSION['pannier']["total"] -= $_SESSION["pannier"]["commande"][$index][3];
    \array_splice($_SESSION["pannier"]["commande"], $index, 1);
    header("location:../pannier.php?supp=ok");

}
