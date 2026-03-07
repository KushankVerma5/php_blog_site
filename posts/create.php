<?php

session_start();
require "../config/database.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']){
        die("CSRF validation failed");
    }

    $title = trim($_POST['title']);

    if(strlen($title) < 3){
        die("Title too short");
    }

    $content = $_POST['content'];

    $sql = "INSERT INTO posts (user_id,title,content)
            VALUES (:user_id,:title,:content)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':user_id' => $_SESSION['user_id'],
        ':title' => $title,
        ':content' => $content
    ]);

    header("Location: ../index.php");
    exit;
}

$_SESSION['csrf'] = bin2hex(random_bytes(32));
?>

<form method="POST">

<input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

<input type="text" name="title" placeholder="Post title"><br>

<textarea name="content"></textarea><br>

<button type="submit">Publish</button>

</form>