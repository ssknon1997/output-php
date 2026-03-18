<?php

session_start();

require_once("../config/db.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = filter_input(INPUT_POST, 'email'); //POSTで送信されたemailの値を変数に入れている（フィルタ処理も可能）
    $password = filter_input(INPUT_POST, 'password'); //POSTで送信されたpasswordの値を変数に入れている（フィルタ処理も可能）

    $sql = "SELECT * FROM users WHERE email= ? "; // usersテーブルから入力されたemailと一致するユーザーを取得する

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]); // SQLを実行し、プレースホルダに$emailをバインド(データと結びつける)する

    $user = $stmt->fetch(PDO::FETCH_ASSOC); // 一致したユーザーの1レコードを連想配列で取得

    if($user && password_verify($password, $user['password'])) { //$userに値が入っているかつpassword_verifyで入力パスワードとDBのハッシュ化パスワードが一致した場合
        $_SESSION['user'] = $user; // ログインしたユーザー情報をセッションに保存

        header("Location: ../index.php");
        exit;

    } else {

        echo 'ログイン失敗'; // ユーザーが存在しない、またはパスワードが一致しない場合

    }
}

?>

<h2>ログイン</h2>

<form method="POST">

    <input type="email" name="email">

    <input type="password" name="password">

    <button>ログイン</button>
    
</form>