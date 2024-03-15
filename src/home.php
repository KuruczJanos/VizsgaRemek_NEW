<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Projekt</title>
   
        <!-- Bootstrap/CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/source.scss">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      <?php 
      require ('../includes/logvalid.php');
       ?>
      

      <div class="container">
        <h4 class="text-center fw-light m-4">Fedezd fel a szépség és ápolás legjobbjait egyetlen kattintással! <br> 
          Az ideális szakembertől a tökéletes megjelenésért, minden szépségápolási szolgáltatás egy helyen!</h4>
        <h1 class="text-center p-3">Szolgáltatások</h1>
        <?php 
          require ('../includes/cardbx.php');
       ?>
      </div> 
    <footer class="container-fluid text-dark">
      <div class="footemail row align-middle">
        <div class="col-md-4 col-12">
          <h3>Feliratkozás</h3>
          <p>Iratkozz fel, hogy értesülj friss partnereinkről!</p>
          <form class="form-inline">
            <input type="email" class="form-control" placeholder="example@example.com" />
            <button class="btn btn-danger m-1">Feliratkozom</button>
          </form>
        </div>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
  </body>

    <script src="../scripts/functions.js"></script>
    
  </body>
</html>
