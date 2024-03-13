<?php
require_once 'database.php'; // Bindet die Datenbankverbindung ein

// Überprüfung, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingaben des Benutzers sichern
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Einfache Validierung (in der Praxis sollten Sie eine gründlichere Validierung implementieren)
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Speichern der Daten in der Datenbank
        if (saveContactForm($name, $email, $message)) {
            // Erfolgsfall: Eine Bestätigungsseite oder eine Erfolgsmeldung anzeigen
            echo "<p>Vielen Dank für Ihre Kontaktaufnahme, $name. Wir werden uns bald bei Ihnen melden!</p>";
        } else {
            // Fehlerfall: Eine Fehlermeldung anzeigen
            echo "<p>Entschuldigung, es gab ein Problem bei der Übermittlung Ihrer Anfrage. Bitte versuchen Sie es später erneut.</p>";
        }
    } else {
        // Fehlerfall: Dem Benutzer mitteilen, dass alle Felder ausgefüllt werden müssen
        echo "<p>Bitte füllen Sie alle Felder aus.</p>";
    }
}
?>