<?php
if (isset($_POST['productID'])) {
  session_start();
  include_once('../../Includes/db.inc.php');
  $productID = $_POST['productID'];
  $quantity = $_POST['quantity'];

  // Check if the product is already in the cart
  // print_r($_SESSION['cart']);
  foreach ($_SESSION['cart'] as &$item) {
    if ($item['PRODUCTID'] == $productID) {
      // If found, increase the quantity by 1
      $item['quantity'] = $quantity;
      break;
    }
  }
  exit;
}

?>