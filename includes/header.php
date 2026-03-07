<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="/blog_site/index.php">BlogBold</a>

        <div>

        <?php if(isset($_SESSION['user_id'])): ?>

            <a href="/blog_site/posts/create.php" class="btn btn-success btn-sm">
                Create Post
            </a>

            <a href="/blog_site/auth/logout.php" class="btn btn-danger btn-sm">
                Logout
            </a>

        <?php else: ?>

            <a href="/blog_site/auth/login.php" class="btn btn-primary btn-sm">
                Login
            </a>

            <a href="/blog_site/auth/register.php" class="btn btn-warning btn-sm">
                Register
            </a>

        <?php endif; ?>

        </div>

    </div>
</nav>

<div class="container mt-4">