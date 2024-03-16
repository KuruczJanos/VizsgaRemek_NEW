<?php
include('../includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrizzük, hogy az adott hirdetés azonosítója elküldve lett-e
    if (isset($_POST['ad_id'])) {
        $ad_id = $_POST['ad_id'];

        // Töröld az adott hirdetést az adatbázisból
        $stmt = $conn->prepare("DELETE FROM ads WHERE AdAz = ?");
        $stmt->bind_param("i", $ad_id);
        $stmt->execute();

        // Ellenőrizd, hogy sikeres volt-e a törlés
        if ($stmt->affected_rows > 0) {
            // echo "A hirdetés sikeresen törölve.";

                exit("<script>alert('A hirdetés sikeresen törölve lett!.'); window.location.href = '../admin/admin.php';</script>");
            
        } else {
            echo "Hiba történt a hirdetés törlése közben.";
        }

        $stmt->close();
    } else {
        echo "Hiba történt az adatok feldolgozása közben.";
    }
}

$conn->close();
?>