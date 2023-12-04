<?php
  session_start();
?>


  <?php
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  $routes = [
    '/home' => 'Pages/home/home.php',
    '/login' => 'Pages/login/login.php',
    '/product' => 'Pages/product/product.php',
    '/cart' => 'Pages/cart/cart.php',
    '/logout' => 'Pages/logout/logout.php',
    '/signup' => 'Pages/signup/signup.view.php',
    '/' => 'Pages/home/home.php'
  ];
    // require $routes[$uri];
    if(array_key_exists($uri, $routes)){
      require $routes[$uri];
    }
    else if(array_key_exists($uri, $routes) && !isset($_SESSION['loggedin']) && $uri == '/login'){
      require $routes['/login'];
    }
    else if(array_key_exists($uri, $routes) && !isset($_SESSION['loggedin']) && $uri == '/signup'){
      require $routes['/signup'];
    }
    else if(array_key_exists($uri, $routes) && !isset($_SESSION['loggedin']) && $uri == '/'){
      header('Location: /login');
    }
    else {
      echo '404 page not found';
    }
  ?>

