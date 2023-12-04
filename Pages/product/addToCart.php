<?php
if (isset($_POST['productID'])) {
  session_start();
  include_once('../../Includes/db.inc.php');
  $productID = $_POST['productID'];
  $sql = "SELECT * FROM HCMUT_BOOKSTORE.product WHERE PRODUCTID = '$productID'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // Create the cart if it doesn't exist
  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
  }

  // Check if the product is already in the cart
  $found = false;
  foreach ($_SESSION['cart'] as &$item) {
      if ($item['PRODUCTID'] == $result[0]['PRODUCTID']) {
          // If found, increase the quantity by 1
          $item['quantity'] += 1;
          $found = true;
          break;
      }
  }

  if (!$found) {
      // If not found, add the product to the cart with a quantity of 1
      array_push($_SESSION['cart'], $result[0] + ['quantity' => 1]);
  }

  echo json_encode($_SESSION['cart']);
  exit;
}

?>