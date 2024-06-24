<?php
// control_panel.php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $file = $_FILES['file'];

    // Manejo del archivo subido
    if ($file['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
    }

    $sql = "INSERT INTO posts (title, content, file_path) VALUES ('$title', '$content', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        echo "Publicación subida con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
