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
    </nav>

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button>Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="feature/fe1.jpg" alt="">
            <h6>Free shipping</h6>
        </div>
        <div class="fe-box">
            <img src="feature/fe2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="feature/fe3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="feature/fe4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="feature/fe5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="feature/fe6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Formal Collection New Morden Design</p>
        <div class="pro-container">
            <div class="pro" onclick="window.location.href='product-formal-1.php';">
                <img src="products/formal/1.png" alt="">
                <div class="des">
                    <samp>TrendyTrunk</samp>
                    <h5>Classic Three-piece cream suit</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₹3999.00 Only</h4>
                </div>
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='product-formal-2.php';">
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
                    <h4>₹2999.00 Only</h4>
                </div>
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='product-formal-3.php';">
                <img src="products/formal/3.png" alt="">
                <div class="des">
                    <samp>TrendyTrunk</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₹1999.00 Only</h4>
                </div>
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <div class="pro" onclick="window.location.href='product-formal-4.php';">
                <img src="products/formal/4.png" alt="">
                <div class="des">
                    <samp>TrendyTrunk</samp>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>₹999.00 Only</h4>
                </div>
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Branded Accessories</h4>
        <h2>Up to <span>70% off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Casul & Formal Collection New Morden Design</p>
        <div class="pro-container">
            <div class="pro">
                <img src="products/casul/1.png" alt="">
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
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="products/casul/2.png" alt="">
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
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="products/casul/3.png" alt="">
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
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="products/casul/4.png" alt="">
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
                <div id="cart-logo">
                    <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Crazy Deals</h4>
            <h2>Buy 1 get 1 free</h2>
            <span>The best classic dress is on sale!</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>Spring/Summer</h4>
            <h2>Upcomming season</h2>
            <span>The best classic dress is on sale!</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring/Summer 2024</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
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