<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Handle unauthorized access
    exit("Unauthorized access");
}

$username = $_SESSION['username'];

// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "buyit";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    // Handle database connection error
    exit("Database connection error: " . mysqli_connect_error());
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode JSON data
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data) {
        // Iterate over each item and update the user-specific table
        foreach ($data as $item) {
            $id = $item['id'];
            $size = $item['size'];
            $quantity = $item['quantity'];

            // Prepare and execute SQL update statement
            $cart_table_name = $username . "_cart";
            $sql_update_item = "UPDATE `$cart_table_name` SET product_size='$size', quantity=$quantity WHERE id=$id";
            $result_update = mysqli_query($conn, $sql_update_item);

            if (!$result_update) {
                // Handle SQL update error
                echo "Error updating item with ID $id: " . mysqli_error($conn);
                exit(); // Exit script if there's an error
            }
        }
        // Close database connection
        mysqli_close($conn);

        // Redirect to cart.php after successful update
        header("Location: cart.php");
        exit();
    } else {
        // Handle invalid JSON data
        http_response_code(400);
        echo "Invalid JSON data";
    }
} else {
    // Handle non-POST requests
    http_response_code(405);
    echo "Method Not Allowed";
}
