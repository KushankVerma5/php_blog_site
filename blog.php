<?php

require "config/database.php";

include "includes/header.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT posts.*, users.name
FROM posts
JOIN users ON posts.user_id = users.id
WHERE posts.id = :id
");

$stmt->execute([
    ':id' => $id
]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$post){
    die("Post not found");
}
?>

<div class="card shadow border-0">

<div class="card-body p-4">

<h1 class="mb-3">
<?= htmlspecialchars($post['title']) ?>
</h1>

<div class="mb-3">

<span class="badge bg-dark">
<?= htmlspecialchars($post['category']) ?>
</span>

</div>

<?php if($post['image']): ?>

<img
src="assets/uploads/<?= $post['image'] ?>"
class="img-fluid rounded mb-4"
style="width:100%; max-height:450px; object-fit:cover;">

<?php endif; ?>

<p class="text-muted">
By <?= htmlspecialchars($post['name']) ?>
</p>

<p class="text-muted">

Published on
<?= date("d M Y", strtotime($post['created_at'])) ?>

</p>

<hr>

<p style="line-height:1.9;">
<?= nl2br(htmlspecialchars($post['content'])) ?>
</p>

<a href="index.php" class="btn btn-secondary mt-3">
Back
</a>

</div>

</div>

<?php include "includes/footer.php"; ?>