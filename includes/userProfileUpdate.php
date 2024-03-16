<?php
session_start();
include('connect.php');

if(isset($_POST['UpdateButton'])) {
    $UserAzUP = $_SESSION['UserAz'];
    $UserPasswordUP = $_SESSION['UserPassword'];

    // Telefonszám frissítése (nem kell ellenőrizni)
    if(!empty($_POST['UpdateUserMobile']) ) {
        $UpdateUserMobile = $_POST['UpdateUserMobile'];
        $UPDATEMOBILE = "UPDATE users SET UserMobile = ? WHERE UserAz = ?";
        $stmt = $conn->prepare($UPDATEMOBILE);
        $stmt->bind_param('ss', $UpdateUserMobile, $UserAzUP);
        $stmt->execute();
        $stmt->close();
        exit("<script>alert('Sikeres telefon módositás!'); window.location.href = 'user.php';</script>");
    }

    // Jelszó frissítése
    if(!empty($_POST['UpdateUserPassword']) && !empty($_POST['UpdateUserRePassword'])) {
        $UpdateUserPassword = $_POST['UpdateUserPassword'];
        $UpdateUserRePassword = $_POST['UpdateUserRePassword'];

        // Ellenőrzés: jelszavak egyeznek
        if($UpdateUserPassword == $UpdateUserRePassword) {
            $UPDATEPASSWORD = "UPDATE users SET UserPassword = ? WHERE UserAz = ?";
            $stmt = $conn->prepare($UPDATEPASSWORD);
            $stmt->bind_param('ss', $UpdateUserPassword, $UserAzUP);
            $stmt->execute();
            $stmt->close();
            exit("<script>alert('Sikeres módositás!'); window.location.href = 'user.php';</script>");
        } else {

            exit("<script>alert('A jelszavak nem egyeznek!'); window.location.href = 'user.php';</script>");
        }
    }

    // Profilkép frissítése és régi kép törlése
    if(isset($_FILES['UserPhotoUpload']) && !empty($_FILES['UserPhotoUpload']['name'])) {
        $ImgDirectory = "../img/users/";
        $ImgFileName = uniqid() . "_" . basename($_FILES["UserPhotoUpload"]["name"]);
        $ImgFileURL = $ImgDirectory . $ImgFileName;

        // Ellenőrzés: érvényes képformátum
        $ImgFileType = strtolower(pathinfo($ImgFileURL, PATHINFO_EXTENSION));
        if($ImgFileType == "jpg" || $ImgFileType == "png" || $ImgFileType == "jpeg" || $ImgFileType == "gif") {
            // Régi profilkép törlése a szerverről
            // $query = "SELECT UserPhoto FROM users WHERE UserAz = ?";
            // $stmt = $conn->prepare($query);
            // $stmt->bind_param('s', $UserAzUP);
            // $stmt->execute();
            // $stmt->bind_result($oldUserPhoto);
            // $stmt->fetch();
            // $stmt->close();
            $oldUserPhoto = $_SESSION['UserPhoto'];

            if($oldUserPhoto && file_exists($oldUserPhoto)) {
                unlink($oldUserPhoto);
            }

            // Új profilkép feltöltése és frissítése az adatbázisban
            move_uploaded_file($_FILES["UserPhotoUpload"]["tmp_name"], $ImgFileURL);
            $UPDATEPHOTO = "UPDATE users SET UserPhoto = ? WHERE UserAz = ?";
            $stmt = $conn->prepare($UPDATEPHOTO);
            $stmt->bind_param('ss', $ImgFileURL, $UserAzUP);
            $stmt->execute();
            $stmt->close();
            $_SESSION['UserPhoto'] = $ImgFileURL;
            exit("<script>alert('Sikeres profilkép módositas!'); window.location.href = 'user.php';</script>");
        } else {
            exit("<script>alert('Csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni!'); window.location.href = 'user.php';</script>");
            // echo '<script>alert("Csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni!")</script>';
        }
    }

    exit("<script>alert('A megadott jelszavak nem egyeznek!'); window.location.href = 'user.php';</script>");
}
?>
