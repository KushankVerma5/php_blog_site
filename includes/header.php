<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>BlogBold</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="/blog_site/assets/css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

<div class="container">

<a class="font navbar-brand fw-bold" href="/blog_site/index.php">
BlogBold
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navMenu">

<ul class="navbar-nav ms-auto align-items-center gap-2">

<li class="nav-item me-2">
<a href="/blog_site/index.php" class="nav-link">
Home
</a>
</li>

<?php if(isset($_SESSION['user_id'])): ?>

<li class="nav-item me-2">

<a href="/blog_site/posts/create.php" class="btn btn-success btn-sm">
Create Blog
</a>

</li>

<li class="nav-item me-2">

<a
href="/blog_site/admin/dashboard.php"
class="btn btn-light btn-sm">

Dashboard

</a>

</li>

<li class="nav-item me-3">

<div class="profile-avatar">

<?php

$name = $_SESSION['user_name'] ?? 'US';

echo strtoupper(substr($name,0,2));

?>

</div>

</li>

<li class="nav-item">

<a href="/blog_site/auth/logout.php"
class="btn btn-danger btn-sm">

Logout

</a>

</li>

<?php else: ?>

<li class="nav-item me-2">

<a href="/blog_site/auth/login.php" class="btn btn-primary btn-sm">
Login
</a>

</li>

<li class="nav-item">

<a href="/blog_site/auth/register.php" class="btn btn-warning btn-sm">
Register
</a>

</li>

<?php endif; ?>

</ul>

</div>

</div>

</nav>

<div class="container py-4">