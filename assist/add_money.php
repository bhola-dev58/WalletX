<?php 
include './config/config.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Money</title>
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

<main class="container">
    <h2>Add Money to Wallet</h2>
    <form method="post">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>
        <input type="submit" name="add" value="Add Money">
    </form>

    <?php
    if (isset($_POST['add'])) {
        $amount = $_POST['amount'];
        $uid = $_SESSION['user_id'];

        if ($amount > 0) {
            $conn->query("UPDATE Users SET wallet_balance = wallet_balance + $amount WHERE user_id = $uid");
            $conn->query("INSERT INTO Transactions (sender_id, receiver_id, amount, transaction_type) VALUES ($uid, $uid, $amount, 'Add')");
            echo "<p class='success'>Money added successfully!</p>";
        } else {
            echo "<p class='error'>Please enter a valid amount.</p>";
        }
    }
    ?>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
</footer>

</body>
</html>