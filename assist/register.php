
<?php 
include './config/config.php'; 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <h2>Register</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" name="register" value="Register">
        <br><a href="login.php">Already have an account? Login</a>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $stmt = $conn->prepare("INSERT INTO Users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['password']);
        if ($stmt->execute()) {
            echo "<script>alert('User registered successfully!');</script>";
        } else {
            echo "<script>alert('Registration failed. Please try again.!');</script>";
        }
    }
    ?>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
    <!-- Displaying the cookie value -->

</footer>


</body>
</html>