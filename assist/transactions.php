<?php 
include './config/config.php'; 
session_start(); 

// ✅ Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if not authenticated
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/digital_wallet/style/style.css">
    <title>Transaction History</title>
</head>
<body>

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
<section class="hero">
<main>
    <h2>Transaction History</h2>
    <?php
    $uid = $_SESSION['user_id'];
    $res = $conn->query("SELECT * FROM Transactions WHERE sender_id=$uid OR receiver_id=$uid ORDER BY transaction_date DESC");
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo "<div class='transaction'>";
            echo "<p>" . $row['transaction_type'] . " ₹" . $row['amount'] . " on " . $row['transaction_date'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No transactions found.</p>";
    }
    ?>
</main>
</section>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
</footer>

</body>
</html>