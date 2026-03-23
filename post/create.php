<?php

session_start();
require_once('../config/db.php');
require_once('../includes/function.php');

requireLogin();
verifyCsrfToken();

$content = filter_input(INPUT_POST, 'content');
$filename = null;

if(!$content) {
    redirect('../index.php');
}

if(!empty($_FILES['image']['name'])) {
    $filename = time(). "_" . $_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../uploads/" . $filename
    );
}

$sql = "INSERT INTO posts(user_id, content, image) VALUES(?, ?, ?)"; 

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['user']['id'],  //sessionのuser配列の中のidをプレースホルダに入力
    $content,
    $filename
]);


header("Location: ../index.php");

?>