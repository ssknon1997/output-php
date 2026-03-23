<?php

session_start();

require_once('../config/db.php');

if (!isset($_SESSION['user'])) { //ログインしていないユーザがURLから削除できないように
    header('Location: ../auth/login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // URLのクエリパラメータ（?id=○○）から投稿IDを取得

$sql = "DELETE FROM posts WHERE id=? AND user_id=?"; // 投稿IDが一致し、かつログインユーザーのIDと一致する場合のみ削除

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $id,
    $_SESSION['user']['id']
]);

header('Location: ../index.php');
exit;