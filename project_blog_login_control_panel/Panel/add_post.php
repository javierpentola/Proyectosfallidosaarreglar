<?php
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$title = $data['title'];
$content = $data['content'];

$stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $content);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
?>
