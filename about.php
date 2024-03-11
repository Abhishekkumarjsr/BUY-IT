<?php
session_start();
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "users";

    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUY-IT</title>
    <link rel="stylesheet" type="text/css" href="about.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/ba586748f0.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
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
                    <li><a class="active" href="about.php">About</a></li>
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

    <section id="about">
        <div class="about-content">
            <h3>Hello, It's Me</h3>
            <h1>Abhishek Kumar</h1>
            <h3>And I'm <span class="text"></span> of this Site.</h3>
            <p></p>
            <div class="about-sci">
                <a href="#" style="--i:1"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" style="--i:2"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" style="--i:3"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" style="--i:4"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="#" style="--i:5"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            <a href="#" class="about-btn-box">More About Me</a>
        </div>
    </section>

    <!-- <section id="page-header" class="about-header">
        <h2>#KnowUs</h2>
        <p></p>
    </section> -->

    <section id="about-head" class="sectoin-p1">
        <div class="about-weblogo">
            <img src="weblogo.png" alt="">
        </div>
        <div class="about-head-content">
            <h2>Who We Are?</h2>
            <p>"At <span>BUY-IT</span>, we are passionate about providing high-quality clothing options for every style and occasion. With a curated selection of the latest trends and timeless classics, we strive to offer a seamless shopping experience for our customers. Our commitment to exceptional customer service and satisfaction sets us apart, ensuring that you always look and feel your best. Welcome to <span>BUY-IT</span>, where fashion meets convenience."</p>
            <p>"As a team of dedicated fashion enthusiasts, we are on a mission to bring you the latest trends and timeless classics at affordable prices. With a keen eye for style and quality, we carefully curate our collections to cater to every taste and occasion. Whether you're looking for everyday essentials or statement pieces, we've got you covered. Join us in celebrating individuality, confidence, and effortless style with every purchase at <span>BUY-IT</span>."</p>
            <abbr title=""></abbr>

            <br><br>

        </div>
    </section>
    <!-- <marquee bgcolor="#fff" loop="-1" scrollamount="5" width="100%">#FashionForAll &nbsp; #StyleSimplified &nbsp; #TrendyEssentials &nbsp; #ConfidenceInEveryOutfit &nbsp; #FashionFinds &nbsp; #ShopWithConfidence &nbsp; #CuratedCollections &nbsp; #FashionForward &nbsp; #WardrobeEssentials &nbsp; #ElevateYourStyle</marquee> -->

    <!-- <section id="about-app" class="sectoin-p1">
        <h1>Download Our <a href="#">App</a></h1>
        <div class="video">
            <video autoplay muted loop src=""></video>
        </div>
    </section> -->

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
    <script src="about.js"></script>
</body>

</html>