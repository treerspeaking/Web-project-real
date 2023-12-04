<?php
  // Start the session
  include_once('../../Includes/db.inc.php');

  // Check if the form has been submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Get the username and password from the form
    $sql = "SELECT HASHEDPASSWORD, USERACCESSLEVEL FROM HCMUT_BOOKSTORE.USER WHERE USERNAME = '$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Check if the username and password are correct
    if (password_verify($password, $result[0]['HASHEDPASSWORD'])) {
      // Set the session variable
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['useraccesslevel'] = $result[0]['USERACCESSLEVEL'];
      // Redirect to the home page
      header('Location: /home');
      exit;
    } else {
      // set expression for if the form fail
      session_start();
      $_SESSION['username'] = $username;
      $userreg = '/.+/';
      $passreg = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

      $_SESSION['usernamereinput'] = preg_match($userreg, $username) == 0 ? true : false;
      $_SESSION['passwordreinput'] = preg_match($passreg, $password) == 0 ? true : false;
      // ech
      header('Location: /login');
      exit;
    }
  }
?>

