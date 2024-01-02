<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "producten";
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$productnaam = $prijs = $aantal = $totaal = ''; // Initialize variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productnaam = mysqli_real_escape_string($conn, $_POST['productnaam']);
    $prijs = mysqli_real_escape_string($conn, $_POST['prijs']);
    $aantal = mysqli_real_escape_string($conn, $_POST['aantal']);
    $totaal = mysqli_real_escape_string($conn, $_POST['totaal']);

    $sql = "INSERT INTO product (productnaam, prijs, aantal, totaal) VALUES ('$productnaam', '$prijs', '$aantal', '$totaal')";

    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
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
    <meta charset="UTF-8">
</head>
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
            </tr>
        <?php endforeach; ?>
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
</body>
</html>
