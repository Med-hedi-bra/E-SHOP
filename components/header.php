<nav class="navbar navbar-expand-lg navbar-light bg-light p-2 ">
  <div class="container-fluid ">
    <a class="navbar-brand" href="index.php">E-SHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php
            
            foreach ($categories as $categorie) {
              print('<li><a class="dropdown-item" href="#">' . $categorie["nom"] . ' </a></li>');
            }
            ?>

          </ul>
        </li>
        <?php
        // to get the full url of the current file in the server
        if (isset($_SERVER["HTTPS"]) && $_SERVER['HTTPS'] == 'on') {
          $url = "https://";
        } else {
          $url = "http://";
        }
        $url .= $_SERVER["HTTP_HOST"] . "/e-shop/";

        if (!isset($_SESSION["email"])) {


          print '<li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="' . $url . 'login.php">Se connecter</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="' . $url . 'signup.php">Sinscrire</a>
                </li>';
        } else {
          print '<li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>';
          if (isset($_SESSION["pannier"]["commande"])) {
            print '<li><a class="nav-link active" aria-current="page" href="pannier.php">Pannier(' . count($_SESSION["pannier"]["commande"]) . ')</a></li>';
          } else {
            print '<li><a class="nav-link active" aria-current="page" href="pannier.php">Pannier(0)</a></li>';
          }
        }
        ?>
      </ul>

      <form class="d-flex" action=<?= $url . 'index.php' ?> method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>

        <?php
        if (isset($_SESSION["email"])) {
          print '<a href="logout.php" class="btn btn-primary"> déconnexion</a>';
        }
        ?>
      </form>


    </div>
  </div>
</nav>