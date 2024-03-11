<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Connect to Database "users"
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "buyit";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['new_username'];

    // Use prepared statements to prevent SQL injection
    $checkSql = "SELECT `username` FROM `user` WHERE `username` = ?";
    $checkStmt = mysqli_prepare($conn, $checkSql);
    mysqli_stmt_bind_param($checkStmt, "s", $new_username);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        echo '<div class="alert alert-danger" role="alert">Username already exists. Please choose a different one.</div>';
        echo '<script>
                setTimeout(function() {
                    document.querySelector(".alert").style.display = "none";
                }, 2000);
              </script>';
    } else {
        // Update the Username in the database
        $updateSql = "UPDATE `user` SET `username` = ? WHERE `user`.`username` = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, "ss", $new_username, $username);

        if (mysqli_stmt_execute($updateStmt)) {
            // Update the session variable with the new username
            $_SESSION['username'] = $new_username;

            echo '<div class="alert alert-success" role="alert">Username updated successfully.</div>';
            echo '<script>
                    setTimeout(function() {
                        document.querySelector(".alert").style.display = "none";
                        window.location.href = "home.php";
                    }, 2000);
                  </script>';
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error updating username. Please try again.</div>';
            echo '<script>
                    setTimeout(function() {
                        document.querySelector(".alert").style.display = "none";
                    }, 2000);
                  </script>';
        }

        mysqli_stmt_close($updateStmt);
    }

    mysqli_stmt_close($checkStmt);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Username</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="changeusername.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" type="text/css" href="home.css">
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
                    <a href="#" id="close"><i class="material-symbols-outlined">close</i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </section>
    </nav>

    <div class="change-username">
        <div class="text-box p-3">
            <h1>Change Your Username</h1>
        </div>
        <div class="text-box-content p-3">
            <form action="ChangeUsername.php" method="POST">
                <div class="form-floating">
                    <input type="text" name="new_username" class="form-control" required>
                    <label for="new_username" class="form-label">Enter Your New Username</label>
                </div>
                <br>
                <div class="username-change-button">
                    <button type="submit" class="btn btn-primary">Change Username</button>
                </div>
            </form>
        </div>
    </div>

    <script src="index.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>