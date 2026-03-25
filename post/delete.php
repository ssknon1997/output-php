<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
// $_SESSION['user']が存在しない場合、../auth/login.phpにリダイレクトしてexitしてください
requireLogin();
// filter_inputでINPUT_GETからidをFILTER_VALIDATE_INTで取得して$idに入れてください
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
// postsテーブルからidとuser_idが一致するレコードをDELETEするSQLを書いてください
// 自分の投稿以外は削除できないようにWHERE id=? AND user_id=?にしてください
// プリペアドステートメントを使ってください
// $idと$_SESSION['user']['id']を渡してください
$sql = "DELETE FROM posts WHERE id=? AND user_id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $id,
    $_SESSION['user']['id']
]);
// ../index.phpにリダイレクトしてexitしてください
redirect('../index.php');
exit();