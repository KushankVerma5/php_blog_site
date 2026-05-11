<?php

session_start();

require "../config/database.php";

include "../includes/header.php";

$error = "";

if(isset($_POST['login'])) {

    $email = trim($_POST['email']);

    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = :email";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':email' => $email
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: ../index.php");

        exit;

    } else {

        $error = "Invalid email or password";
    }
}
?>

<div class="row justify-content-center align-items-center form-section">

<div class="col-lg-10">

<div class="card auth-card shadow-lg">

<div class="row g-0">

<div class="col-md-6 auth-left d-flex flex-column justify-content-center p-5">

<h2>Welcome Back</h2>

<p class="mt-3">

Login to manage blogs, publish content,
and explore dynamic features.

</p>

</div>

<div class="col-md-6 bg-white p-5">

<h3 class="mb-4 page-title">
Login
</h3>

<?php if($error): ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-4">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
name="login"
class="btn btn-dark w-100">

Login

</button>

</form>

<p class="mt-4">

Don't have an account?

<a href="register.php">
Register
</a>

</p>

</div>

</div>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>