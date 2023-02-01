<?php

function connect()
{
  //database connection

  // $servername = servername;
  // $DBuser = DBuser;
  // $DBpassword = DBpassword;
  // $DBname = DBname;
  // include "../config.php";

  $servername = "localhost";
  $DBuser = "root";
  $DBpassword = "root";
  $DBname = "ecommerce";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully \t";
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\t";
  }
  return $conn;
}

function getAllCategories()
{

  $conn = connect();
  // request creation 
  $req = " SELECT * FROM categories";
  // request execution
  $res = $conn->query($req);
  //fetching
  $categories = $res->fetchAll();

  return $categories;
}


function getAllProduits()
{
  //database connection

  $conn = connect();
  // request creation 
  $req = " SELECT * FROM produits";
  // request execution
  $res = $conn->query($req);
  //fetching
  $produits = $res->fetchAll();

  return $produits;
}

function getAllVisiteurs()
{
  //database connection

  $conn = connect();
  // request creation 
  $req = " SELECT * FROM visiteur";
  // request execution
  $res = $conn->query($req);
  //fetching
  $visiteurs = $res->fetchAll();

  return $visiteurs;
}


function getProduitsBySearch($keyWord)
{
  $conn = connect();
  $req = "SELECT * FROM produits WHERE nom LIKE '%$keyWord%' ";
  $res = $conn->query($req);
  $produits = $res->fetchAll();
  return $produits;
}


function getProduitbyId($id)
{
  $conn = connect();
  $req = "SELECT * FROM produits WHERE id = $id ";
  $res = $conn->query($req);
  $produit = $res->fetch();
  return $produit;
}

function getCategoriebyId($id)
{
  $conn = connect();
  $req = "SELECT * FROM categories WHERE id = $id ";
  $res = $conn->query($req);
  $categorie = $res->fetch();
  return $categorie;
}

function addVisiteur($data)
{
  $conn = connect();
  $mpHash = md5($data['mp']);
  $req = " INSERT INTO visiteur(nom,prenom,email,mp,telephone) VALUES( '" . $data['nom'] . "' , '" . $data['prenom'] . "' , '" . $data['email'] . "','" . $mpHash . "','" . $data['telephone'] . "' ) ";
  $res = $conn->query($req);
  return $res;
}

function visiteurConnect($data)
{
  $conn = connect();
  $email = $data["email"];
  $mpHash = md5($data["mp"]);
  $req = "SELECT * FROM visiteur WHERE email='$email' AND mp='$mpHash'";
  $res = $conn->query($req);
  $user = $res->fetch();
  return $user;
}

function adminConnect($data)
{
  $conn = connect();
  $email = $data["email"];
  $mpHash = md5($data["mp"]);
  $req = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mpHash' ";
  $res = $conn->query($req);
  $user = $res->fetch();
  return $user;
}

function getAllStocks()
{
  $conn = connect();
  $req = "SELECT p.nom , s.id , s.quantite from stock s , produits p  where s.produit = p.id";
  $res = $conn->query($req);
  $stock = $res->fetchAll();
  return $stock;
}

function getAllCommandesWithUser()
{

  $conn = connect();
  $stmt = $conn->prepare(
    "SELECT v.nom , v.prenom , v.telephone , p.id, p.nom , p.prix , c.quantite , c.total ,c.id
  from commande c , produits p , visiteur v , panier pa
  where c.produit=p.id and c.panier=pa.id and pa.visiteur=v.id"
  );

  $stmt->execute();
  return $stmt->fetchAll();
}

function getAllCommandes()
{
  $conn = connect();
  $sql = "SELECT p.id, p.nom , p.image , c.quantite  , c.total , c.date_creation , c.panier from commande c , produits p where c.produit = p.id";
  $res = $conn->query($sql);
  return $res->fetchAll();
}

function getAllPanier()
{
  $conn = connect();
  // to remove the empty pannier
  $sql2 = "DELETE from panier where total=0";
  $conn->query($sql2);


  $sql = "SELECT v.nom , v.prenom, p.total , p.id , p.etat from panier p , visiteur v WHERE p.visiteur = v.id";
  $res = $conn->query($sql);
  return $res->fetchAll();
}

function changeEtat($etat, $id)
{
  $conn = connect();
  $stmt = $conn->prepare("UPDATE panier set etat=:etat WHERE id=:id");
  $stmt->bindParam(":etat", $etat);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
}

function getPannierByEtat($etat)
{

  $all = getAllPanier();
  $res = array();

  foreach ($all as  $value) {

    if ($value["etat"] == $etat) {
      array_push($res, $value);
    }
  }
  return $res;
}


function modifyProfil($id, $nom, $prenom, $email, $pass)
{

  $conn = connect();
  if ($pass == "") {
    $stmt = $conn->prepare("UPDATE administrateur SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id");
  } else {
    $stmt = $conn->prepare("UPDATE administrateur SET nom=:nom, prenom=:prenom, email=:email ,mp=:mp WHERE id=:id");
    $hash = md5($pass);
    $stmt->bindParam(":mp", $hash);
  }
  $stmt->bindParam(":nom", $nom);
  $stmt->bindParam(":prenom", $prenom);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
}


function modifyProfilUser($id, $nom, $prenom, $email, $pass)
{

  $conn = connect();
  if ($pass == "") {
    $stmt = $conn->prepare("UPDATE visiteur SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id");
  } else {
    $stmt = $conn->prepare("UPDATE visiteur SET nom=:nom, prenom=:prenom, email=:email ,mp=:mp WHERE id=:id");
    $hash = md5($pass);
    $stmt->bindParam(":mp", $hash);
  }
  $stmt->bindParam(":nom", $nom);
  $stmt->bindParam(":prenom", $prenom);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
}



function getStats()
{
  $conn = connect();
  $res = array();
  $sql1 = "SELECT count(*) from visiteur";
  $sql2 = "SELECT count(*) from categories";
  $sql3 = "SELECT count(*) from panier";
  $sql4 = "SELECT count(*) from produits";
  $nbr1 = $conn->query($sql1);
  $nbr1 = $nbr1->fetchAll();
  $nbr2 = $conn->query($sql2);
  $nbr2 = $nbr2->fetchAll();
  $nbr3 = $conn->query($sql3);
  $nbr3 = $nbr3->fetchAll();
  $nbr4 = $conn->query($sql4);
  $nbr4 = $nbr4->fetchAll();

  array_push($res, $nbr1, $nbr2, $nbr3, $nbr4);
}
