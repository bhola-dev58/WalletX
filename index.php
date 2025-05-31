<?php
// Set a cookie (name, value, expire time)
$cookie_name = "username";
$cookie_value = "Guest";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 30 days
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body style="background-image: url('./images/6NxGsO.jpg');">

<header>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./assist/dashboard.php">Dashboard</a>
        <a href="./assist/send_money.php">Send Money</a>
        <a href="./assist/transactions.php">Transactions</a>
        <a href="./assist/login.php">Login</a>
        <a href="./assist/register.php">Register</a>
        <a href="./assist/logout.php">Logout</a>
    </nav>
</header>

  
<main>
    
    <div class="container">
        <div class="left-sec">
           <h1>Digital-wallet</h1>
            <p class="para">Welcome to our digital wallet application! Here, you can easily manage your finances, send money to friends and family, and keep track of your transactions.</p>
            <input type="button" class="btn" value="Get Started" onclick="window.location.href='./assist/register.php'">
        </div>
        <div class="right-sec">
            <img src="./images/ewal.png" alt="Italian Trulli">
        </div>
       
</div>


    
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My PHP Web App. All rights reserved.</p>
    <!-- Displaying the cookie value -->
</footer>


</body>
</html>