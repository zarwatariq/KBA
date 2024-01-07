<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productnaam'])) {
    // Assuming you have a function to delete a product by ID
    $productId = $_POST['productnaam'];
    // Add your code to delete the product from the database or perform any other necessary actions
    // For example:
    // deleteProductById($productId);

    // Redirect back to the page after deletion
    header("Location: your_products_page.php");
    exit();
} else {
    // Invalid request, redirect back to the page
    header("Location: your_products_page.php");
    exit();
}
?><?php
