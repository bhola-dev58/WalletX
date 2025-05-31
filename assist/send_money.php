<?php 
include './config/config.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money</title>
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
    <h2>Send Money</h2>
    <form method="post">
        <label for="email">Receiver Email:</label>
        <input type="email" name="email" required><br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required><br>
        <input type="submit" name="send" value="Send Money">
    </form>

    <?php
    if (isset($_POST['send'])) {
        $sender = $_SESSION['user_id'];
        $email = $_POST['email'];
        $amount = $_POST['amount'];
        $res = $conn->query("SELECT * FROM Users WHERE email='$email'");
        if ($res->num_rows == 1) {
            $receiver = $res->fetch_assoc()['user_id'];
            $conn->query("UPDATE Users SET wallet_balance = wallet_balance - $amount WHERE user_id = $sender");
            $conn->query("UPDATE Users SET wallet_balance = wallet_balance + $amount WHERE user_id = $receiver");
            $conn->query("INSERT INTO Transactions (sender_id, receiver_id, amount, transaction_type) VALUES ($sender, $receiver, $amount, 'Send')");
            echo "<p style='color: green;'>Money sent successfully!</p>";
        } else {
            echo "<p style='color: red;'>Receiver not found!</p>";
        }
    }
    ?>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
</footer>

</body>
</html>