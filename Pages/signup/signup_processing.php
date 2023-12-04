<?php
  // Start the session
  include_once('../../Includes/db.inc.php');
  

  // Check if the form has been submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $userreg = "/^[a-zA-Z0-9]{1,}$/";
    $passreg = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    $Databasecreate = "CREATE DATABASE IF NOT EXISTS HCMUT_BOOKSTORE";
    $conn->exec($Databasecreate);
    
    $tablesql = "CREATE TABLE IF NOT EXISTS HCMUT_BOOKSTORE.USER(
      USERID INT NOT NULL AUTO_INCREMENT,
      USERNAME VARCHAR(50) NOT NULL,
      HASHEDPASSWORD VARCHAR(255) NOT NULL,
      USERACCESSLEVEL VARCHAR(50) NOT NULL,
      PROVINCE VARCHAR(50) NOT NULL,
      DISTRICT VARCHAR(50) NOT NULL,
      WARD VARCHAR(50) NOT NULL,
      PRIMARY KEY (USERID)
      )";
    $stmt = $conn->prepare($tablesql);
    $stmt->execute();
    $sql = "SELECT USERNAME, HASHEDPASSWORD, USERACCESSLEVEL FROM HCMUT_BOOKSTORE.USER WHERE USERNAME = '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['usernamereinput'] = preg_match($userreg, $username) == 0 ? true : false;
    $_SESSION['passwordreinput'] = preg_match($passreg, $password) == 0 ? true : false;
    $_SESSION['provincereinput'] = $province == '0' || $province == null ? true : false;
    $_SESSION['districtreinput'] = $district == '0' || $district == null ? true : false;
    $_SESSION['wardreinput'] = $ward == '0' || $ward == null ? true : false;
    $_SESSION['usernameused'] = $username == $result[0]['USERNAME'] ? true : false;

    if( 
      $_SESSION['usernamereinput'] == true || 
      $_SESSION['passwordreinput'] == true || 
      $_SESSION['provincereinput'] == true || 
      $_SESSION['districtreinput'] == true || 
      $_SESSION['wardreinput'] == true || 
      $_SESSION['usernameused'] == true
    ){
      header('Location: /signup');
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['province'] = $province;
      $_SESSION['district'] = $district;
      $_SESSION['ward'] = $ward;
      // exit;
    }
    else{
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO HCMUT_BOOKSTORE.USER (USERNAME, HASHEDPASSWORD, USERACCESSLEVEL, PROVINCE, DISTRICT, WARD) VALUES ('$username', '$password', 'USER', '$province', '$district', '$ward')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      header('Location: /login');
      echo '<script>alert("Sign up successfully!")</script>';
      exit;
    }



    // Check if the username are used.
    var_dump($result);
    echo $username;
    // Get the username and password from the form
    // $sql = "SELECT HASHEDPASSWORD, USERACCESSLEVEL FROM HCMUT_BOOKSTORE.USER WHERE USERNAME = '$username'";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  }
?>

