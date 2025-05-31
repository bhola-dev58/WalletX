<?php 
include './config/config.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/digital_wallet/style/style.css">
    
</head>
<body style="background-image: url('/digital_wallet/images/6NxGsO.jpg');">

<header>
    <nav>
        <a href="/digital_wallet/index.php">Home</a>
        <a href="./dashboard.php">Dashboard</a>
        <a href="./send_money.php">Send Money</a>
        <a href="./transactions.php">Transactions</a>
        <a href="./login.php">Login</a>
        <a href="./register.php">Register</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main>
    <h2>Login</h2>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
        <br><a href="register.php">Don't have an account? Register</a>
    </form>

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $res = $conn->query("SELECT * FROM Users WHERE email='$email' AND password='$pass'");
        if ($res->num_rows == 1) {
            $_SESSION['user_id'] = $res->fetch_assoc()['user_id'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p style='color: red;'>Invalid login!</p>";
        }
    }
    ?>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
</footer>

</body>
</html>