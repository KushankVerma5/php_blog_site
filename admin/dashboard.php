<?php

session_start();

require "../config/database.php";

include "../includes/header.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$totalPosts = $pdo->query("
SELECT COUNT(*) FROM posts
")->fetchColumn();

$totalUsers = $pdo->query("
SELECT COUNT(*) FROM users
")->fetchColumn();

$recentPosts = $pdo->query("
SELECT posts.*, users.name
FROM posts
JOIN users ON posts.user_id = users.id
ORDER BY posts.created_at DESC
LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class="mb-4 page-title">
Admin Dashboard
</h1>

<div class="row g-4 mb-5">

<div class="col-md-6">

<div class="card shadow border-0 dashboard-card">

<div class="card-body">

<h5>Total Blogs</h5>

<h2 class="fw-bold">

<?= $totalPosts ?>

</h2>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card shadow border-0 dashboard-card">

<div class="card-body">

<h5>Total Users</h5>

<h2 class="fw-bold">

<?= $totalUsers ?>

</h2>

</div>

</div>

</div>

</div>

<div class="card shadow border-0">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center mb-4">

<h4>
Recent Blogs
</h4>

<a
href="../posts/create.php"
class="btn btn-dark">

Create Blog

</a>

</div>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>Title</th>
<th>Category</th>
<th>Author</th>
<th>Date</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php foreach($recentPosts as $post): ?>

<tr>

<td>

<?= htmlspecialchars($post['title']) ?>

</td>

<td>

<span class="badge bg-dark">

<?= htmlspecialchars($post['category']) ?>

</span>

</td>

<td>

<?= htmlspecialchars($post['name']) ?>

</td>

<td>

<?= date("d M Y", strtotime($post['created_at'])) ?>

</td>

<td>

<div class="d-flex gap-2">

<a
href="../blog.php?id=<?= $post['id'] ?>"
class="btn btn-sm btn-primary">

View

</a>

<a
href="../posts/edit.php?id=<?= $post['id'] ?>"
class="btn btn-sm btn-warning">

Edit

</a>

<button
class="btn btn-sm btn-danger delete-post"
data-id="<?= $post['id'] ?>">

Delete

</button>

</div>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>