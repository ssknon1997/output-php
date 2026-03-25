<?php
// session_startを呼んでください
session_start();
// config/db.phpをrequire_onceで読み込んでください
// includes/functions.phpをrequire_onceで読み込んでください
// header.phpをrequire_onceで読み込んでください
require_once('config/db.php');
require_once('includes/functions.php');
require_once('header.php');
// generateCsrfToken()でトークンを生成して$tokenに入れてください
$token = generateCsrfToken();
// $_SESSION['user']が存在する場合だけ以下の処理を行ってください
if(isset($_SESSION['user'])); {
    // $limitに1ページの表示件数5を入れてください
    $limit = 5;
    // $_GET["page"]が存在すれば$pageに入れ、なければ1を入れてください
    // （三項演算子を使ってください）
    $page = max(1, (int)$_GET['page'] ?? 1);
    // $offsetを計算してください（何件目からデータを取るか）
    $offset = ($page -1) * $limit;
    // postsの全カラム、usersのname、likesのいいね数（like_countとして）を取得するSQLを書いてください
    // postsとusersをJOINしてください（posts.user_id = users.id）
    // postsとlikesをLEFT JOINしてください（posts.id = likes.post_id）
    // GROUP BY posts.idでまとめてください
    // ORDER BY posts.created_atの降順にしてください
    // LIMITとOFFSETでページネーションしてください（プリペアドステートメントを使ってください）
    $sql = "SELECT posts.* , users.name, COUNT(likes.*) AS like_count
            FROM posts
            JOIN users ON posts.user_id = users.id
            LEFT JOIN likes ON posts.id = likes.post_id
            GROUP BY posts.id
            ORDER BY posts.created_at DESC
            LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt = bindValue($limit, $offset);
    $stmt->execute();
    // SQLを実行して結果を$postsに入れてください
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- h2タグで「投稿」と表示してください -->
<h2>投稿</h2>
<!-- $_SESSION['user']が存在する場合だけフォームを表示してください -->
<?php if(isset($_SESSION['user'])): ?>    
    <!-- post/create.phpにPOSTで送るformタグを書いてください -->
    <!-- enctype="multipart/form-data"をつけてください（画像送信のため） -->
<form action="post/create.php" method="POST">
        <!-- CSRFトークンをhiddenで埋め込んでください -->
    <input type="hidden" name="csrf_token" value="<?= $token;?>">
        <!-- contentという名前のtextareaを書いてください -->
    <textarea name="content"></textarea>
        <!-- imageという名前のfile inputを書いてください -->
    <input type="file" name="image">
        <!-- 送信ボタンを書いてください -->
    <button>送信</button>
    <!-- formタグを閉じてください -->
</form>
<!-- endif -->

<!-- h2タグで「投稿一覧」と表示してください -->
<h2>投稿一覧</h2>
<!-- foreachで$postsを$postとして1件ずつ取り出してください -->
<?php foreach($posts as $post): ?>
    <!-- divタグで囲んでください -->
<div>
        <!-- h()でXSS対策しながら投稿者名を表示してください -->
    <p><?= h($post['name']); ?></p>
        <!-- h()でXSS対策しながら投稿内容を表示してください -->
    <p><?= h($post['content']); ?></p>
        <!-- $post['image']が存在する場合だけimgタグで画像を表示してください -->
        <!-- src="uploads/画像ファイル名"、width="200"にしてください -->
    <?php if(isset($post[image])): ?>
        <p><img src="uploads/<?= $post['image']?>" width="200"></p>
    <?php endif; ?>
        <!-- h()でXSS対策しながら作成日時を表示してください -->
    <p><?= h($post['created_at']); ?></p>
        <!-- $_SESSION['user']が存在しかつログインユーザーと投稿者が一致する場合だけ
             post/delete.phpへの削除リンクを表示してください
             URLに?id=投稿IDをつけてください -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] || $post['user_id']): ?>
        <a href="post/delete.php?=<?=$post['id']; ?>">削除</a>
    <?php endif; ?>
        <!-- post/like.phpにPOSTで送るformタグを書いてください -->
    <form action="post/like.php" method="POST">
            <!-- post_idをhiddenで埋め込んでください -->
        <input type="hidden" name="post_id" value="<?= $post['post_id']; ?>">
            <!-- いいねボタンを書いてください -->
        <button>いいね</button>
        <!-- formタグを閉じてください -->
    </form>
        <!-- いいね数を表示してください -->

    <!-- divタグを閉じてください -->
</div>
    <!-- hrタグで区切り線を引いてください -->
<hr>
<!-- endforeachを書いてください -->
<?php endforeach; ?>
<?php
// postsテーブルの総件数をCOUNT(*)で取得して$totalに入れてください
$total = COUNT($posts);
// $total_pageを計算してください（ceil()で切り上げてください）
$total_page = ceil($total / $limit);
// forループでページ番号リンクを表示してください
for($i=0;$i<=$total_page;$i++) {
    echo "<a href='?page=$i'>$i</a>";
}
// <a href='?page=ページ番号'>ページ番号</a>の形式で出力してください
?>

<!-- $_SESSION['user']のendifを書いてください -->
<?php endif; ?>