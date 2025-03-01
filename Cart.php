<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: user.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT cart.id, products.name, products.price, cart.quantity FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" type="text/css" href="css/Cart.css">
    <script src="cart.js" defer></script>
</head>
<body>
    <?php 
        include "includes/navbar.php"; 
        $name = isset($_GET['name']) ? $_GET['name'] : "Product Name";
        $image = isset($_GET['image']) ? $_GET['image'] : "default.jpg";
        $seller = isset($_GET['seller']) ? $_GET['seller'] : "Unknown Seller";
        $price = isset($_GET['price']) ? $_GET['price'] : "0.00";
        $description = isset($_GET['description']) ? $_GET['description'] : "Our Leading Product";
    ?>
    <h2>&nbspYOUR CART</h2>
    <div class="c_container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="c_frame" data-id="<?php echo $row['id']; ?>">
                <div class="des">
                    <p><?php echo htmlspecialchars($row['name']); ?></p>
                    <p>Price: $<?php echo number_format($row['price'], 2); ?></p>
                </div>
                <div class="interact">
                    <button class="decrease">-</button>
                    <span class="number"><?php echo $row['quantity']; ?></span>
                    <button class="increase">+</button>
                </div>
                <div class="cost">
                    <p>Total: $<span class="total-price"><?php echo number_format($row['price'] * $row['quantity'], 2); ?></span></p>
                </div>
                <?php } ?>


                
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
                <button class="increase" onclick="">+</button>
                <span class="number"><?php echo $row['quantity']; ?></span>
                <button class="decrease" onclick="">-</button>
                <div class="cost">
                    <p>Total: $<span class="total-price"><?php echo number_format($row['price'] * $row['quantity'], 2); ?></span></p>
                </div>
                <button>D</button>
                <button>L</button>
            </div>


            </div>
    </div>
</body>
</html>
