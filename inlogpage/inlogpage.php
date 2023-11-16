<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mijn homepage</title>
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="shortcut icon" href="logo.png">
  <link rel="home page" href="C:\xampp\KBS\home.html">
</head>
<body>

<?php
$Gebruikersnaam = " ";
$Wachtwoord = " ";
$toonformulier = true;
if (isset($_GET["knop"])) {
    $Gebruikersnaam = $_GET["Gebruikersnaam"];
    $Wachtwoord = $_GET["Wachtwoord"];
    if ($Gebruikersnaam == " " || $Wachtwoord == " "){
        print ("Alle velden zijn verplicht");
    }else{
        print ("Bedankt");
        $toonformulier = false;
    }
}
?>
<?php
if ($toonformulier){
?>

<form method="GET" action="inlogpage.php">
    Gebruikersnaam: <input type="text" name="Gebruikersnaam" value="<?php print($Gebruikersnaam); ?>"><br>
    Wachtwoord: <input type="text" name="Wachtwoord" value="<?php print($Wachtwoord); ?>"><br>
    <input type="submit" name="knop" value="verstuur">
</form>
<?php
}
?>



</body>
</html>

