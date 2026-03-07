<?php
require "../config/database.php";

if(isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name,email,password)
            VALUES (:name, :email, :password)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $password
    ]);

    echo "Registered Successfully!";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button name="register">Register</button>
</form>