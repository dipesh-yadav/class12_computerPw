<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Cart.css">
    <!-- <script src="cart.js"></script> -->
    <?php 
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // ... after enabling error reporting
        //echo "<p>Debug: User ID = " . $_SESSION['user_id'] . "</p>"; // Add this line
        
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: user.php");
            exit;
        }
    ?>
</head>

<body>
    <?php
        include 'includes/navbar.php';
        $name = isset($_GET['name']) ? $_GET['name'] : "Product Name";
        $image = isset($_GET['image']) ? $_GET['image'] : "default.jpg";
        $seller = isset($_GET['seller']) ? $_GET['seller'] : "Unknown Seller";
        $price = isset($_GET['price']) ? $_GET['price'] : "0.00";
        $description = isset($_GET['description']) ? $_GET['description'] : "Our Leading Product";

        require 'includes/db_connect.php';
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cart_items = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        
    ?>
    <br>
    <h2 align="center">Welcome, <?php echo $_SESSION['name']; ?>!</h2>
    <div class="c_container">
        <div class="Your_cart">&nbspYOUR CART</div>
            <?php foreach ($cart_items as $item): ?>
                <div class="c_frame">
                    <img src="images/<?= $item['image'] ?>" alt="<?= $item['product_name'] ?>">
                    <div class="des"><?= $item['description'] ?>
                        <br>
                        <p style="color: gray; font-size: 16px;"><?= $item['seller'] ?></p><br>
                        <p class="star">★★★☆☆</p>
                    </div>
                    <div class="cost">
                        <br>
                        <p>Rs. <?= number_format($item['price'], 2) ?></p>
                        <p style="font-size: 16px; color: gray;"><s>Rs. 1650.00</s></p>
                    </div>
                
                    <div class="interact">
                        <button onclick="updateQuantity(<?= $item['id'] ?>, 1)">+</button>
                        <span class="number"><?= $item['quantity'] ?></span>
                        <button onclick="updateQuantity(<?= $item['id'] ?>, -1)">-</button>
                        <button onclick="deleteItem(<?= $item['id'] ?>)">D</button>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <?php if (isset($_GET['name'])): ?>
                <div class="c_frame">
                    <img src="images/<?= $image ?>" alt="<?= $name ?>">
                    <div class="des"><?= $description ?><br>
                        <p style="color: gray; font-size: 16px;"><?= $seller ?></p><br>
                        <p class="star">★★★☆☆</p>
                    </div>
                    <div class="cost">
                        <br>
                        <p>Rs. <?= number_format($price, 2) ?></p>
                        <p style="font-size: 16px; color: gray;"><s>Rs. 1650.00</s></p>
                    </div>

                    <div class="interact">
                        <button type="button" onclick="updatePendingQuantity(-1)">-</button>
                        <span class="number" id="pendingQuantity">1</span>
                        <button type="button" onclick="updatePendingQuantity(1)">+</button>
                        <form method="POST" action="includes/add_to_cart.php">
                            <input type="hidden" name="name" value="<?= $name ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <input type="hidden" name="seller" value="<?= $seller ?>">
                            <input type="hidden" name="price" value="<?= $price ?>">
                            <input type="hidden" name="description" value="<?= $description ?>">
                            <input type="hidden" name="quantity" id="hiddenPendingQuantity" value="1">
                            <button type="submit" name="add_to_cart">L</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
    </div>

    <script>
        // Update quantity for the pending item
        let pendingQuantity = 1;
        function updatePendingQuantity(change) {
            pendingQuantity += change;
            if (pendingQuantity < 1) pendingQuantity = 1;
            document.getElementById("pendingQuantity").textContent = pendingQuantity;
            document.getElementById("hiddenPendingQuantity").value = pendingQuantity;
        }
    </script>       

 <script>


function deleteItem(itemId) {
    if (confirm('Delete this item?')) {
        fetch('includes/delete_item.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `item_id=${itemId}`
        })
        .then(() => location.reload());
    }
}
</script> 
</body>

</html>