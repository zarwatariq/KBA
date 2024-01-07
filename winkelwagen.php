<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "producten";
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$productnaam = $prijs = $aantal = $totaal = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_item'])) {
    $delete = mysqli_real_escape_string($conn, $_POST['delete_item']);

    $sql = "DELETE FROM `product` WHERE `productnaam` = '$delete'";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM product");
$producten = [];

while ($row = mysqli_fetch_assoc($result)) {
    $producten[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="winkelwagen.css">
    <link rel="javascript" href="winkelwagen-easter-egg.js">
    <link rel="homepage" href="#"
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home-style.css">
    <link rel="shortcut icon" href="logo.png">

</head>
<body>
<header> </header>

<main1>  <! -- Hier begint Main -->

    <div class="navbar">
        <a href="main-index.html">Home</a>
        <a href="productoverzicht-index.html">Products</a>
        <a href="inlog-index.php">Login</a>
        <a href="contact.html">Contact</a>

    </div>
    <div class="shop-cart-img">
        <a href="winkelwagen.php">
            <img src="shopping-cart-white-hi.png" alt="shop-cart">
        </a>
    </div>
    <div id="shopping-cart" class="hidden"></div>
    <br>
    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Totaal</th>
            <th>Actie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $totalePrijs = 0;
        ?>
        <?php foreach ($producten as $product): ?>
            <?php
            $prijs = floatval($product['prijs']);
            $aantal = intval($product['aantal']);
            $totaal = $prijs * $aantal;
            $totalePrijs += $totaal;
            ?>
            <tr>
                <td><?= $product['productnaam']; ?></td>
                <td>$<?= $prijs; ?></td>
                <td><?= $aantal; ?>x</td>
                <td>$<?= $totaal; ?></td>
                <form method="post" action="">
                    <input type="hidden" name="delete_item" value="<?= $product['productnaam']; ?>">
                    <td><button type="submit">Delete</button></td>
                </form>
            </tr>
        <?php endforeach; ?>
        <?php
        ?>
        </tbody>
    </table>

    <div class="cart-total">
        <h3>Totale Prijs:
            <tr>
                <td>$<?= $totalePrijs; ?></td>
            </tr>
        </h3>
        <button id="button" href="#" class="checkout-btn">Checkout</button>
    </div>
    <?php
    if ($totalePrijs == 0)
        echo '<canvas id="confetti"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
        <script src="winkelwagen-easter-egg.js"></script>
            ';
    ?>
    <footer>
        <!-- Footer content -->
    </footer>
    <script src="header-footer.js"></script>
    <script src="main.js"></script>
</body>
</html>
