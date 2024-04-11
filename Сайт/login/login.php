<?php
require_once 'Database.php';

// Получение данных пользователя
$username = $_POST['username'];
$password = $_POST['password'];

$db = new Database();

// Извлечение пользователя из БД по имени пользователя
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $db->conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
// Проверка хешированного пароля
if (password_verify($password, $user['password'])) {
session_start();
$_SESSION['username'] = $username;
// Редирект на главную страницу после успешной аутентификации
header("Location: ../index.html");
exit; // Добавлен вызов exit после редиректа
} else {
echo "Invalid username or password";
}
} else {
echo "Invalid username or password";
}

$stmt->close();
$db->closeConnection();
?>