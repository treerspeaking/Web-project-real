<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    
  }
  else {
    header('Location: /login');
  }

?>