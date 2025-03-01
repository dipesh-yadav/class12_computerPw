<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'db_connect.php';

if (!isset($_SESSION['user_id'])) die("Unauthorized");

$item_id = $_POST['item_id'];
$user_id = $_SESSION['user_id'];

$conn->query("DELETE FROM cart WHERE id=$item_id AND user_id=$user_id");
echo "success";
$conn->close();
?>