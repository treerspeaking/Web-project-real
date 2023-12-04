<?php
    include_once('db.inc.php');
    $hashedPassword = password_hash("Clash123", PASSWORD_DEFAULT);
    $InsertUser = "INSERT INTO HCMUT_BOOKSTORE.USER (HASHEDPASSWORD, USERNAME, USERACCESSLEVEL) VALUES ('$hashedPassword', 'admin', 'ADMIN');";
    $conn->exec($InsertUser);
?>