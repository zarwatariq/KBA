<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "review";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review = $_POST['review'];

    echo "Review submitted successfully!";
} else {
    echo "Error: " . "<br>" . mysqli_error($conn);
}

$conn->close();




