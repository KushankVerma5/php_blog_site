<?php
session_start();

require "../config/database.php";

if(!isset($_SESSION['user_id'])){
    exit("Unauthorized");
}

$id = $_POST['id'];

$stmt = $pdo->prepare("
    SELECT * FROM posts WHERE id = :id
");

$stmt->execute([
    ':id' => $id
]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$post){
    exit("Post not found");
}

if($post['user_id'] != $_SESSION['user_id']){
    exit("Unauthorized access");
}

$delete = $pdo->prepare("
    DELETE FROM posts 
    WHERE id = :id
");

$delete->execute([
    ':id' => $id
]);

echo "Deleted";