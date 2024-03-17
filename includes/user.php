<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/source.scss">
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet"> -->
    <title>Profilom</title>
</head>
<body>
<?php 
        require ('../includes/userNavbar.php');
       ?>
<!-- <nav class="banner navbar navbar-expand-lg navbar-dark">
<a href="#" class="navbar-brand"><img src="<?php echo $_SESSION['UserPhoto']?>" width="100" height="100" class="d-inline-block align-top" alt=""></a>
 <?php echo 'Üdv ' .$_SESSION['UserFullName'].' !' . "<img src='" . $_SESSION["UserPhoto"] . "' alt='Profile Photo' width='100' height='100'>";?> -->
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

    <div class="navbar-nav ml-auto">
      <button class="mr-4 btn btn-primary" id="showAdsUploadForm">Hirdetés feltöltése</button>
      <button type="button" class="mr-4 btn btn-primary" 
      data-toggle="modal" data-target="#ProfileUpdateModal">
          Profilom
      </button>
      <form action="../includes/logout.php"><input type="submit" class="btn btn-primary" name="LogOutButton" value="Kijelentkezés"></form>
    </div>
  </div>
</nav> --> 
<div class="container-fluid" id="AdsUploadForm" style="display: none;">
      <?php 
        require ('../src/adsUploadForm.php');
       ?>
</div>
       <?php
        require ('../src/adsListUserContainer.php');
       ?>
<div class="container-fluid">
<?php 
        include ('../includes/footerContainer.php');
       ?>
</div>       
<?php
  require ('../includes/userModals.php');
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../scripts/userFunctions.js"></script>
  

</body>
</html>