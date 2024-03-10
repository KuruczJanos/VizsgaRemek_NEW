<?php
ob_start();
session_start();
include ('header.php');
include('connect.php');
if(isset($_POST['LoginButton'])){

$LogEmail=$_POST['LogEmailInput'];

$LogPassword=$_POST['LogPassInput'];

$qry="SELECT * From users Where UserEmail='$LogEmail' && UserPassword='$LogPassword' ";

$c=mysqli_query($conn, $qry);

$result=mysqli_query($conn,$qry);

$num = mysqli_num_rows($result);




if($num == 1)
{
    while($rows = $result ->fetch_assoc()){
        $ActiveUserAz = $rows['UserAz'];
        $ActiveUserName = $rows['UserName'];
        $ActiveUserFullName = $rows['UserFullName'];
        $ActiveUserEmail = $rows['UserEmail'];
        $ActiveUserPassword = $rows['UserPassword'];
        $ActiveUserMobile = $rows['UserMobile'];
        $ActiveUserPhoto = $rows['UserPhoto'];
    }
//$_SESSION['results'] = $result['UserAz'];
//$_SESSION['UserEmail'] = $LogEmail;
$_SESSION['UserAz'] = $ActiveUserAz;
$_SESSION['UserName'] = $ActiveUserName;
$_SESSION['UserFullName'] = $ActiveUserFullName;
$_SESSION['UserEmail'] = $ActiveUserEmail;
$_SESSION['UserMobile'] = $ActiveUserMobile;
$_SESSION['UserPassword'] = $ActiveUserPassword;
$_SESSION['UserPhoto'] = $ActiveUserPhoto;

    if($ActiveUserEmail==$LogEmail && $ActiveUserPassword==$LogPassword){
         header("Location: ../includes/user.php");
        } else {
            echo  
            '<script>alert("A felhasználó név vagy a jelszó hibás!")</script>';
            }
//print 'Üdv, '.$adatok['UserEmail'].''; //belépett falhasználó, ha kiírja a nevét akkor működik
//setcookie("UserEmail", "$LogEmail");
//echo  " a user neve: $_SESSION ";
}
else
{
echo
'<script>alert("A felhasználó név vagy a jelszó hibás!")</script>';
//"<div class='form'>
//<h3>A felhasználó név vagy a jelszó hibás!</h3>
//<br/>Kattints ide az oldal  <a href='../src/home.php'>újratöltéséért!</a></div>";
}
//else if(isset($_SESSION["UserEmail"])){ //Ha sikerült belépni a  belső tartalom
    //print 'Üdv, '.$_SESSION['UserEmail'].''; //belépett falhasználó, ha kiírja a nevét akkor működik
//}
}
?>