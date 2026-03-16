<?php

session_start();

require_once("../config/db.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $sql = "SELECT * FROM users WHERE email= ? ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        header("Location: ../index.php");

    } else {

        echo 'ログイン失敗';

    }
}

?>

<h2>ログイン</h2>

<form method="POST">

    <input type="email" name="email">

    <input type="password" name="password">

    <button>ログイン</button>
    
</form>