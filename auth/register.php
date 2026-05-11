<?php

require "../config/database.php";

include "../includes/header.php";

$error = "";

$success = "";

if(isset($_POST['register'])) {

    $name = trim($_POST['name']);

    $email = trim($_POST['email']);

    $password = trim($_POST['password']);

    if(strlen($password) < 6){

        $error = "Password must be at least 6 characters";

    } else {

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $sql = "
        INSERT INTO users
        (name,email,password)
        VALUES
        (:name,:email,:password)
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([

            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword

        ]);

        $success = "Registration successful";
    }
}
?>

<div class="row justify-content-center form-section">

<div class="col-lg-10">

<div class="card auth-card shadow-lg">

<div class="row g-0">

<div class="col-md-6 auth-left d-flex flex-column justify-content-center p-5">

<h2>Create Account</h2>

<p class="mt-3">

Join BlogBold and start sharing
your knowledge with the world.

</p>

</div>

<div class="col-md-6 bg-white p-5">

<h3 class="mb-4 page-title">
Register
</h3>

<?php if($error): ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php endif; ?>

<?php if($success): ?>

<div class="alert alert-success">

<?= $success ?>

</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

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
name="register"
class="btn btn-dark w-100">

Create Account

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>