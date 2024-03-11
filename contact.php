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
                    <li><a class="active" href="contact.php">Contact Us</a></li>
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

    <section id="page-header" class="about-header">
        <h2>#Let's_Talk</h2>
        <p>LEAVE A MESSAGE,We love to hear from you!</p>
    </section>

    <section id="contact-details">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency location or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="material-symbols-outlined">map</i>
                    <p>Tinplat,Golmuri,Jamshedpur-831003</p>
                </li>
                <li>
                    <i class="material-symbols-outlined">mail</i>
                    <p>ecom.buy.it@gmail.com</p>
                </li>
                <li>
                    <i class="material-symbols-outlined">phone_in_talk</i>
                    <p>0000000000</p>
                </li>
                <li>
                    <i class="material-symbols-outlined">schedule</i>
                    <p> 9:00 am - 9:00 pm </p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14713.245172300421!2d86.22117073962015!3d22.790926451888392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f5e2ea1b6980d7%3A0x295eb90acd1f254a!2sTin%20Plate%20Basti%2C%20Jamshedpur%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1709188199011!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name">
            <input type="text" placeholder="E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>

        <div class="people">
            <div>
                <img src="img/abhishekkumar.png" alt="">
                <p><span>Abhishek Kumar</span> Founder & Owner of this Site <br> Phone: + 0000000000 <br> Email: yoyoabhay45@gmail.com </p>
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