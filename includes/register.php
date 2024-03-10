<?php
session_start();
include('connect.php');
include('resetcodegen.php');

// Ellenőrizd az adatbázis kapcsolatot
if (mysqli_connect_error()) {
    echo ("<script>alert('Csak JPG, JPEG vagy PNG formátumú képeket lehet feltölteni.'); window.location.href = './src/home.php';</script>");
    die('Csatlakozási hiba (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Ellenőrizd, hogy a kapott adatok POST metódussal lettek-e elküldve
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $RegUserFullName = $_POST['RegUserFullName'];
    $RegUserName = $_POST['RegUserName'];
    $RegUserEmail = $_POST['RegUserEmail'];
    $RegUserMobile = $_POST['RegUserMobile'];
    $RegUserPassword = $_POST['RegUserPassword'];
    $RegUserRePassword = $_POST['RegUserRePassword'];
    $RegUserType = "0";
    $RegUserAz = "NULL";
    $RegUserPhoto = NULL; // Alapértelmezett érték, ha nem történik képfeltöltés
    $ImgDirectory = "../img/users/";
    $ImgFileName = uniqid() . "_" . basename( $_FILES["UserPhotoUpload"]["name"]);
    $ImgFileURL = $ImgDirectory . $ImgFileName;


    $RegResetCode = getRandomString($n);

    if ($RegUserPassword == $RegUserRePassword) {
        // Ellenőrizd, hogy a fájl valóban feltöltésre került-e és a megfelelő formátumban van-e
        if (isset($_FILES['UserPhotoUpload']) && $_FILES['UserPhotoUpload']['error'] === UPLOAD_ERR_OK) {
            $fileExtension = pathinfo($_FILES['UserPhotoUpload']['name'], PATHINFO_EXTENSION);
            $allowedExtensions = array('jpg', 'jpeg', 'png');

            if (in_array(strtolower($fileExtension), $allowedExtensions)) {

                // Mozgasd a feltöltött fájlt a megfelelő helyre
                move_uploaded_file($_FILES['UserPhotoUpload']['tmp_name'], $ImgFileURL);

                $RegUserPhoto = $ImgFileURL; // Állítsd be a kép nevét az adatbázisban tárolandó értékre
            } else {
                echo ("<script>alert('Csak JPG, JPEG vagy PNG formátumú képeket lehet feltölteni.'); window.location.href = './src/home.php';</script>");
            }
        }

        $SELECT = "SELECT UserEmail FROM users WHERE UserEmail = ? LIMIT 1";
        $INSERT = "INSERT INTO users(UserAz, UserName, UserPassword, UserEmail, UserMobile, UserFullName, Type, UserPhoto, ResetCode) VALUES (?,?,?,?,?,?,?,?,?)";

        // Előkészítés és email cím vizsgálata
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $RegUserEmail);
        $stmt->execute();
        $stmt->bind_result($RegUserEmail);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssssss", $RegUserAz, $RegUserName, $RegUserPassword, $RegUserEmail, $RegUserMobile, $RegUserFullName, $RegUserType, $RegUserPhoto, $RegResetCode);
            $stmt->execute();
            // echo ("Fasz van már?");
            exit("<script>alert('Felhasználó sikeresen regisztrálva!'); window.location.href = '../src/home.php';</script>");
            // echo "Új felhasználó sikeresen regisztráltva";
        } else {
          echo "<script>alert('Ezzel az Email cimmel már regisztráltak!'); history.back();</script>";
        }
        $stmt->close();
    } else {
      echo "<script>alert('A megadott jelszavak nem egyeznek!'); history.back();</script>";
        die();
    }
} else {
  exit("<script>alert('Hibás metódus kérés!'); history.back();</script>") ;
    
    die();
}

$conn->close(); // Zárd le az adatbázis kapcsolatot
?>
