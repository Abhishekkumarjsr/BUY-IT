<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $robotCheckbox = isset($_POST['robotCheckbox']) ? $_POST['robotCheckbox'] : '';

    // Check if the checkbox is checked
    if ($robotCheckbox != 'on') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Please confirm that you are not a robot.
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    } else {
        // Validate passwords
        if ($password !== $confirm_password) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Passwords do not match.
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        } else {
            $servername = "localhost";
            $db_username = "root";
            $db_password = "";
            $database = "buyit";

            $conn = mysqli_connect($servername, $db_username, $db_password, $database);
            if (!$conn) {
                die("Sorry, we failed to connect: " . mysqli_connect_error());
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into 'user' table
                $sql_user = "INSERT INTO `user` (`sno`, `username`, `gender`, `dob`, `email`, `password`) VALUES (NULL,'$username', '$gender', '$dob', '$email', '$hashed_password')";
                $result_user = mysqli_query($conn, $sql_user);

                if ($result_user) {
                    // Create cart table for the user
                    $sql_create_cart_table = "CREATE TABLE IF NOT EXISTS `$username" . "_cart` (
                                                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                `product_name` VARCHAR(255) NOT NULL,
                                                `product_image` VARCHAR(255) NOT NULL,
                                                `product_size` VARCHAR(10) NOT NULL,
                                                `product_price` DECIMAL(10,2) NOT NULL,
                                                `quantity` INT(11) NOT NULL
                                            )";
                    mysqli_query($conn, $sql_create_cart_table);

                    // Create order table for the user
                    $sql_create_order_table = "CREATE TABLE IF NOT EXISTS `$username" . "_order` (
                                                `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
                                                `ordered_product_name` VARCHAR(255) NOT NULL,
                                                `ordered_product_image` VARCHAR(255) NOT NULL,
                                                `ordered_product_size` VARCHAR(10) NOT NULL,
                                                `ordered_product_price` DECIMAL(10,2) NOT NULL,
                                                `ordered_quantity` INT(11) NOT NULL,
                                                `order_total_amount` DECIMAL(10,2) NOT NULL
                                            )";
                    mysqli_query($conn, $sql_create_order_table);

                    // Close database connection
                    mysqli_close($conn);

                    echo '<script>
                                window.location.href = "animsignin.php";
                                </script>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> We are facing some technical issue, and your entry was not submitted successfully! We regret the inconvenience caused!
                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
</head>

<body>

</body>

</html>