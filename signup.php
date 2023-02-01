<?php
session_start();
if(isset($_SESSION["email"])){
  header("location:profile.php");
}
include "components/functions.php";
$categories = getAllCategories();
$testAjout=false;
   if(!empty($_POST)){
    $testAjout = addVisiteur($_POST);
   }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
 
    <?php
      include "components/header.php";
    ?>

      <!-- fin nav -->
      
      <form class="p-5" method="post" action="signup.php" >
        <h1 class="text-center">S'inscrire</h1>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="exampleInputPassword1" >
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Prenom</label>
              <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          
        

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telephone</label>
            <input type="text" class="form-control" name="telephone"  id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="mp" id="exampleInputPassword1">
          </div>
          
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </form>
      

      
      <!-- footer-->

      <?php
      include "components/footer.php";
      ?>
     <!-- fin footer -->

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!--integration de bootstrap alert-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> <!--integration de bootstrap style-->
      <?php

      if($testAjout){
        print "
          <script>
          let timerInterval
          Swal.fire({
            title: 'Vous étes bien inscrit',
            html: 'Cette fenétre va étre fenétre dans <b></b> milliseconds.',
            timer: 4000,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading()
              timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                  const b = content.querySelector('b')
                  if (b) {
                    b.textContent = Swal.getTimerLeft()
                  }
                }
              }, 100)
            },
            willClose: () => {
              clearInterval(timerInterval)
            }
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
              //console.log('I was closed by the timer')
            }
          })
         </script>";
      }
      ?>
</body>
</html>