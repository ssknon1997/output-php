<?php

session_start();
require_once('../config/db.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$content = filter_input(INPUT_POST, 'content');

$sql = "UPDATE posts SET content=? WHERE id=? AND user_id=?"; //postsテーブルのcontent更新するするためにPOST送信されたidとuser_idが合うレコードを更新する

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $content,
    $id,
    $_SESSION['user']['id']
]);

header("Location: ../index.php");