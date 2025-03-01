<!DOCTYPE html>
<html>

<head>
    <title>Chipset</title>
    <link rel="stylesheet" href="css/Login.css">
</head>

<body>

    <?php
            include 'includes/navbar.php';
        ?>

    <div class="container">
        <div class="logbox">
            <div class="text">LOG IN</div>
            <form method="POST">
                <div class="User_info">
                    <label>E-mail:<br>
                        <input type="email" name="email"></label><br>
                    <label>Password:<br>
                        <input type="password" name="password"></label><br><br><br>
                    <input type="submit" name="log_in" id="log_in" value="Log In">
                </div>
            </form>
        </div>
    </div>

    <?php
            session_start();
            include 'db_connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT id, name, password FROM users WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($row = $result->fetch_assoc()) {
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['name'];
                        header("Location: Store1.php"); // Redirect to homepage
                        exit();
                    } else {
                        echo "Invalid credentials!";
                    }
                } else {
                    echo "User not found!";
                }
            }
        ?>


</body>

</html>