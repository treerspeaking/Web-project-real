<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";

  try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    // echo $sql . "<br>" . $e->getMessage();
  }
?>