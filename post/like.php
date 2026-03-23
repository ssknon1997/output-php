<?php

session_start();
require_once('../config/db.php');

if(!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

$post_id = filter_input(INPUT_POST, 'post_id', FILTER_VALIDATE_INT);
$user_id = $_SESSION['user']['id'];

if(!$post_id) {
    header('Location: ../index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT id FROM likes WHERE user_id=? AND post_id=?');
$stmt->execute([$user_id, $post_id]);

if ($stmt->fetch()) {
    $stmt = $pdo->prepare(
        'DELETE FROM likes WHERE user_id=? AND post_id=?'
    );
    $stmt->execute([$user_id, $post_id]);
} else {
    $stmt = $pdo->prepare(
        'INSERT INTO likes (user_id ,post_id) VALUES (?,?)'
    );
    $stmt->execute([$user_id, $post_id]);
}

header('Location: ../index.php');
exit;