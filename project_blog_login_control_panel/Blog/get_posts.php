<?php
include('config.php');

$result = $conn->query("SELECT posts.id, posts.title, posts.content, comments.text AS comment_text FROM posts LEFT JOIN comments ON posts.id = comments.post_id");

$posts = [];
while ($row = $result->fetch_assoc()) {
    $postId = $row['id'];
    if (!isset($posts[$postId])) {
        $posts[$postId] = [
            'title' => $row['title'],
            'content' => $row['content'],
            'comments' => []
        ];
    }
    if ($row['comment_text']) {
        $posts[$postId]['comments'][] = ['text' => $row['comment_text']];
    }
}

echo json_encode(['posts' => array_values($posts)]);
?>
