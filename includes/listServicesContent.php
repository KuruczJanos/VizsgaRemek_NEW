<?php
    include ('connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["listService"])){
            echo $_POST["listService"];
        $stmt = $conn->prepare("SELECT * FROM ads WHERE ServiceType = ? ");
        $stmt->bind_param("s", $_POST['listService']);
        $stmt->execute();
        $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                        echo '<div class="grid-container">';
                        while($row = $result->fetch_assoc()) {
                          echo '<div class="cols-md-4">';
                            echo $row['AdAz'];
                            // include ('../includes/listServices.php');
                            echo '</div><br>';
                        }
                        echo '</div><br>';
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
        }else{
            echo 'Ez még nem oké!!';
            
        }
    }else{
        echo 'A kérés nem POST metódus!';
    }
?> 
