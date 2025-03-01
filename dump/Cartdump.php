<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

// Remove from cart
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
}

// Fetch product details
$cart_items = [];
if (!empty($_SESSION['cart'])) {
    $ids = implode(",", array_keys($_SESSION['cart']));
    $query = "SELECT * FROM products WHERE id IN ($ids)";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $row['quantity'] = $_SESSION['cart'][$row['id']];
        $cart_items[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="Cart.css">
</head>

<body>
    <div class="c_container">
        <h2>Your Cart</h2>
        <?php foreach ($cart_items as $item) { ?>
        <div class="c_frame">
            <img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
            <div class="des">
                <p><?= $item['name']; ?> - $<?= $item['price']; ?></p>
            </div>
            <div class="interact">
                <a href="Cart.php?remove=<?= $item['id']; ?>">Remove</a>
                <p>Quantity: <?= $item['quantity']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>