<?php
session_start();
require "../config/database.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute([':id' => $id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if($post['user_id'] != $_SESSION['user_id']){
    die("Unauthorized access");
}

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = $pdo->prepare("
        UPDATE posts 
        SET title = :title, content = :content
        WHERE id = :id
    ");

    $update->execute([
        ':title' => $title,
        ':content' => $content,
        ':id' => $id
    ]);

    header("Location: ../index.php");
}
?>

<form method="POST">
    <input type="text" name="title" 
        value="<?= htmlspecialchars($post['title']) ?>"><br>
    <textarea name="content"><?= htmlspecialchars($post['content']) ?></textarea><br>
    <button name="update">Update</button>
</form>