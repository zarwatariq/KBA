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
    <link rel="homepage" href="#"
    <meta charset="UTF-8">
<header>

    <h1>NerdyGadgets</h1>
    <p>Make your day easier with NerdyGadgets!</p>

    <div class="circle">

    </div>

</header>   <! -- Hier eindigt Header -->
    <div class="navbar">
        <a href="home.html">Home</a>
        <a href="../../productpage/productpage-tryout.html">Producten</a>
        <a href="../../productoverzicht/productoverzicht.html">Product-overzicht</a>
        <a href="../../inlogpage/index.php">Inloggen</a>
        <a href="../../Contact/contact.html">Contact</a>

    </div>
<body>
<div class="container">
    <h2>Your Shopping Cart</h2>
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
            $aantal = intval($product['Aantal']);
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
        <a href="#" class="checkout-btn">Proceed to Checkout</a>
    </div>
</div>
<footer> <! -- Hier begint footer -->
    <div class="Mijnaccount">
        <h2>Mijn account</h2>
        <style>
            a {
                color: black;
                text-decoration: none;
            }
        </style>
        <p><a href="#" target="_blank">Login</a><br>
            <a href="#" target="_blank">Mijn Account</a><br>
            <a href="#" target="_blank">Mijn Orders</a></p>
    </div>
    <div class="Contact">
        <h2>Neem contact met ons</h2>
        <p><a href="#" target="_blank">Email</a><br>
            Telefoonnummer: [0612345678]<br>
            <a href="#" target="_blank">Website</a></p>
        <p>Copyright &copy; [2023] [NerdyGadgets]</p>
    </div>
</body>
</html>
