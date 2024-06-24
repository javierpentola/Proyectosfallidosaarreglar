<?php
// blog.php
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
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (comment) VALUES ('$comment')";
    if ($conn->query($sql) === TRUE) {
        echo "Comentario publicado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT comment FROM comments";
    $result = $conn->query($sql);
    $comments = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }
    echo json_encode($comments);
}

$conn->close();
?>
