<!DOCTYPE html>
<html>
    <head>
        <title>Chipset</title>
        <link rel="stylesheet" href="css/Signup.css">
    </head>
    <body>

        <?php
            include 'includes/navbar.php';
        ?>
        
        <div class="container">
            <div class="logbox">
                <div class="text">SIGN UP</div>
                <form method="POST">
                <div class="User_info">
                    <label>Name:
                        <div class="name-container">
                            <input type="text" placeholder="First Name" name="f_name">
                            <input type="text" placeholder="Family Name" name="l_name">
                    </label>
                    </div>
                    <div class="date_container">
                        <label>DOB:
                            <input type="date" name="date">
                        </label>
                        <label>Region:
                            <select>
                                <option>North America</option>
                                <option>Europe</option>
                                <option>Asia</option>
                            </select>
                        </label>
                    </div>
                    <label>E-mail:
                        <input type="email" name="email">
                    </label>
                    <label>Password:
                        <input type="password" name="password">
                    </label>
                    <input type="submit" id="sign_up" name="sign_up" value="Sign Up">
                </div>
        </form>
            </div>
        </div>

        <?php
            session_start();
            include 'includes/db_connect.php'; 

            if (isset($_POST["sign_up"])) {
                $name = $_POST['f_name'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $name, $email, $password);

                if ($stmt->execute()) {
                    header("Location: Login.php"); 
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
        ?>
        
    </body>
</html>