<?php

session_start();

require "../config/database.php";

include "../includes/header.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("
SELECT * FROM posts
WHERE id = :id
");

$stmt->execute([
    ':id' => $id
]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$post){
    die("Post not found");
}

if($post['user_id'] != $_SESSION['user_id']){
    die("Unauthorized access");
}

if(isset($_POST['update'])){

    $title = trim($_POST['title']);

    $category = trim($_POST['category']);

    $content = trim($_POST['content']);

    $imageName = $post['image'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){

        $fileName = $_FILES['image']['name'];

        $tmpName = $_FILES['image']['tmp_name'];

        $imageName = time() . "_" . $fileName;

        move_uploaded_file(
            $tmpName,
            "../assets/uploads/" . $imageName
        );
    }

    $update = $pdo->prepare("
        UPDATE posts
        SET
        title = :title,
        category = :category,
        image = :image,
        content = :content
        WHERE id = :id
    ");

    $update->execute([

        ':title' => $title,
        ':category' => $category,
        ':image' => $imageName,
        ':content' => $content,
        ':id' => $id

    ]);

    header("Location: ../index.php");
    exit;
}
?>

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow border-0">

<div class="card-body p-4">

<h2 class="mb-4">Edit Blog</h2>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">Title</label>

<input
type="text"
name="title"
class="form-control"
value="<?= htmlspecialchars($post['title']) ?>">

</div>

<div class="mb-3">

<label class="form-label">Category</label>

<select name="category" class="form-select">

<option value="<?= $post['category'] ?>">
<?= $post['category'] ?>
</option>

<option value="Admit Card">Admit Card</option>
<option value="Result">Result</option>
<option value="Technology">Technology</option>
<option value="News">News</option>

</select>

</div>

<div class="mb-3">

<img
src="../assets/uploads/<?= $post['image'] ?>"
width="150"
class="rounded mb-3">

<input
type="file"
name="image"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">Content</label>

<textarea
name="content"
rows="8"
class="form-control"><?= htmlspecialchars($post['content']) ?></textarea>

</div>

<button name="update" class="btn btn-dark w-100">
Update Blog
</button>

</form>

</div>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>