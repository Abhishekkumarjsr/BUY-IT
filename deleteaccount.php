<?php
session_start();
$username = $_SESSION['username'];

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $robotCheckbox = isset($_POST['robotCheckbox']) ? $_POST['robotCheckbox'] : '';

    // Check if the checkbox is checked
    if ($robotCheckbox != 'on') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Please confirm that you Want to Delete Your Account.
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {

        // Connect to Database "users"
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "users";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);
        if (!$conn) {
            die("Sorry, we failed to connect: " . mysqli_connect_error());
        }

        // Use prepared statements to prevent SQL injection
        $DeleteSql = "DELETE FROM `user` WHERE `user`.`username` = '$username'";
        $Delete = mysqli_query($conn, $DeleteSql);

        // Close the database connection after use
        mysqli_close($conn);
        echo '<div class="alert alert-success" role="alert">Account Deleted successfully.</div>';
        echo "Redirecting..."; // Add this line for debugging
        echo '<script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 2500); </script>';

        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete Your Account</title>
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="deleteaccount.css">
</head>

<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <img src="logo1.jpg" alt="logo">
            <h2><?php echo "$username" ?></h2>
        </a>
        <ul class="links">
            <span class="close-btn material-symbols-rounded">close</span>
            <!-- <li><a href="#">Home</a></li> -->
            <!-- <li><a href="profile.php">Profile</a></li> -->
            <!-- <li><a href="#">Courses</a></li> -->
            <!-- <li><a href="#">About us</a></li> -->
            <!-- <li><a href="#">Contact us</a></li> -->
        </ul>
        <button class="login-btn">LOG IN</button>
        <span class="hamburger-btn material-symbols-rounded">menu</span>
    </nav>
    <center>
        <div class="delete-account">
            <div class="text-box p-3">
                <h1>Delete Your Account</h1>
            </div>
            <div class="text-box-content p-3">
                <h6>
                    Once you delete your account,<br>
                    all your data will be erased and can't be retrieved again.
                </h6>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="">
                        <input type="checkbox" name="robotCheckbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label custom-label" for="exampleCheck1">I Want to Delete My Account.</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </center>
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