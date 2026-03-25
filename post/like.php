<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
// $_SESSION['user']が存在しない場合、../index.phpにリダイレクトしてexitしてください
requireLogin();
// filter_inputでINPUT_POSTからpost_idをFILTER_VALIDATE_INTで取得して$post_idに入れてください
$post_id = getPostInt('post_id');
// $_SESSION['user']['id']を$user_idに入れてください
$user_id = $_SESSION['user']['id'];
// $post_idが取得できなかった場合、../index.phpにリダイレクトしてexitしてください

// likesテーブルからuser_idとpost_idが一致するレコードを取得するSQLを書いてください
// プリペアドステートメントを使ってください
$sql = "SELECT * FROM likes WHERE user_id=? AND post_id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $user_id,
    $post_id
]);
$like = $stmt->fetch(PDO::FETCH_ASSOC);
// fetchで結果が取得できた場合（すでにいいね済み）
    // likesテーブルからuser_idとpost_idが一致するレコードをDELETEしてください
    // プリペアドステートメントを使ってください
if($like) {
    $sql = "DELETE FROM likes WHERE= user_id=? AND post_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $user_id,
        $post_id
    ]);
} else {
    $sql = "INSERT INTO likes (user_id, post_id) VALUES(?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $user_id,
        $post_id
    ]);
}
// 取得できなかった場合（まだいいねしていない）
    // likesテーブルにuser_idとpost_idをINSERTしてください
    // プリペアドステートメントを使ってください

// ../index.phpにリダイレクトしてexitしてください
redirect('../index.php');
exit;