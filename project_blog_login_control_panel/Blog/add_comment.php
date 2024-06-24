<?php
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$postId = $data['postId'];
$comment = $data['comment'];

$stmt = $conn->prepare("INSERT INTO comments (post_id, text) VALUES (?, ?)");
$stmt->bind_param("is", $postId, $comment);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
?>
