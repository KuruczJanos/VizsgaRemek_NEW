<?php
// ob_start();
session_start();
include('connect.php');

if(isset($_POST['UpdateButton'])){

    $UpdateUserMobile = $_POST['UpdateUserMobile'];
    $UpdateUserPassword = $_POST['UpdateUserPassword'];
    $UpdateUserRePassword = $_POST['UpdateUserRePassword'];
    $UserAzUP = $_SESSION['UserAz'];
    $UserPasswordUP = $_SESSION['UserPassword'];
//echo $UpdateUserMobile; Működik
//echo $UpdateUserPassword; Működik
//echo $UpdateUserRePassword; Működik

//echo $_SESSION['UserMobile'];
//echo ' ';
//echo $UpdateUserMobile;
if($UpdateUserMobile != $_SESSION['UserMobile']){//strlen($UpdateUserMobile) >=11 szöveghossz feltétel
    $UPDATEMOBILE = "UPDATE users SET UserMobile = (?) WHERE UserAz = '$UserAzUP'  ";
    $stmt = $conn->prepare($UPDATEMOBILE);
    $stmt -> bind_param('s', $UpdateUserMobile);
    $stmt -> execute();
    $stmt -> close();
}else{
}
if($UpdateUserPassword != $UserPasswordUP && $UpdateUserPassword==$UpdateUserRePassword){
    $UPDATEPASSWORD = "UPDATE users SET UserPassword = (?) WHERE UserAz = '$UserAzUP'  ";
    $stmt = $conn->prepare($UPDATEPASSWORD);
    $stmt -> bind_param('s', $UpdateUserPassword);
    $stmt -> execute();
    $stmt -> close();
}else{        echo  
    '<script>alert("A megadott jelszavak nem egyeznek!")</script>';
}
header ('Location: ../includes/user.php');

}