<?php
$notification = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "test0987456@gmail.com";
    $subject = "Nieuw contactbericht van $name";
    $txt = "Naam: $name\nEmail: $email\nBericht: $message";

    // Stuur het emailbericht
    if (mail($to, $subject, $txt)) {
        $notification = "Bedankt! Je bericht is verzonden.";
    } else {
        $notification = "Er is een probleem opgetreden bij het verzenden van je bericht. Probeer het later opnieuw.";
    }
}




