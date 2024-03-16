<?php
include ('connect.php');
if(isset($_POST['subEmail']) && !empty($_POST['subEmail'])){
    $subAz = NULL;
    $subEmail = $_POST['subEmail'];
    $select = "SELECT * FROM subscribes WHERE subEmail = ? LIMIT 1";
    
    echo $subEmail;
    $stmt = $conn->prepare($select);
    $stmt->bind_param("s", $subEmail);
    $stmt->execute();
    // $stmt->bind_result($subEmail);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum == 0) {
        $insert = "INSERT INTO subscribes(subAz, subEmail) VALUES (?,?)";
        $stmt->close();
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ss", $subAz, $subEmail);
        $stmt->execute();
        $stmt->close();
        exit("<script>alert('Sikeres feliratkozás!'); history.back();</script>");
    } else {
      echo "<script>alert('Ezzel az Email cimmel már feliratkoztak!'); history.back();</script>";
    }
    

}else{
    echo $subEmail;
    // exit("<script>alert('Hibás metódus kérés!'); history.back();</script>") ;
    
    die();
}
$conn->close();
?>
