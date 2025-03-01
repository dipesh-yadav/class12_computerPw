<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ./user.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$product_name = $_POST['name'];
$image = $_POST['image'];
$seller = $_POST['seller'];
$price = (float)$_POST['price'];
$description = $_POST['description'];
$quantity = (int)$_POST['quantity'];

// Check if item already exists in the cart
$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_name = ?");
$stmt->bind_param("is", $user_id, $product_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update quantity if item exists
    $row = $result->fetch_assoc();
    $new_quantity = $row['quantity'] + $quantity;
    $update_stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
    $update_stmt->bind_param("ii", $new_quantity, $row['id']);
    $update_stmt->execute();
} else {
    // Insert new item
    $insert_stmt = $conn->prepare("INSERT INTO cart (user_id, product_name, image, seller, price, description, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert_stmt->bind_param("isssssi", $user_id, $product_name, $image, $seller, $price, $description, $quantity);
    $insert_stmt->execute();
}

// Redirect back without URL parameters
header("Location: ./Cart.php");
exit;
?>