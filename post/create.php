<?php

session_start();
require_once('../config/db.php');

if(!isset($_POST['csrf_token']) || 
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']
    )) { //!issetで入ってなかったらtrueもしくはフォームに埋め込まれたトークンとサーバに保存されたトークンが合わなければtrue
    exit('不正なリクエスト');
}

$_SESSION["csrf_token"] = bin2hex(random_bytes(32)); //トークンの使い回しを防ぐためにトークンを再生成


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