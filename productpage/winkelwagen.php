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
            <th>Actie</th>
        </tr>
        </thead>
        <tbody>
     <?php
     foreach ($producten as $product):
         $prijs = floatval($product['prijs']);
         $aantal = intval($product['Aantal']);
         $totaal = $prijs * $aantal;
         ?>
     <?php endforeach; ?>
        <?php foreach ($producten as $product): ?>
            <tr>
                <td><?= $product['productnaam']; ?></td>
                <td>$<?= $product['prijs']; ?></td>
                <td><?= $product['Aantal']; ?>x</td>
                <td>$<?= $totaal; ?></td>
                <td><button>Delete</button></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="cart-total">
        <h3>Totale Prijs:

        </h3>
        <a href="#" class="checkout-btn">Proceed to Checkout</a>
    </div>
</div>
</body>
</html>
