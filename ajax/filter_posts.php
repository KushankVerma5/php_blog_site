<?php

require "../config/database.php";

$search = $_POST['search'] ?? '';

$category = $_POST['category'] ?? '';

$date = $_POST['date'] ?? '';

$sql = "
SELECT posts.*, users.name
FROM posts
JOIN users ON posts.user_id = users.id
WHERE 1
";

$params = [];

if(!empty($search)){

    $sql .= " AND posts.title LIKE :search";

    $params[':search'] = "%$search%";
}

if(!empty($category)){

    $sql .= " AND posts.category = :category";

    $params[':category'] = $category;
}

if(!empty($date)){

    $sql .= " AND DATE(posts.created_at) = :date";

    $params[':date'] = $date;
}

$sql .= " ORDER BY posts.created_at DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute($params);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($posts) > 0){

foreach($posts as $post){

?>

<div class="card blog-card mb-4 shadow-sm">

<?php if($post['image']): ?>

<img
src="/blog_site/assets/uploads/<?= $post['image'] ?>"
class="card-img-top"
style="height:250px; object-fit:cover;">

<?php endif; ?>

<div class="card-body">

<span class="badge bg-dark mb-2">

<?= htmlspecialchars($post['category']) ?>

</span>

<h4>

<?= htmlspecialchars($post['title']) ?>

</h4>

<p class="post-content">

<?= substr(htmlspecialchars($post['content']),0,120) ?>...

</p>

<small>

By <?= htmlspecialchars($post['name']) ?>

</small>

<div class="post-meta mt-2">

Published:
<?= date("d M Y", strtotime($post['created_at'])) ?>

</div>

<div class="mt-3">

<a
href="blog.php?id=<?= $post['id'] ?>"
class="btn btn-dark btn-sm">

Read More

</a>

</div>

</div>

</div>

<?php

}

}else{

echo '
<div class="alert alert-info">
No posts found
</div>
';

}