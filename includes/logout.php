<?php
 // Felhasználó kijelentkeztetése funkció
    session_destroy();
    session_unset();
    header('Location: ../src/home.php');
  
?>