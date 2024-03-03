<?php
$_SESSION_start();
$targetDirectory = "img/ads/";
$uploadFileName = uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);
$targetFile = $targetDirectory . $uploadFileName;
// $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Ellenőrizzük, hogy a fájl valódi kép-e vagy sem
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "A fájl egy kép - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "A fájl nem egy kép.";
        $uploadOk = 0;
    }
}

// Ellenőrizzük, hogy a fájl már létezik-e
// if (file_exists($targetFile)) {
//     echo "Sajnálom, a fájl már létezik.";
//     $uploadOk = 0;
// }

// Engedélyezett fájlformátumok ellenőrzése
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sajnálom, csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni.";
    $uploadOk = 0;
}

// Feltöltés engedélyezése vagy tiltása
if ($uploadOk == 0) {
    echo "Sajnálom, a fájl nem lett feltöltve.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "A fájl ". basename( $_FILES["fileToUpload"]["name"]). " sikeresen feltöltve.";
    } else {
        echo "Sajnálom, hiba történt a fájl feltöltésekor.";
    }
}
?>
