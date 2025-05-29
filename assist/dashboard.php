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
    <title>Dashboard</title>
    <style>
        main {align-items: center;
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background-color: #f9f9f9;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
}

main h2 {
    color: #333;
    margin-bottom: 20px;
}

main p {
    font-size: 18px;
    color: #444;
    margin: 10px 0;
}

main a {
    display: inline-block;
    margin: 10px 8px;
    padding: 10px 20px;
    text-decoration: none;
    color: white;
    background-color: #007BFF;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

main a:hover {
    background-color: #0056b3;
}

    </style>
    <link rel="stylesheet" href="/digital_wallet/style/style.css">
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

<main>
    <h2>Welcome to Your Dashboard</h2>
    <?php
    $user_id = $_SESSION['user_id'];

    // Optional: use prepared statements for security
    $stmt = $conn->prepare("SELECT * FROM Users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {
        echo "<p>Name: " . htmlspecialchars($row['name']) . "</p>";
        echo "<p>Balance: ₹" . htmlspecialchars($row['wallet_balance']) . "</p>";
    } else {
        echo "<p>User not found.</p>";
    }
    ?>
    <br>
    <a href="add_money.php">Add Money</a> | 
    <a href="send_money.php">Send Money</a> | 
    <a href="transactions.php">Transactions</a>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
</footer>

</body>
</html>
