<?php
// Login form beküldése
if (isset($_POST['LoginButton'])) {
    include ('logvalid.php');
    // Itt hajtsd végre a bejelentkezési műveleteket
    // Például: adatbázis ellenőrzés, bejelentkezési logika stb.
    // header("Location: ../includes/logvalid.php"); // Irányítás a logvalid.php fájlra
    exit(); // Kilépés a szkript végrehajtásából
}

// Feliratkozás űrlap beküldése
if (isset($_POST['SubscribeButton'])) {
    include ('subscribe.php');
    // Itt hajtsd végre a feliratkozási műveleteket
    // Például: adatbázisba mentés, ellenőrzések stb.
    // header("Location: ../includes/subscribe.php"); // Irányítás a subscribe.php fájlra
    exit(); // Kilépés a szkript végrehajtásából
}
if (isset($_POST['listService'])) {
    include ('listServicesContent.php');
    // Itt hajtsd végre a feliratkozási műveleteket
    // Például: adatbázisba mentés, ellenőrzések stb.
    // header("Location: ../includes/subscribe.php"); // Irányítás a subscribe.php fájlra
    exit(); // Kilépés a szkript végrehajtásából
}
?>
