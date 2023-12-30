<?php
// Verbinding maken met de database (vervang 'gebruikersnaam', 'wachtwoord' en 'jouw_database' door de juiste waarden)
$mysqli = new mysqli('localhost', 'gebruikersnaam', 'wachtwoord', 'jouw_database');

// Controleer op fouten bij het verbinden
if ($mysqli->connect_error) {
    die("Verbindingsfout: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Verwerk de gegevens van het formulier
    $description = $_POST["description"];

    // Foto verwerken en opslaan
    $fileName = basename($_FILES["file"]["name"]);
    $targetDir = "uploads/";
    $targetPath = $targetDir . $fileName;

    // Controleer of de map 'uploads' bestaat, anders maak deze aan
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
        // Upload gelukt, voeg gegevens toe aan de database
        $sql = "INSERT INTO Photos (file_name, description, date_uploaded) VALUES ('$fileName', '$description', NOW())";

        if ($mysqli->query($sql) === TRUE) {
            echo "Foto succesvol geüpload en toegevoegd aan de database.";
        } else {
            echo "Fout bij het toevoegen aan de database: " . $mysqli->error;
        }
    } else {
        echo "Fout bij het uploaden van de foto.";
    }
}

// Sluit de databaseverbinding
$mysqli->close();

?>


