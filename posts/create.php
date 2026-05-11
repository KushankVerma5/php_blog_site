<?php

session_start();

require "../config/database.php";

include "../includes/header.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$error = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']){
        die("CSRF validation failed");
    }

    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $content = trim($_POST['content']);

    if(strlen($title) < 3){
        $error = "Title must be at least 3 characters";
    }

    $imageName = "";

    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){

        $allowed = ['jpg','jpeg','png','webp'];

        $fileName = $_FILES['image']['name'];

        $tmpName = $_FILES['image']['tmp_name'];

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if(in_array($ext, $allowed)){

            $imageName = time() . "_" . $fileName;

            move_uploaded_file(
                $tmpName,
                "../assets/uploads/" . $imageName
            );

        } else {

            $error = "Invalid image format";
        }
    }

    if(empty($error)){

        $sql = "
        INSERT INTO posts
        (user_id,title,category,image,content)
        VALUES
        (:user_id,:title,:category,:image,:content)
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([

            ':user_id' => $_SESSION['user_id'],
            ':title' => $title,
            ':category' => $category,
            ':image' => $imageName,
            ':content' => $content

        ]);

        header("Location: ../index.php");

        exit;
    }
}

$_SESSION['csrf'] = bin2hex(random_bytes(32));
?>

<div class="row justify-content-center form-section">

<div class="col-lg-8">

<div class="card shadow-lg border-0 auth-card">

<div class="card-body p-4">

<h2 class="mb-2 page-title">
Create New Blog
</h2>

<p class="text-muted mb-4">

Publish articles with images,
categories and dynamic visibility.

</p>

<?php if($error): ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<input
type="hidden"
name="csrf"
value="<?= $_SESSION['csrf'] ?>">

<!-- TITLE -->

<div class="mb-3">

<label class="form-label">
Title
</label>

<input
type="text"
name="title"
class="form-control"
placeholder="Enter blog title"
required>

</div>

<!-- CATEGORY -->

<div class="mb-3">

<label class="form-label">
Category
</label>

<select
name="category"
class="form-select">

<option value="Admit Card">
Admit Card
</option>

<option value="Result">
Result
</option>

<option value="News">
News
</option>

<option value="Technology">
Technology
</option>

</select>

</div>

<!-- IMAGE -->

<div class="mb-3">

<label class="form-label">
Featured Image
</label>

<input
type="file"
name="image"
id="imageInput"
class="form-control">

<img
id="previewImage"
class="blog-image-preview mt-3"
style="display:none;">

</div>

<!-- CONTENT -->

<div class="mb-4">

<label class="form-label">
Content
</label>

<textarea
name="content"
rows="8"
class="form-control"
placeholder="Write your blog content..."
required></textarea>

</div>

<button class="btn btn-dark w-100">

Publish Blog

</button>

</form>

</div>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>