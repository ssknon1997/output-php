<?php

session_start();

require_once('../config/db.php');

if(!isset($_SESSION["user"])) { //sessionのuserが入ってない場合ログイン画面へ

    header('Location: ../auth/login.php');
    exit;

}

$content = filter_input(INPUT_POST, 'content');

$sql = "INSERT INTO posts(user_id, content) VALUES(?, ?)"; 

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['user']['id'],  //sessionのuser配列の中のidをプレースホルダに入力
    $content
]);

header("Location: ../index.php");

?>