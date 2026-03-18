<?php

$dsn = "mysql:host=localhost;port=8889;dbname=bbs;charset=utf8mb4"; 
$user = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOExceptionにエラーをthrowしている(catchでエラーを受け取れるようにしている)

} catch(PDOException $e) {

    echo "DB接続失敗";
    die($e->getMessage()); //どういうエラーが出てるのかを表示
    
}

?>