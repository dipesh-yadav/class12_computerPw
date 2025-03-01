<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Nav.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400&display=swap" rel="stylesheet">
</head>

<body>
    <div class="heading">
        <div class="logo">CHIPSET</div>
        <div class="navbar">
            <div class="button" onclick="window.location.href='./index.php'">HOME</div>
            <div class="button" onclick="window.location.href='./Store1.php'">STORE</div>
            <div class="button" onclick="window.location.href='./Cart.php'">CART</div>
            <div class="button" onclick="window.location.href='./Contact.php'">CONTACT</div>
            <?php 
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION['user_id'])): ?>
                    <a class="button" href="logout.php">Logout</a>
                    <span class="button"><?php echo $_SESSION['name']; ?></span>
            <?php else: ?>
                <div class="button" onclick="window.location.href='./user.php'">LOG IN</div>
            <?php endif; ?>
        </div>
    </div>
    <div class="border"></div>
</body>

</html>