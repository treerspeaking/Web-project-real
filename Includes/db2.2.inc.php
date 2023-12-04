<?php
try {
    require_once "db.inc.php";

    // Create the database
    $Databasecreate = "CREATE DATABASE IF NOT EXISTS HCMUT_BOOKSTORE";
    $conn->exec($Databasecreate);

    // Create the USER table
    $Usertablecreate = "CREATE TABLE IF NOT EXISTS HCMUT_BOOKSTORE.USER(
        USERID INT AUTO_INCREMENT PRIMARY KEY,
        HASHEDPASSWORD VARCHAR(255) NOT NULL,
        USERNAME VARCHAR(30) NOT NULL,
        USERACCESSLEVEL VARCHAR(30) DEFAULT 'USER'
    );";
    $conn->exec($Usertablecreate);

    // Create the PRODUCT table
    $Producttablecreate = "CREATE TABLE IF NOT EXISTS HCMUT_BOOKSTORE.PRODUCT(
        PRODUCTID INT AUTO_INCREMENT PRIMARY KEY,
        PRODUCTNAME VARCHAR(30) NOT NULL,
        PRICE FLOAT NOT NULL,
        PRODUCTDESCRIPTION VARCHAR(255)
    );";
    $conn->exec($Producttablecreate);

    // Hash the password and insert a user
    $hashedPassword = password_hash("Clash123", PASSWORD_DEFAULT);
    $InsertUser = "INSERT INTO HCMUT_BOOKSTORE.USER (HASHEDPASSWORD, USERNAME, USERACCESSLEVEL) VALUES ('$hashedPassword', 'admin', 'ADMIN');";
    $conn->exec($InsertUser);

    // Insert a product
    $InsertProduct = "INSERT INTO HCMUT_BOOKSTORE.PRODUCT (PRODUCTNAME, PRICE, PRODUCTDESCRIPTION) VALUES ('Book1', 10000, 'This is book 1');";
    $conn->exec($InsertProduct);

    $conn = null;
    header("location:../index.php");
    exit();
} catch (PDOException $e) {
    header("location:../index.php");
    exit("Connection failed: " . $e->getMessage());
}
?>
