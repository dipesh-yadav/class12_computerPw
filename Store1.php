<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Store1.css" />
</head>

<body>

    <?php
        include 'includes/navbar.php';
        require 'includes/function.php';
    ?>

    <div class="store">

        <?php include 'includes/filter.php'; ?>
        <?php include 'includes/showProduct.php'; ?>


        
<script src="js/function.js"></script>
        <script>
            function openCartPage(name, image, seller, price, description) {
                window.location.href = "Cart.php?name=" + encodeURIComponent(name) +
                    "&image=" + encodeURIComponent(image) +
                    "&seller=" + encodeURIComponent(seller) +
                    "&price=" + encodeURIComponent(price) +
                    "&description=" + encodeURIComponent(description);
            }
        </script>

    </div>

</body>

</html>
