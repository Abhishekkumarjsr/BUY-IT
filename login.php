<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "buyit";

    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    if (!$conn) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `user` WHERE `username` = '$login_username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password_hash = $row['password'];

        if (password_verify(trim($login_password), $stored_password_hash)) {
            // Login successful
            $_SESSION['username'] = $login_username;

            // Fetch user-specific cart and order tables
            $cart_table_name = $login_username . "_cart";
            $order_table_name = $login_username . "_order";

            // You can use $cart_table_name and $order_table_name further in your code
            // For example:
            // $sql_fetch_cart_data = "SELECT * FROM `$cart_table_name`";
            // $result_cart_data = mysqli_query($conn, $sql_fetch_cart_data);
            // ...

            echo '<script>
            window.location.href = "animlogin.php";
            </script>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                        <strong>Login Failed!</strong> Password verification failed.
                    </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                    <strong>Login Failed!</strong> User not found.
                </div>';
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
</head>

<body>

</body>

</html>