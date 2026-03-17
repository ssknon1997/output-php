<?php

require_once('config/db.php');
require_once('header.php');

$sql = "SELECT posts.*, user.name
        FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC";

$stmt = pdo->query($sql);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>投稿</h2>

<?php if(isset($_SESSION['user'])): ?>

<form action="post/create.php" method="POST">

    <textarea name="contet"></textarea>

    <button>投稿</button>

</form>

<?php endif; ?>

<h2>投稿一覧</h2>

<?php foreach($posts as $post): ?>

<div>

<p><?php echo htmlspecialchars($post['name']); ?></p>

<p><?php echo htmlspecialchars($post['content']); ?></p>

<p><?php echo $post['created_at']; ?></p>

<?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $post['user_id']): ?>

<a href="post/delete.php?id=<?php echo $post['id']; ?>">削除</a>

<?php endif; ?>

</div>

<hr>

<?php endforeach; ?>