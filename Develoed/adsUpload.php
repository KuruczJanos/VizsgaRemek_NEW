<?php
session_start();
include('connect.php');
//include('resetcodegen.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // if (isset($_POST["UpStoreType"]) && isset($_POST["UpStorDescription"]) && isset($_POST["UpStoreMobile"]) && isset($_POST["UpStoreEmail"]) && isset($_POST["UpStoreAddress"]) && isset($_POST["UpStoreName"])) {
    $UpStoreName = $_POST["UpStoreName"];
    $UpStoreAddress = $_POST["UpStoreAddress"];
    $UpStoreEmail = $_POST["UpStoreEmail"];
    $UpStoreMobile = $_POST["UpStoreMobile"];
    $UpStoreDescription = $_POST["UpStoreDescription"];
    $UpStoreType = $_POST["UpStoreType"];
    // $UpStoreImageURL = $_POST['UpStoreImageURL'];
//$RegUserType = "0";
    $UpStoreAdAz = ["NULL"];
    $UpStoreUserAz = $_SESSION['UserAz'];
//$RegResetCode = getRandomString($n);
    $targetDirectory = "img/ads/";
    $uploadFileName = uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDirectory . $uploadFileName;
// $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

//if ($RegUserPassword == $RegUserRePassword)
//{

    if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());

    }else{
      if($check !== false) {
        echo "A fájl egy kép - " . $check["mime"] . ".";
        $uploadOk = 1;
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sajnálom, csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni.";
            $uploadOk = 0;
        }else{
          if ($uploadOk == 0) {
            echo "Sajnálom, a fájl nem lett feltöltve.";
          }else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
              echo "A fájl ". basename( $_FILES["fileToUpload"]["name"]). " sikeresen feltöltve.";
             
                // $SELECT = "SELECT UserEmail From users Where UserEmail = ? Limit 1";
                $INSERT= "INSERT INTO ads(AdAz, StoreName, StoreEmail, StoreMobile, ServiceType, StoreAddress, UserAz, StoreDescription, StoreImageURL) VALUES (?,?,?,?,?,?,?,?,?)";
                //Előkészítés és email cím vizsgálata
                //$stmt = $conn->prepare($SELECT);
                //$stmt->bind_param("s", $RegUserEmail);
                //$stmt->execute();
                //$stmt->bind_result($RegUserEmail);
                //$stmt->store_result();
                //$rnum = $stmt->num_rows;
                //if ($rnum==0) {
                //$stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssssss",$UpStoreAdAz,$UpStoreName,$UpStoreEmail,$UpStoreMobile,$UpStoreType,$UpStoreAddress, $UpStoreUserAz, $UpStoreDescription, $targetFile);
                $stmt->execute();
                echo "A hirdetés sikeresen feladva!";
                // else {
                echo "Az email címmel már regisztráltak!";
                //}
                $stmt->close();
                $conn->close();  
                //} else {
                //echo
                //"<div class='form'>
                //<h3>A megadott jelszavak nem egyeznek!</h3>
                //<br/>Kattints ide az oldal  <a href='../src/home.php'>újratöltéséért!</a></div>";
                die();
              }else{
                echo "Sajnálom, hiba történt a fájl feltöltésekor.";
              }
          }
        }
      }else {
        echo "A fájl nem egy kép.";
        $uploadOk = 0;
      }
    }
  // } else {
  //     // Ha hiányoznak az űrlap mezői, hibaüzenetet küldünk
  //     echo "Hiányzó adatok!";
  //     echo $_POST["UpStoreName"] ." ". $_POST["UpStoreType"] ." ". $_POST["UpStoreAddress"] ." ".$_POST["UpStoreEmail"] ." ".$_POST["UpStoreMobile"] ." ".$_POST["UpStoreDescription"];
  // }
} else{
  echo 'Hozzáférés megtagadva!';
}
?>