    <?php
    // Verbinding maken met de database (vervang 'localhost', 'gebruikersnaam', 'wachtwoord' en 'database' door jouw eigen gegevens)
    $mysqli = new mysqli('localhost', 'gebruikersnaam', 'wachtwoord', 'database');

    // Checken op connectiefout
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Gegevens van het formulier ophalen
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Het wachtwoord hashen voordat het wordt opgeslagen

    // Query om gegevens in de database in te voeren
    $query = "INSERT INTO gebruikers (naam, email, wachtwoord) VALUES ('$naam', '$email', '$wachtwoord')";

    // Uitvoeren van de query
    if ($mysqli->query($query) === TRUE) {
        echo "Registratie succesvol!";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    // Verbinding met de database sluiten
    $mysqli->close();
    ?>
