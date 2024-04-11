<?php
require_once 'Database.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "Passwords do not match";
    exit;
}

$db = new Database();
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $db->conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Registration successful";
} else {
    echo "Registration failed";
}

$stmt->close();
$db->closeConnection();
?>
