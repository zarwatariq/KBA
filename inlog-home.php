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
        <link rel="stylesheet" type="text/css" href="home-style.css"
        <link rel="shortcut icon" href="logo.png">
    </head>
    <body>
    <h5>Hello, <?php echo $_SESSION['name']; ?></h5>
    <header> </header>

    <main1>  <! -- Hier begint Main -->

        <div class="navbar">
            <a href="main-index.html">Home</a>
            <a href="productoverzicht-index.html">Products</a>
            <a href="productpage-tryout.html">Sale</a>
            <a href="review.php">Review</a>
            <a href="inlog-index.php">Login</a>
            <a href="contact.html">Contact</a>


        </div>

        </div>
        <div class="shop-cart-img">
            <a href="winkelwagen.php">
                <img src="shopping-cart-white-hi.png" alt="shop-cart">
            </a>
        </div>
        <div class="gif-container">
            <img src="image/hell.gif" alt="Your GIF">
        </div>
    <a href="inlog-logout.php">Logout</a>
    </main1>

    </body>
    <footer> </footer>

    <script src="main.js"></script>
    <script src="header-footer.js"></script>
    </html>
    <?php
} else {
    header("Location: inlog-index.php");
    exit();
}
?>
