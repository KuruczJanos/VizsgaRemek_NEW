<?php
session_start();
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/admin.css">
    <div class="container-fluid">
    <?php
        require ('../admin/adminNavBar.php');
    ?>  
    <div class="navbar container-fluid">
    <button href="#" class="btn btn-primary" id="showAds">Hirdetések</button>
    <a href="#" class="btn btn-primary" id="showUsers">Felhasználók</a>
    <a href="#" class="btn btn-primary" id="showMessages">Üzenetek</a>    
    </div>
    </div>
    <div class="container-fluid" id="adminGetUsersContainer" style="display: none;">
    <?php
        require ('../admin/adminGetUsers.php');
    ?>  
    </div>
    <div class="container-fluid" id="adminGetCardsContainer" style="display: none;">
    <?php
        require ('../admin/adminGet.php');
    ?>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts/admin.js"></script>
