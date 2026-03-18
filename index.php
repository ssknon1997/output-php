<?php

session_start();

require_once('config/db.php');
require_once('header.php');

if(isset($_SESSION['user'])):
//postsのすべてのカラムuserのnameカラムを対象にjoinでposts,usersテーブルを連結しidを紐づけ作成日時が降順になるように表示
$sql = "SELECT posts.*, users.name 
        FROM posts
        JOIN users ON posts.user_id = users.id  
        ORDER BY posts.created_at DESC";

$stmt = $pdo->query($sql); // SQLを実行して結果を取得

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC); //すべてのレコードを取り出す

?>

<h2>投稿</h2>

<?php if(isset($_SESSION['user'])): ?> <!--userが入っていれば投稿できる -->

<form action="post/create.php" method="POST"> <!--投稿ボタンを押すとcreate.phpに情報が送られる -->

    <textarea name="content"></textarea>

    <button>投稿</button>

</form>

<?php endif; ?>

<h2>投稿一覧</h2>

<?php foreach($posts as $post): ?> <!--上で取り出したすべてのレコードを$postに入れて一つずつ取り出す-->

<div>

<p><?php echo htmlspecialchars($post['name']); ?></p> <!--postで受け取った名前に変な文字列が含まれていればXSS対策としてHTMLエスケープ-->

<p><?php echo htmlspecialchars($post['content']); ?></p> <!--// 投稿内容をXSS対策としてエスケープ-->

<p><?php echo htmlspecialchars($post['created_at']); ?></p> <!-- 作成日時も念のためエスケープ-->

<?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $post['user_id']): ?> <!--sessionのuserが入っているかつログイン中のユーザーと投稿者が一致する場合のみ削除可能-->

<a href="post/delete.php?id=<?php echo $post['id']; ?>">削除</a>

<?php endif; ?>

</div>

<hr>

<?php endforeach; ?>

<?php endif; ?>