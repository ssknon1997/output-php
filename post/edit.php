<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/functions.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
require_once('../includes/functions.php');
// requireLogin()でログインチェックしてください
requireLogin();
// filter_inputでINPUT_GETからidをFILTER_VALIDATE_INTで取得して$idに入れてください
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
// postsテーブルからidが一致するレコードを1件取得するSQLを書いてください
// プリペアドステートメントを使ってください
// 結果を$postに入れてください（fetch・連想配列で取得）
$sql = "SELECT * FROM posts WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- h2タグで「投稿編集」と表示してください -->
<h2>投稿編集</h2>
<!-- post/update.phpにPOSTで送るformタグを書いてください -->
<form method="POST">
    <!-- CSRFトークンをhiddenで埋め込んでください -->
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'];?>">
    <!-- idをhiddenで埋め込んでください（htmlspecialcharsでXSS対策してください） -->
    <input type="hidden" name="id" value="<?= h($id);?>">
    <!-- contentをtextareaで表示してください（htmlspecialcharsでXSS対策してください） -->
    <textarea name="content" id="<?= h($id); ?>"></textarea>
    <!-- 更新ボタンを書いてください -->
     <button>更新</button>
</form>
<!-- formタグを閉じてください -->
