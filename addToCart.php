<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); // Redirect if not logged in
        exit();
    }

    // Retrieve form data
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_size = $_POST['product_size'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $username = $_SESSION['username'];

    // Database connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "buyit";

    $conn = mysqli_connect($servername, $db_username, $db_password, $database);
    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    }

    // Prepare table name
    $cart_table_name = $username . "_cart";

    // Insert product into user's cart table
    $sql_insert_product = "INSERT INTO `$cart_table_name` (`product_name`, `product_image`, `product_size`, `product_price`, `quantity`) 
                           VALUES ('$product_name', '$product_image', '$product_size', '$product_price', '$quantity')";
    $result_insert = mysqli_query($conn, $sql_insert_product);

    if ($result_insert) {
        // Redirect to cart.php after successful insertion
        header("Location: cart.php");
        exit();
    } else {
        echo "Error adding product to cart: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close database connection
} else {
    // If not a POST request, redirect to homepage or handle error as needed
    header("Location: home.php");
    exit();
}
