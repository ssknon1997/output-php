<?php

session_start();

require_once('../config/db.php');

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=? AND user_id=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $id,
    $_SESSION['user']['id']
]);

header('Location: ../index.php');