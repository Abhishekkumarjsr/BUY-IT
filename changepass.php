<?php
session_start();
$username = $_SESSION['username'];

// connect to Database "users"
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "users";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
} else {
    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];

        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "users";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Sorry, we failed to connect: " . mysqli_connect_error());
        } else {

            // Retrieve the current password from the database
            $sql = "SELECT `password` FROM `user` WHERE `username` = '$username'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $stored_password_hash = $row['password'];

                // Verify the old password
                if (password_verify(trim($oldPassword), $stored_password_hash)) {
                    // Hash the new password
                    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Update the password in the database
                    $updateSql = "UPDATE `user` SET `password` = '$hashed_password' WHERE `username` = '$username'";
                    $updateResult = mysqli_query($conn, $updateSql);

                    if ($updateResult) {
                        echo '<div class="alert alert-success" role="alert" id="success-alert">
                                    <strong>Success!</strong> ' . $username . ' Your Password has been updated
                                    </div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert" id="error-alert">
                                    Error updating password. Please try again.
                                    </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert" id="danger-alert">
                            Old password verification failed. Please check your input.
                        </div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert" id="danger2-alert">
                        User not found. Please login again.
                    </div>';
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Change</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="changepass.css">
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById("success-alert").style.display = "none";
            }, 4000);

            setTimeout(function() {
                document.getElementById("error-alert").style.display = "none";
            }, 4000);

            setTimeout(function() {
                document.getElementById("danger-alert").style.display = "none";
            }, 4000);

            setTimeout(function() {
                document.getElementById("danger2-alert").style.display = "none";
            }, 4000);
        });
    </script>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="logo1.jpg" alt="logo">
                <h2><?php echo "$username" ?></h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <!-- <li><a href="#">Home</a></li> -->
                <!-- <li><a href="#">Portfolio</a></li> -->
                <!-- <li><a href="#">Courses</a></li> -->
                <!-- <li><a href="#">About us</a></li> -->
                <!-- <li><a href="#">Contact us</a></li> -->
            </ul>
            <button class="login-btn">LOG IN</button>
            <span class="hamburger-btn material-symbols-rounded">menu</span>
        </nav>
    </header>
    <div class="change-pass">
        <div class="text-box p-3">
            <h1>Change Password</h1>
        </div>
        <div class="text-box-content p-3">
            <form action="changepass.php" method="POST">
                <div class="form-floating">
                    <input type="password" name="old_password" class="form-control" required>
                    <label for="old_password" class="form-label">Old Password</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="password" name="new_password" class="form-control" required>
                    <label for="new_password" class="form-label">New Password</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="login.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="signin.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Create Username</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                        <!-- <input class="radio-btn" type="submit" value="Submit"> -->
                    </div>
                    <div class="date-of-birth">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" placeholder="" required>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <label for="exampleInputEmail1">Enter your email</label>
                    </div>
                    <!-- <p>We'll never share your email with anyone else.</p> -->
                    <div class="input-field">
                        <input type="password" name="password" id="exampleInputPassword1" required>
                        <label for="exampleInputPassword1">Create Password</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="confirm_password" id="confirmPassword" required>
                        <label for="confirmPassword">Confirm Password</label>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="robotCheckbox" class="checkbox-size form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I agree the <a href="#">Terms & Conditions</a></label>
                    </div>
                    <button type="submit" class="">Sign In</button>
                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
    <script src="index.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>