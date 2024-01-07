<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "user";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = mysqli_real_escape_string($conn, $_POST['users']);

    $sql = "INSERT INTO review (username, review) VALUES ('', '$review')";
    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM users");
$reviews = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reviews[] = [
        'username' => $row['user_name'],
        'review' => $row['review']
    ];
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="review-page.css">
    <meta charset="UTF-8">
    <title>Review Page</title>
</head>
<link rel="stylesheet" href="home-style.css">
<link rel="shortcut icon" href="logo.png">

</head>
<body>
<header> </header>

<main1>  <! -- Hier begint Main -->

    <div class="navbar">
        <a href="main-index.html">Home</a>
        <a href="productpage-tryout.html">Products</a>
        <a href="review.php">Review</a>
        <a href="inlog-index.php">Login</a>
        <a href="contact.html">Contact</a>

    </div>
    <div class="shop-cart-img">
        <a href="winkelwagen.php">
            <img src="shopping-cart-white-hi.png" alt="shop-cart">
        </a>
    </div>
<body>
<div class="review-box">
    <form action="" method="post">
        <label for="review"></label>
        <textarea id="review" name="review" class="review-box"></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>

<div class="body">
    <p>reviews:</p>
    <div class="divider"></div>

    <?php
    foreach ($reviews as $review) {
        echo "<p>{$review['username']}:<br>{$review['review']}</p>";
    }
    ?>
</div>
<footer>
    <!-- Footer content -->
</footer>
<script src="header-footer.js"></script>
<script src="main.js"></script>
<style>
    body {
        background-color: lightgray;
    }
</style>
</body>
</html>





