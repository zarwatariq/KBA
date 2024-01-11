<?php
// Sample product data (replace this with your actual data)
$products = [
    ['name' => 'Product 1', 'price' => 50, 'category' => 'laptops', 'image' => '0VBKqGE85lq5.jpg'],
    ['name' => 'Product 2', 'price' => 200, 'category' => 'laptops', 'image' => '4GPNDDRJp92J.jpg'],
    ['name' => 'Product 3', 'price' => 300, 'category' => 'laptops', 'image' => '3jx92Qogw0Xn.jpg'],
    ['name' => 'Product 4', 'price' => 100, 'category' => 'phones', 'image' => '50GWOQE58kZq.jpg'],
    ['name' => 'Product 5', 'price' => 100, 'category' => 'games', 'image' => '50GWOQE58kZq.jpg'],
];

// Get filter values from the request
$priceFilter = isset($_GET['price']) ? $_GET['price'] : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';

// Filter products based on selected criteria
$filteredProducts = array_filter($products, function ($product) use ($priceFilter, $categoryFilter) {
    $priceCondition = empty($priceFilter) || ($priceFilter == 'low' && $product['price'] <= 200) || ($priceFilter == 'high' && $product['price'] > 200);
    $categoryCondition = empty($categoryFilter) || $product['category'] == $categoryFilter;

    return $priceCondition && $categoryCondition;
});

// Output the filtered product list
foreach ($filteredProducts as $product) {
    echo '<div class="product">';
    echo '<img src="product-images/' . $product['image'] . '" alt="' . $product['name'] . '">';
    echo '<div class="product-details">';
    echo '<h2>' . $product['name'] . '</h2>';
    echo '<p><strong>Price:</strong> €' . $product['price'] . '</p>';
    echo '<p><strong>Description:</strong> This is ' . $product['name'] . '.</p>';
    echo '</div></div>';
}

