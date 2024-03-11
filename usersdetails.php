<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UsersDetails page</title>
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="usersdetails.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="_dbd1c11e-3fe1-474f-9aa7-e1530959daed.jpg" alt="logo">
                <h2>Tuddels</h2>
            </a>
            <ul class="links">
                <li><a href="signin.php">Sign In</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="usersdetails.php">Users Details</a></li>
                <li><a href="forgotpass.php">Forgot Password</a></li>
            </ul>
            <button class="signin-btn"><span class="material-symbols-outlined">login</span> </button>
        </nav>
        <div class="tx">
            <h1>UsersDetails</h1>
        </div>
        <div class="container">
            <?php
            $servername = "localhost";
            $db_username = "root";
            $db_password = "";
            $database = "users";

            $conn = mysqli_connect($servername, $db_username, $db_password, $database);
            if (!$conn) {
                die("Sorry, we failed to connect: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM `user`"; // or $sql = "SELECT * FROM user";
            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);
            echo "Number of Users in the Database : ";
            echo $num;
            echo "<br>";
            echo "<br>";
            $no = 1;
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    echo $no . ". " . "Hello" . " " . $row['username'] . " Welcome to Tuddels";
                    echo "<br>";
                    $no = $no + 1;
                }
            }

            mysqli_close($conn);

            ?>
        </div>
        <!-- mmmm -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </header>
</body>

</html>