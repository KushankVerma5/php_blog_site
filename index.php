<?php
session_start();
require 'config/database.php';
include 'includes/header.php';

$limit = 5;
$page = $_GET['page'] ?? 1;

$offset = ($page - 1) * $limit;

$search = $_GET['search'] ?? '';

$sql = "
SELECT posts.*, users.name
FROM posts
JOIN users ON posts.user_id = users.id
WHERE posts.title LIKE :search
ORDER BY posts.created_at DESC
LIMIT $limit OFFSET $offset
";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':search' => "%$search%"
]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2 class="mb-4">All Posts</h2>

<!-- SEARCH BAR -->
<form method="GET" class="mb-4">

<div class="input-group">

<input type="text" name="search" 
class="form-control"
placeholder="Search posts"
value="<?= htmlspecialchars($search) ?>">

<button class="btn btn-primary">Search</button>

</div>

</form>


<?php if(count($posts) > 0): ?>

<?php foreach($posts as $post): ?>

<div class="card mb-3">

<div class="card-body">

<h4><?= htmlspecialchars($post['title']) ?></h4>

<p><?= htmlspecialchars($post['content']) ?></p>

<small>By <?= htmlspecialchars($post['name']) ?></small>

<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>

<div class="mt-2">

<a href="posts/edit.php?id=<?= $post['id'] ?>" 
class="btn btn-warning btn-sm">
Edit
</a>

<button 
class="btn btn-danger btn-sm delete-post"
data-id="<?= $post['id'] ?>">
Delete
</button>

</div>

<?php endif; ?>

</div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="alert alert-info">No posts available.</div>

<?php endif; ?>


<!-- PAGINATION -->
<div class="mt-4">

<a href="?page=1" class="btn btn-outline-primary">1</a>
<a href="?page=2" class="btn btn-outline-primary">2</a>
<a href="?page=3" class="btn btn-outline-primary">3</a>

</div>

<?php include 'includes/footer.php'; ?>