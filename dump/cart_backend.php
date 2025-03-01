<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "error" => "User not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);

if ($data['action'] === 'update') {
    $cartId = $data['cartId'];
    $change = $data['change'];
    
    $query = "UPDATE cart SET quantity = GREATEST(quantity + ?, 1) WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $change, $cartId, $user_id);
    $stmt->execute();
    
    echo json_encode(["success" => true]);
}

if ($data['action'] === 'delete') {
    $cartId = $data['cartId'];
    
    $query = "DELETE FROM cart WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $cartId, $user_id);
    $stmt->execute();
    
    echo json_encode(["success" => true]);
}
