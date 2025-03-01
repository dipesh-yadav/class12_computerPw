<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="css/Product.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="product-container">
    <?php
        $name = isset($_GET['name']) ? $_GET['name'] : "Product Name";
        $image = isset($_GET['image']) ? $_GET['image'] : "default.jpg";
        $seller = isset($_GET['seller']) ? $_GET['seller'] : "Unknown Seller";
        $price = isset($_GET['price']) ? $_GET['price'] : "0.00";
    ?>
    
    <img src="images/<?php echo $image; ?>" alt="<?php echo $name; ?>">
    <h2><?php echo $name; ?></h2>
    <b><span>Seller: <?php echo $seller; ?></span></b>
    <b><span>Price: Rs. <?php echo $price; ?></span></b>
    <br>
    <button>Add to Cart</button>
</div>

<!-- Related Products Section -->
<h2 style="text-align: center;">Related Products</h2>
<div class="related-products">
    <?php
        $products = [
            ["Jumper Wire - Male to Male", "jumper wire MtM.jpg", "CIRCUIT Hub Sellers Pvt. Ltd.", "150.99"],
            ["Raspberry Pi-4 Model B", "raspberry 4B.jpg", "RASPBERRY Hub Sellers Pvt. Ltd.", "4500.99"],
            ["Lithium Ion Battery 8V", "lithium ion 8v.jpg", "BATTERY Hub Sellers Pvt. Ltd.", "850.99"],
            ["Silicon Wire 3 Feet", "silicon wire 3ft.jpg", "WIRE Hub Sellers Pvt. Ltd.", "100.99"],
            ["Single Shaft BO-Gear Motor", "single shaft bo motor.jpg", "MOTOR Hub Sellers Pvt. Ltd.", "250.99"]
        ];

        foreach ($products as $product) {
            echo '<div class="frame" onclick="openProductPage(\'' . $product[0] . '\', \'' . $product[1] . '\', \'' . $product[2] . '\', \'' . $product[3] . '\')">
                    <img src="images/' . $product[1] . '" alt="' . $product[0] . '">
                    <div class="text">' . $product[0] . '</div>
                    <div class="price">Rs. ' . $product[3] . '</div>
                  </div>';
        }
    ?>
</div>

<script>
    function openProductPage(name, image, seller, price) {
        window.location.href = "product.php?name=" + encodeURIComponent(name) +
                               "&image=" + encodeURIComponent(image) +
                               "&seller=" + encodeURIComponent(seller) +
                               "&price=" + encodeURIComponent(price);
    }
</script>

</body>
</html>
