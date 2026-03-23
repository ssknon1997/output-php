<?php

session_start();

require_once('config/db.php');
require_once('includes/function.php');
require_once('header.php');

$token = generateCsrfToken();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_SESSION['user'])):

$limit = 5;

$page = max(1, (int)($_GET['page'] ?? 1));
$offset = ($page - 1) * $limit;

$sql = 'SELECT posts.*,
        users.name,
        COUNT(likes.id) as like_count
        FROM posts
        JOIN users ON posts.user_id = users.id
        LEFT JOIN likes ON posts.id = likes.post_id
        GROUP BY posts.id
        ORDER BY posts.created_at DESC
        LIMIT :limit OFFSET :offset';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<h2>投稿</h2>

<?php if(isset($_SESSION['user'])): ?> <!--userが入っていれば投稿できる -->

<form action="post/create.php" method="POST" enctype="multipart/form-data"> <!--投稿ボタンを押すとcreate.phpに情報が送られる -->
        
        <input type="hidden" name="csrf_token" value="<?= $token?>">

        <textarea name="content" placeholder="投稿する文字を入力してください"></textarea>
        <p><input type="file"  name="image" ></p>


        <button>投稿</button>

</form>

<?php endif; ?>

<h2>投稿一覧</h2>

<?php foreach($posts as $post): ?> <!--上で取り出したすべてのレコードを$postに入れて一つずつ取り出す-->

<div>

<p><?php echo h($post['name']); ?></p> <!--postで受け取った名前に変な文字列が含まれていればXSS対策としてHTMLエスケープ-->

<p><?php echo h($post['content']); ?></p> <!--// 投稿内容をXSS対策としてエスケープ-->

<p><?php if($post['image']): ?>

        <img src="uploads/<?= h($post['image']); ?>" width="200">

<?php endif ?>
<p><?php echo h($post['created_at']); ?></p> <!-- 作成日時も念のためエスケープ-->


<?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $post['user_id']): ?> <!--sessionのuserが入っているかつログイン中のユーザーと投稿者が一致する場合のみ削除可能-->

<a href="post/delete.php?id=<?php echo h($post['id']); ?>">削除</a>


<?php endif; ?>


<form action="post/like.php" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
    <button type="submit">いいね</button>
</form>
<p>いいね数: <?php echo $post["like_count"]; ?></p>


</div>

<hr>

<?php endforeach; ?>


<?php

$total = $pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn();

$total_page = ceil($total / $limit);

for($i=1;$i<=$total_page;$i++){

echo "<a href='?page=$i'>$i</a> ";

}

?>

<?php endif; ?>