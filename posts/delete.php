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

$delete = $pdo->prepare("DELETE FROM posts WHERE id = :id");
$delete->execute([':id' => $id]);

header("Location: ../index.php");