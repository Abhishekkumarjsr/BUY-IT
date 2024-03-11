<?php
session_start();
$username = $_SESSION['username'];

if (!isset($username)) {
    // Redirect to login page if user is not logged in
    header("Location: index.php");
    exit(); // Stop script execution
}

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "buyit";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);

if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

// Fetch user-specific cart and order tables
$cart_table_name = $username . "_cart";
$order_table_name = $username . "_order";

// Example: Fetch data from the user's cart table
$sql_fetch_cart_data = "SELECT * FROM `$cart_table_name`";
$result_cart_data = mysqli_query($conn, $sql_fetch_cart_data);

// Example: Fetch data from the user's order table
$sql_fetch_order_data = "SELECT * FROM `$order_table_name`";
$result_order_data = mysqli_query($conn, $sql_fetch_order_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/ba586748f0.js" crossorigin="anonymous"></script>
    <script>
        function validateQuantity(input) {
            if (input.value <= 0) {
                input.value = 1; // Set quantity to 1 if it's less than or equal to zero
            }
        }
    </script>
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
                    <li><a class="active" href="home.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <a href="#" id="close"><i class="material-symbols-outlined">close</i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </section>
    </nav>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="products/formal/4.png" width="100%" id="MainImg" alt="">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="products/formal/4.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="products/formal/5.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="products/formal/6.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="products/formal/7.png" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="single-pro-details">
            <form method="post" action="addToCart.php">
                <h6>Home / Formal</h6>
                <h4>Formal Three-Piece Cream Suit With brown collar (4)</h4>
                <h2>₹999.00</h2>
                <input type="hidden" name="product_name" value="Formal Three-Piece Cream Suit With brown collar (4)">
                <input type="hidden" name="product_image" value="products/formal/4.png">
                <input type="hidden" name="product_price" value="999.00">
                <select name="product_size">
                    <option>Select Size</option>
                    <option>XL</option>
                    <option>XXL</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                </select>
                <input type="number" name="quantity" value="1" oninput="validateQuantity(this)">
                <button type="submit" name="add_to_cart">Add To Cart</button>
            </form>
            <h4>Product Details:</h4>
            <p><strong>Product Name:</strong> Formal Three-Piece Cream Suit With brown collar (4)</p>
            <p><strong>Description:</strong> Elevate your formal attire with our sophisticated three-piece cream suit,
                accented with a rich brown collar for a touch of distinction. Crafted with precision and attention to
                detail, this ensemble exudes elegance and refinement, perfect for special occasions or professional
                gatherings.</p>
            <p><strong>Features:</strong></p>
            <ul>
                <li>Premium Quality: Made from high-quality materials, ensuring durability and comfort throughout the
                    day.</li>
                <li>Tailored Fit: Designed for a sleek and modern silhouette, providing a polished look that commands
                    attention.</li>
                <li>Versatile Styling: The cream color palette offers versatility, allowing for effortless pairing with
                    a variety of shirts and accessories.</li>
                <li>Distinctive Brown Collar: The brown collar adds a subtle yet striking contrast, elevating the
                    sophistication of the ensemble.</li>
                <li>Three-Piece Set: Includes a tailored jacket, matching vest, and classic trousers, offering a
                    complete and cohesive look.</li>
            </ul>
            <p><strong>Ideal for:</strong></p>
            <ul>
                <li>Formal Events</li>
                <li>Business meetings</li>
                <li>Wedding ceremonies</li>
                <li>Cocktail parties</li>
            </ul>
            <p><strong>Available Sizes:</strong> S,M,L,XL,XXL</p>
            <p><strong>Care Instructions:</strong> Dry clean only for best results. Hang or steam to remove wrinkles.
                Store in a breathable garmeant bag to maintain its pristine condition.</p>
            <p><strong>Package Includes:</strong></p>
            <ul>
                <li>1 X Jacket</li>
                <li>1 X Vest</li>
                <li>1 X Pair of Trousers</li>
            </ul>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Parallel Picks</h2>
        <p>Similar products related Search</p>
        <div class="pro-container">
            <div class="pro" onclick="window.location.href='product-formal-2.html';">
                <img src="products/formal/2.png" alt="">
                <div class="des">
                    <samp>TrendyTrunk</samp>
                    <h5>Formal Three-Piece Cream Suit With brown collar</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$52</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="products/formal/3.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="products/formal/4.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="products/formal/5.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="products/formal/6.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="products/formal/7.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="/products/formal/8.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
            <div class="pro">
                <img src="products/formal/9.png" alt="">
                <div class="des">
                    <samp>adidas</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
            </div>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1 ">
        <div class="newstext">
            <h4>Sign Up</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
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

    <script src="home.js"></script>
</body>

</html>