<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
require_once('../includes/functions.php');
// $_SERVER["REQUEST_METHOD"]がPOSTの場合だけ以下の処理をしてください
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // filter_inputでINPUT_POSTからemailを取得して$emailに入れてください
    $email = filter_input(INPUT_POST, 'email');
    // filter_inputでINPUT_POSTからpasswordを取得して$passwordに入れてください
    $password = filter_input(INPUT_POST, 'password');
    // usersテーブルからemailが一致するレコードを取得するSQLを書いてください
    // プリペアドステートメントを使ってください
    // 結果を$userに入れてください（fetch・連想配列で取得）
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($sql);
    $stnt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // $userが存在し、かつpassword_verifyでパスワードが一致する場合
        // $_SESSION['user']に$userを入れてください
        // session_regenerate_idでセッションIDを再生成してください（固定化攻撃対策）
        // ../index.phpにリダイレクトしてexitしてください
    if(isset($user) && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        session_regenerate_id();
        redirect('../index.php');
        exit;
    } else {
        echo 'ログイン失敗';
    }
    // 一致しない場合
        // 「ログイン失敗」と表示してください
}
?>

<!-- h2タグで「ログイン」と表示してください -->
<h2>ログイン</h2>
<!-- POSTで送信するformタグを書いてください -->
<form METHOD="POST">
    <!-- email型のinputを書いてください -->
    <input type="email" name="email" placehoder="メールアドレス">
    <!-- password型のinputを書いてください -->
    <input type="password" name="password" placehoder="パスワード">
    <!-- ログインボタンを書いてください -->
    <button>ログイン</button>
</form>
<!-- formタグを閉じてください -->
