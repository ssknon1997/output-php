<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/functions.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
require_once('../includes/functions.php');
// requireLogin()でログインチェックしてください
requireLogin();
// verifyCsrfToken()でCSRFトークンを検証してください
verifyCsrfToken();
// filter_inputでINPUT_POSTからidをFILTER_VALIDATE_INTで取得して$idに入れてください
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
// filter_inputでINPUT_POSTからcontentを取得して$contentに入れてください
$content = filter_input(INPUT_POST, 'content');
// postsテーブルのcontentをUPDATEするSQLを書いてください
// WHERE id=? AND user_id=?で自分の投稿のみ更新できるようにしてください
// プリペアドステートメントを使ってください
// $content、$id、$_SESSION['user']['id']を渡してください
$sql = "UPDATE posts SET content = ? WHERE id=? AND user_id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $content,
    $id,
    $_SESSION['user']['id']
]);
// ../index.phpにリダイレクトしてexitしてください
redirect('index.php');