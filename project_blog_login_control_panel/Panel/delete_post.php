<?php
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$postId = $data['postId'];

$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param("i", $postId);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
?>
