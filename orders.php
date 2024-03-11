<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect if not logged in
    exit();
}

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

// Fetch user-specific orders data
$order_table_name = $username . "_order";
$sql_fetch_orders_data = "SELECT * FROM `$order_table_name`"; // Selecting all orders for the user
$result_orders_data = mysqli_query($conn, $sql_fetch_orders_data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/ba586748f0.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- <nav>
        <section id="header">
            <a class="my-logo" href="#"><img src="logo1.jpg" alt=""></a>
            <a href="profile.php">
                <h2 class="user-profile"><?php echo "$username" ?></h2>
            </a>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="home.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <a href="#" id="close"><i class="material-symbols-outlined">close</i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </section>
    </nav> -->

    <h1>My Orders</h1>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Size</th>
                <th>Product Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result_orders_data) > 0) {
                while ($row = mysqli_fetch_assoc($result_orders_data)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>"; // Assuming there's a column named 'order_id'
                    echo "<td>" . $row['ordered_product_name'] . "</td>";
                    echo "<td><img src='" . $row['ordered_product_image'] . "' alt='Product Image'></td>";
                    echo "<td>" . $row['ordered_product_size'] . "</td>";
                    echo "<td>" . $row['ordered_product_price'] . "</td>";
                    echo "<td>" . $row['ordered_quantity'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>