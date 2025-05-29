<?php
$conn = new mysqli("localhost", "root", "", "digital_wallet");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>