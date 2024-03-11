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

// Function to handle item removal from cart
if (isset($_GET['remove']) && $_GET['remove'] == true && isset($_GET['id'])) {
    $id = $_GET['id'];
    $cart_table_name = $username . "_cart";
    $sql_delete_item = "DELETE FROM `$cart_table_name` WHERE id = $id";
    $result_delete = mysqli_query($conn, $sql_delete_item);
    if (!$result_delete) {
        echo "Error deleting item: " . mysqli_error($conn);
    } else {
        header("Location: cart.php"); // Redirect back to cart page after deletion
        exit();
    }
}

// Fetch user-specific cart data
$cart_table_name = $username . "_cart";
$sql_fetch_cart_data = "SELECT *, id FROM `$cart_table_name`"; // Selecting id
$result_cart_data = mysqli_query($conn, $sql_fetch_cart_data);

// Initialize total variable
$total = 0;

// Function to add order
function addOrder($conn, $username, $product_name, $product_image, $product_size, $product_price, $quantity, $order_total)
{
    $order_table_name = $username . "_order";
    $sql_add_order = "INSERT INTO `$order_table_name` (ordered_product_name, ordered_product_image, ordered_product_size, ordered_product_price, ordered_quantity, order_total_amount) VALUES ('$product_name', '$product_image', '$product_size', $product_price, $quantity, $order_total)";
    return mysqli_query($conn, $sql_add_order);
}

// Function to calculate total order amount
function calculateTotal($result_cart_data)
{
    $total = 0;
    while ($row = mysqli_fetch_assoc($result_cart_data)) {
        $total += $row['quantity'] * $row['product_price'];
    }
    return $total;
}

// Check if Place Order button is clicked
if (isset($_POST['place_order'])) {
    // Add each item to the order table
    while ($row = mysqli_fetch_assoc($result_cart_data)) {
        addOrder($conn, $username, $row['product_name'], $row['product_image'], $row['product_size'], $row['product_price'], $row['quantity'], $total);
    }
    // Calculate total order amount
    $total = calculateTotal($result_cart_data);
    // Redirect or show success message
    header("Location: orderanimation.php?total=$total");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUY-IT</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/ba586748f0.js" crossorigin="anonymous"></script>

</head>

<body>

    <nav>
        <section id="header">
            <a class="my-logo" href="#"><img src="logo1.jpg" alt=""></a>
            <a href="profile.php">
                <h2 class="user-profile"><?php echo "$username" ?></h2>
            </a>
            <div>
                <ul id="navbar">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li id="lg-bag"><a class="active" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <a href="#" id="close"><i class="material-symbols-outlined">close</i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </section>
    </nav>

    <section id="cart-page-header" class="about-header">
        <h2>Shopping Cart</h2>
    </section>

    <section id="shopping-cart">
        <div id="cart-details">
            <table>
                <thead>
                    <tr>
                        <th></th> <!-- Empty column for the remove icon -->
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Size</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Sub-Total</th> <!-- New column for sub-total -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result_cart_data) > 0) {
                        while ($row = mysqli_fetch_assoc($result_cart_data)) {
                            echo "<tr>";
                            echo "<td><a href='cart.php?remove=true&id=" . $row['id'] . "'><i class='fas fa-trash-alt'></i></a></td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td><img src='" . $row['product_image'] . "' alt='Product Image'></td>";
                            echo "<td><select name='size'>";
                            echo "<option value='XL' " . ($row['product_size'] == 'XL' ? 'selected' : '') . ">XL</option>";
                            echo "<option value='XXL' " . ($row['product_size'] == 'XXL' ? 'selected' : '') . ">XXL</option>";
                            echo "<option value='Small' " . ($row['product_size'] == 'Small' ? 'selected' : '') . ">Small</option>";
                            echo "<option value='Medium' " . ($row['product_size'] == 'Medium' ? 'selected' : '') . ">Medium</option>";
                            echo "<option value='Large' " . ($row['product_size'] == 'Large' ? 'selected' : '') . ">Large</option>";
                            echo "</select></td>";
                            echo "<td class='price'>" . $row['product_price'] . "</td>";
                            echo "<td><input type='number' name='quantity' value='" . $row['quantity'] . "' min='0' max='999'></td>";
                            // Calculate sub-total dynamically based on quantity
                            echo "<td class='subtotal'>₹" . ($row['quantity'] * $row['product_price']) . "</td>";
                            echo "</tr>";
                            // Add sub-total to total
                            $total += $row['quantity'] * $row['product_price'];
                        }
                    } else {
                        echo "<tr><td colspan='5'>No items in cart</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <span id="total">Total Amount: ₹<?php echo number_format($total, 2); ?></span>
        </div>
    </section>

    <section id="place-order-button">
        <button>Update Cart</button>

        <form method="post">
            <button type="submit" name="place_order">Place Order</button>
        </form>

    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="logo1.jpg" alt="">
            <h4>Contact: 000000000</h4>
            <p><strong>Address: 0000000</strong></p>
            <p><strong>Phone : 0000000000</strong></p>
            <p><strong>Hours : 9am-9pm</strong></p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="about.php">About us</a>
            <a href="#">Delivery Information</a>
            <a href="privacypolicy.php">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="logout.php">Sign In</a>
            <a href="cart.php">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="contact.php">Helps</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <a href=""><img src="get it on google-play-logo.png" alt=""></a>
                <a href=""><img src="get it on apple-store-logo.png" alt=""></a>
            </div>
            <p>Secured Payment Gateways</p>
            <!-- <img src="" alt=""> -->
        </div>

        <div class="copyright">
            @2024 All Rights Reserved.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('input[name="quantity"]');

            quantityInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const priceCell = row.querySelector('.price');
                    const subtotalCell = row.querySelector('.subtotal');
                    const price = parseFloat(priceCell.innerText.replace('₹', ''));
                    const quantity = parseInt(this.value);
                    const subtotal = price * quantity;
                    subtotalCell.innerText = '₹' + subtotal.toFixed(2);
                    updateTotal();
                });
            });

            function updateTotal() {
                const subtotalCells = document.querySelectorAll('.subtotal');
                let total = 0;
                subtotalCells.forEach(function(cell) {
                    total += parseFloat(cell.innerText.replace('₹', ''));
                });
                document.getElementById('total').innerText = 'Total Amount : ₹' + total.toFixed(2);
            }

            updateTotal(); // Initial update of Total
        });
    </script>


    <script src="cart.js"></script>
    <script src="home.js"></script>
</body>

</html>