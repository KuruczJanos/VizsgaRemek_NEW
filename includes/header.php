<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="banner">
<div class="navbar-header">
  <a href="" class="home navbar-brand"><b>Az oldal neve</b>Találjuk ki!</a>
</div>
<nav class="navbar navbar-expand-lg navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

    <div class="buttons navbar-nav ml-auto">
      
      <button type="button" class="mr-4 btn btn-primary" 
      data-toggle="modal" data-target="#signinModal">
          Bejelentkezés
      </button>
      <button type="button" class="btn btn-primary" 
      data-toggle="modal" data-target="#addModal">
          Regisztráció
      </button>
    </div>
  </div>
</nav>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">
        Regisztráció
      </h1>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form name="RegisterForm" action="../includes/register.php" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Teljes Név" id="RegUserFullName" name="RegUserFullName" class="form-control mt-3" required="">
        <input type="text" placeholder="Felhasználó név" id="RegUserName" name="RegUserName" class="form-control mt-3" required="">
        <input type="email" placeholder="Email cím" id="RegUserEmail" name="RegUserEmail" class="form-control mt-3" required="">
        <input type="text" placeholder="Telefonszám" id="RegUserMobile" name="RegUserMobile" class="form-control mt-3" required="">
        <input type="password" placeholder="Jelszó" id="RegUserPassword" name="RegUserPassword" class="form-control mt-3" required="">
        <input type="password" placeholder="Jelszó megerősítése" id="RegUserRePassword" name="RegUserRePassword" class="form-control mt-3" required="">
        <label for="" class="m-auto">Kép feltöltés</label><br>
        <input type="file" class=""  name="UserPhotoUpload" id="UserPhotoUpload"><br><br>
        <Input type="checkbox" required=""></Input>
        <A href="../src/general.html">Általános felhasználói feltételek elfogadása</A>
        <br>
        <input type="submit" class="btn btn-primary mt-3" name="submit" value="Regisztráció">
        <br><br>
      </form>
    </div>
    <div class="modal-footer"> </div>
  </div>
</div>
</div>
<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">
        Belépés
      </h1>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form name="LoginForm" action="" method="POST" >
        <p>Email cím</p>
        <input type="email" class="form-control" name="LogEmailInput" placeholder="valaki@valami.com" required="">
        <p class="mt-3">Jelszó</p>
        <input type="password" class="form-control" name="LogPassInput" placeholder="Jelszó megadása" required="">
        <div class="forgetpass mt-3">
          <a href="./forgetpass.html">Elfelejtetted a jelszavad?</a>
        </div>
        <br><br>
        <input type="submit" class="btn btn-primary" name="LoginButton" value="Bejelentkezés">
        <br><br>

    </div>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
</body>
</html>





