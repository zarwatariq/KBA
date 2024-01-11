<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="inlog-style.css">
    </head>
    <body>
    <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
    <a href="inlog-logout.php">Logout</a>

    </body>
    </html>
    <?php
} else {
    header("Location: inlog-index.php");
    exit();
}
?>
