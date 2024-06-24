<?php
// login.php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$users = [
    'admin' => 'password123'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header('Location: ../control_panel/control_panel.html');
    } else {
        echo "Invalid login credentials.";
    }
}
?>
