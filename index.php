<?php
session_start();
require 'config/database.php';
include 'includes/header.php';

$limit = 5;
$page = $_GET['page'] ?? 1;

$offset = ($page - 1) * $limit;

$search = $_GET['search'] ?? '';

$countQuery = $pdo->query("
SELECT COUNT(*) as total FROM posts
");

$totalPosts = $countQuery->fetch()['total'];

$totalPages = ceil($totalPosts / $limit);

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

<h2 class="mb-4">Statement that are <span class="font">Bold</span></h2>

<div class="bg-dark text-white p-5 rounded-4 mb-5 shadow">

<h1 class="fw-bold">
Share Your Thoughts With The World
</h1>

<p class="mt-3">

Create blogs, explore categories, search articles,
and manage content dynamically with AJAX.

</p>

<?php if(isset($_SESSION['user_id'])): ?>

<a href="posts/create.php" class="btn btn-warning mt-3">

Create New Blog

</a>

<?php else: ?>

<a href="auth/register.php" class="btn btn-warning mt-3">

Get Started

</a>

<?php endif; ?>

</div>

<!-- SEARCH BAR -->

<div class="row mb-4">

<div class="col-md-4 mb-2">

<input
type="text"
id="search"
class="form-control"
placeholder="Search blogs...">

</div>

<div class="col-md-4 mb-2">

<select id="category" class="form-select">

<option value="">All Categories</option>

<option value="Technology">Technology</option>

<option value="News">News</option>

<option value="Result">Result</option>

<option value="Admit Card">Admit Card</option>

</select>

</div>

<div class="col-md-4 mb-2">

<input
type="date"
id="date"
class="form-control">

</div>

</div>

<!-- <form method="GET" class="mb-4">

<div class="input-group">

<input type="text" name="search" 
class="form-control"
placeholder="Search posts"
value="<?= htmlspecialchars($search) ?>">

<button class="btn btn-primary">Search</button>

</div>

</form> -->

<div id="post-container">
<?php if(count($posts) > 0): ?>

<?php foreach($posts as $post): ?>

<div class="card blog-card mb-4 shadow-sm">

<div class="card-body">

<?php if($post['image']): ?>

<img
src="assets/uploads/<?= $post['image'] ?>"
class="card-img-top"
style="height:250px; object-fit:cover;">

<?php endif; ?>

<h4><?= htmlspecialchars($post['title']) ?></h4>

<span class="badge bg-dark mb-2">
<?= htmlspecialchars($post['category']) ?>
</span>

<p class="post-content">

<?= substr(htmlspecialchars($post['content']),0,120) ?>...

</p>

<small>By <?= htmlspecialchars($post['name']) ?></small>

<div class="post-meta mt-2">

Published:
<?= date("d M Y", strtotime($post['created_at'])) ?>

</div>

<div class="d-flex gap-2 mt-3 flex-wrap">

<a
href="blog.php?id=<?= $post['id'] ?>"
class="btn btn-dark btn-sm">

Read More

</a>

<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>

<a
href="posts/edit.php?id=<?= $post['id'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<button
class="btn btn-danger btn-sm delete-post"
data-id="<?= $post['id'] ?>">

Delete

</button>

<?php endif; ?>

</div>

</div>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="alert alert-info">No posts available.</div>

<?php endif; ?>


<!-- PAGINATION -->

<div class="mt-4">

<?php for($i = 1; $i <= $totalPages; $i++): ?>

<a
href="?page=<?= $i ?>"
class="btn btn-outline-primary">

<?= $i ?>

</a>

<?php endfor; ?>

</div>

<!-- <div class="mt-4">

<a href="?page=1" class="btn btn-outline-primary">1</a>
<a href="?page=2" class="btn btn-outline-primary">2</a>
<a href="?page=3" class="btn btn-outline-primary">3</a>

</div> -->

</div>

<?php include 'includes/footer.php'; ?>