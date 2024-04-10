<?php
    include ('../includes/connect.php');

        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
                        echo '<div class="getCards row row-cols-1 row-cols-md-3 g-4  border-primary ">';
                        while($row = $result->fetch_assoc()) {
                            
                            include ('../admin/adminShowUsers.php');
                            
                        }
                        echo '</div><br>';
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
?> 