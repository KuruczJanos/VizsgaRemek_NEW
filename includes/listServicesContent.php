<?php
    include ('connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["listServices"])){
            echo $_POST;
        // $stmt = $conn->prepare("SELECT * FROM ads");
        // $stmt->execute();
        // $result = $stmt->get_result();

        //     if ($result->num_rows > 0) {
        //                 echo '<div class="grid-container">';
        //                 while($row = $result->fetch_assoc()) {
        //                   echo '<div class="cols-md-4">';
        //                     include ('../includes/homeCards.php');
        //                     echo '</div><br>';
        //                 }
        //                 echo '</div><br>';
        //                 } else {
        //                 echo "Nincs elérhető adat.";
        //                 }
        //                 $stmt->close();
        //                 $conn->close();
        }else{
            echo 'Ez még nem oké!!';
        }
    }else{
        echo 'A kérés nem POST metódus!';
    }
?> 
