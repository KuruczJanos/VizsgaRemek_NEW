<nav class="user navbar navbar-expand-lg navbar-dark">
    <a class="text-secondary user navbar-brand">
        <img src="<?php echo $_SESSION['UserPhoto']?>" width="100" height="100" class="d-inline-block align-top" alt="">
        Hello <?php echo " " . $_SESSION['UserFullName'];?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <!-- Meg kell csinálni, hogy ugyanúgy nézzenek ki a gombok -->
            <button class="mr-lg-4 mr-sm-0 btn btn-primary" id="showAdsUploadForm">Hirdetés feltöltése</button>
            <button type="button" class="mr-lg-4 mr-sm-0 btn btn-primary" data-toggle="modal" data-target="#ProfileUpdateModal">Profilom</button>
            <form class="navbar-nav ml-auto" action="../includes/logout.php">
            <button type="submit" class="mr-lg-4 mr-sm-0 btn btn-primary">Kijelentkezés <!--<form action="../includes/logout.php"><input type="submit" class="hidden" name="LogOutButton" value="Kijelentkezés"></form> -->
            </button></form>

        </div>
    </div>
</nav>