<?php

session_start();

require_once('../config/db.php');

if(!isset($_SESSION["user"])) {

    header('Location: ../auth/login.php');
    exit;

}

$content = filter_input(INPUT_POST, 'content');

$sql = "INSERT INTO posts(user_id, content) VALUES(?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['user']['id'],
    $content
]);

header("Location: ../index.php");

?>