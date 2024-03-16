<?php
session_start();
include('connect.php');
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());
}else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["UpStoreType"]) && isset($_POST["UpStoreDescription"]) && isset($_POST["UpStoreMobile"]) && isset($_POST["UpStoreEmail"]) && isset($_POST["UpStoreAddress"]) && isset($_POST["UpStoreName"])) {
            $UpStoreUserAz = $_SESSION['UserAz'];
            $UpStoreAdAz = NULL;
            $UpStoreName = $_POST["UpStoreName"];
            $UpStoreType = $_POST["UpStoreType"];
            $UpStoreAddress = $_POST["UpStoreAddress"];
            $UpStoreEmail = $_POST["UpStoreEmail"];
            $UpStoreMobile = $_POST["UpStoreMobile"];
            $UpStoreDescription = $_POST["UpStoreDescription"];
            $UpStoreDate = 'NOW()';
            $ImgDirectory = "../img/ads/";
            $ImgFileName = uniqid() . "_" . basename( $_FILES["FileToUpload"]["name"]);
            $ImgFileURL = $ImgDirectory . $ImgFileName;
            $UploadOk = 1;
            $ImgFileType = strtolower(pathinfo($ImgFileURL,PATHINFO_EXTENSION));
            if($ImgFileType != "jpg" && $ImgFileType != "png" && $ImgFileType != "jpeg" && $ImgFileType != "gif" ) {
                echo "<script>alert('Sajnálom, csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni.'); history.back();</script>";
                exit();
            }else{
                if (move_uploaded_file($_FILES["FileToUpload"]["tmp_name"], $ImgFileURL)) {
                    $INSERT= "INSERT INTO ads(AdAz, StoreName, StoreEmail, StoreMobile, ServiceType, StoreAddress, UserAz, StoreDescription, StoreImageURL, LastModifyDate) VALUES (?,?,?,?,?,?,?,?,?,NOW())";
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("sssssssss",$UpStoreAdAz,$UpStoreName,$UpStoreEmail,$UpStoreMobile,$UpStoreType,$UpStoreAddress, $UpStoreUserAz, $UpStoreDescription, $ImgFileURL);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    // echo 'A fájl sikeresen feltöltve.';
                    exit("<script>alert('A fájl sikeresen feltöltve.'); window.location.href = 'user.php';</script>");
                    // echo "<pre>";
                    // print_r($_REQUEST);
                    // echo "</pre>";
                    // echo "UpStoreName: " . $UpStoreName . "   ";
                    // echo "UpStoreType: " .$UpStoreType . "   ";
                    // echo "UpStoreUserAz: " . $_SESSION["UserAz"] . "   ";
                    // echo "ImgDatas:  " . $ImgFileURL . "    " . $ImgFileName . "   ";
                    // echo "FileToUpload: " . $FileToUpload . "  ";
                }else{
                    echo "<script>alert('Sajnálom, a képet nem sikerült feltölteni.');</script>";
                    // echo "<pre>";
                    // print_r($_FILES);
                    // echo "</pre>";
                    exit();
                }
                }
            }else{
                echo "Nincs meg minden adat!";
            }
    }else{
        echo "A kérés nem POST metódus!" ;
    }
}
?>