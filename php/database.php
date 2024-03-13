<?php
require_once 'config.php';

try {
    // Versuch, eine Verbindung zur Datenbank herzustellen
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    // Setzen des PDO-Fehlermodus, um Ausnahmen zu werfen
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Fehlerbehandlung
    die("ERROR: Could not connect. " . $e->getMessage());
}

function saveContactForm($name, $email, $message)
{
    global $pdo;
    try {
        // Bereite eine insert-Anweisung vor
        $sql = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $pdo->prepare($sql);

        // Binde Parameter an Anweisung
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

        // Führe die Anweisung aus
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>