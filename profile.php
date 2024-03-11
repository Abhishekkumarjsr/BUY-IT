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
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
    <!-- Linking Google font link for icons -->
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <span class="hamburger-btn material-symbols-outlined" onclick="toggleSidebar()">menu</span>
    <span class="close-btn material-symbols-outlined" onclick="toggleSidebar()">close</span>
    <aside class="sidebar">
        <div class="logo">
            <img src="logo1.jpg" alt="logo">
            <h2><?php echo "$username" ?></h2>
        </div>
        <ul class="links">
            <h4>Main Menu</h4>
            <li>
                <span class="material-symbols-outlined">dashboard</span>
                <a href="home.php">Dashboard</a>
            </li>
            <!-- <li>
                <span class="material-symbols-outlined">browse_activity</span>
                <a href="#">Your Activity</a>
            </li> -->
            <li>
                <span class="material-symbols-outlined">flag</span>
                <a href="report.php">Reports</a>
            </li>
            <hr>
            <h4>Advanced</h4>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="profile.php">Profile</a>
            </li>
            <!-- <li>
                <span class="material-symbols-outlined">person_add</span>
                <a href="#">Add Friends</a>
            </li> -->
            <!-- <li>
                <span class="material-symbols-outlined">qr_code_2</span>
                <a href="qrcode.php">QR Code</a>
            </li> -->
            <li>
                <span class="material-symbols-outlined">change_circle</span>
                <a href="ChangeUsername.php">Change Your Username</a>
            </li>
            <li>
                <span class="material-symbols-outlined">change_circle</span>
                <a href="changepass.php">Change Your Password</a>
            </li>
            <li>
                <span class="material-symbols-outlined">delete</span>
                <a href="deleteaccount.php">Delete Account</a>
            </li>
            <hr>
            <h4>Account</h4>
            <li>
                <span class="material-symbols-outlined">notifications</span>
                <a href="#">Notifications</a>
            </li>
            <li>
                <span class="material-symbols-outlined">mail</span>
                <a href="#">Message</a>
            </li>
            <!-- <li>
                <span class="material-symbols-outlined">settings</span>
                <a href="settings.php">Settings</a>
            </li> -->
            <li class="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <a href="index.php">Logout</a>
            </li>
        </ul>
    </aside>
    <script>
        function toggleSidebar() {
            var sidebar = document.querySelector('.sidebar');
            var closeBtn = document.querySelector('.close-btn');

            sidebar.classList.toggle('active');
            closeBtn.style.display = (sidebar.classList.contains('active')) ? 'block' : 'none';
        }
    </script>
</body>

</html>