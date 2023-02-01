
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">

    <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/home.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/home.php">

          <span data-feather="home"></span>
          Home
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/categories/list.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/categories/list.php">

          <span data-feather="file"></span>
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/produits/list.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/produits/list.php">
          <span data-feather="shopping-cart"></span>
          Products
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/visiteur/list.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/visiteur/list.php">
          <span data-feather="users"></span>
          Customers
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/profile.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/profile.php">
          <span data-feather="layers"></span>
          Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/stock/list.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/stock/list.php">

          <span data-feather="file"></span>
          Stock
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/E-SHOP/admin/panniers/list.php") {
                              echo 'active';
                            } ?>" href="/E-SHOP/admin/panniers/list.php">

          <span data-feather="shopping-cart"></span>
          Panniers
        </a>
      </li>
    </ul>



  </div>

</nav>