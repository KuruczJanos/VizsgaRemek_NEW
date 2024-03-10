<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrizd, hogy a változók üresek-e, és biztosítsd a biztonságos adatfeldolgozást
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Ellenőrizd, hogy az email és a szöveg üres-e
    if (!empty($email) && !empty($message)) {
        // Az e-mail fejléce
        $to = "cím@example.com"; // Ide írd be az e-mail címedet
        $subject = "Új üzenet érkezett az űrlapból";
        $headers = "From: " . $email;

        // Az e-mail tartalma
        $email_content = "Új üzenet érkezett az űrlapból:\n\n";
        $email_content .= "E-mail: $email\n\n";
        $email_content .= "Üzenet:\n$message\n";

        // E-mail küldése
        if (mail($to, $subject, $email_content, $headers)) {
            echo "Az üzenet sikeresen elküldve.";
        } else {
            echo "Hiba történt az üzenet elküldése közben.";
        }
    } else {
        echo "Kérjük, töltse ki az összes mezőt az űrlapon.";
    }
}
?>