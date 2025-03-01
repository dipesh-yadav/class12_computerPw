<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) die("Unauthorized");

$item_id = $_POST['item_id'];
$change = (int)$_POST['change'];
$user_id = $_SESSION['user_id'];

// Get current quantity
$stmt = $conn->prepare("SELECT quantity FROM cart WHERE id=? AND user_id=?");
$stmt->bind_param("ii", $item_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) die("Item not found");
$row = $result->fetch_assoc();
$new_quantity = $row['quantity'] + $change;

if ($new_quantity < 1) {
    $conn->query("DELETE FROM cart WHERE id=$item_id AND user_id=$user_id");
} else {
    $conn->query("UPDATE cart SET quantity=$new_quantity WHERE id=$item_id AND user_id=$user_id");
}

echo "success";
$conn->close();
?>