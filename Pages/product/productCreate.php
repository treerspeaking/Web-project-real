<?php

  include_once('../../Includes/db.inc.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookName = $_POST['bookName'];
    $bookPrice = $_POST['bookPrice'];
    $bookDescription = $_POST['bookDescription'];
    $sql = "INSERT INTO HCMUT_BOOKSTORE.PRODUCT (PRODUCTNAME, PRICE, PRODUCTDESCRIPTION) VALUES ('$bookName', '$bookPrice', '$bookDescription')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: /product');
    exit;
  }

?>