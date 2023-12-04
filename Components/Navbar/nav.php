<head>
  <link rel='stylesheet' href="Components/Navbar/navbar.css">
</head>

<nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top">
  <!-- <div class="container-fluid"> -->
      <div class="container">
      <img class="navbar-brand" src="Asset/bachkhoalogo.png" alt="HCMUT logo" width="60" height="68" p-3 m-3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart">Cart</a>
          </li>
          <!-- check if the user is logged in or not via session   -->
          <?php if (isset($_SESSION['loggedin'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="logout">Logout</a>
            </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register">Register</a>
              </li>
            </ul>
            <?php } ?>
          </ul>
          <div class="d-flex">
            <a class="nav-link" ><?php echo 'User: '. $_SESSION['username'] .'</br>' .' Access level:' . $_SESSION['useraccesslevel']; ?></a>
            </div>
      <!-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>  -->
      <!-- </div> -->
    </div>
  </div>
</nav>