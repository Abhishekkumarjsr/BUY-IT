<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;display=swap'>
    <link rel="shortcut icon" type="x-icon" href="weblogo.png">
    <link rel="stylesheet" href="orderanimation.css">
</head>

<body>
    <div class="box">
        <div class="content">
            <img src="logo1.jpg" alt="">
            <h2>Processing.....<br><span>Your Order</span></h2>
        </div>
    </div>
    <div id="order-button">
        <button class="order"><span class="default">Processing Your Order</span><span class="success">Order Placed
                <svg viewbox="0 0 12 10">
                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg></span>
            <div class="box"></div>
            <div class="truck">
                <div class="back"></div>
                <div class="front">
                    <div class="window"></div>
                </div>
                <div class="light top"></div>
                <div class="light bottom"></div>
            </div>
            <div class="lines">
            </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="orderanimation.js"></script>
    <script>
        function startAnimation() {
            let button = $('.order');

            if (!button.hasClass('animate')) {
                button.addClass('animate');
                setTimeout(() => {
                    // Redirect to order.php after animation is completed
                    window.location.href = 'orders.php';
                }, 10000);
            }
        }

        $(document).ready(function() {
            // Start animation on page load
            startAnimation();
        });

        $('.order').click(function() {
            // Start animation on button click
            startAnimation();
        });
    </script>
</body>

</html>