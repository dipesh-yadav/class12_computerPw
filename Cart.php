<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Cart.css">
</head>

<body>
    <?php
        include 'includes/navbar.php';
        session_start();
        $name = isset($_GET['name']) ? $_GET['name'] : "Product Name";
        $image = isset($_GET['image']) ? $_GET['image'] : "default.jpg";
        $seller = isset($_GET['seller']) ? $_GET['seller'] : "Unknown Seller";
        $price = isset($_GET['price']) ? $_GET['price'] : "0.00";
        $description = isset($_GET['description']) ? $_GET['description'] : "Our Leading Product";
    ?>
    <br>

    <div class="c_container">

        <div class="Your_cart">&nbspYOUR CART</div>

        <div class="c_frame">

            <img src="images/<?php echo $image; ?>" alt="<?php echo $name; ?>">
            <div class="des"><?php echo $description; ?>

                <br>
                <p style="color: gray; font-size: 16px;"><?php echo $seller; ?></p><br>
                <p class="star">★★★☆☆</p>
            </div>
            <div class="cost">
                <br>
                <p><?php echo $price; ?></p>
                <p style="font-size: 16px; color: gray;"><s>Rs. 1650.00</s></p>
            </div>
            <div class="interact">
                <button id="plus" onclick="">+</button>
                <div class="number">1</div>
                <button id="minus" onclick="">-</button>
                <button>D</button>
                <button>L</button>
            </div>
        </div>
    </div>
</body>

</html>