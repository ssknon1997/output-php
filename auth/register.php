<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/functions.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
require_once('../includes/functions.php');
// generateCsrfToken()でトークンを生成して$tokenに入れてください
$token = generateCsrfToken();
// $_SERVER["REQUEST_METHOD"]がPOSTの場合だけ以下の処理をしてください
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // verifyCsrfToken()でCSRFトークンを検証してください
    verifyCsrfToken();
    // $_POST["name"]を$nameに入れてください
    $name = filter_input(INPUT_POST, 'name');
    // $_POST["email"]を$emailに入れてください
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    // $_POST["password"]をpassword_hashでハッシュ化して$passwordに入れてください
    // PASSWORD_DEFAULTを使ってください
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // usersテーブルにname、email、passwordをINSERTするSQLを書いてください
    // プリペアドステートメントを使ってください
    $sql = "SELECT * FROM users WHERE name=? email=? password=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $password]);
    // login.phpにリダイレクトしてexitしてください
    redirect('login.php');
}
?>

<!-- h2タグで「新規登録」と表示してください -->
<h2>新規登録</h2>
<!-- POSTで送信するformタグを書いてください -->
<form action="">
    <!-- CSRFトークンをhiddenで埋め込んでください -->
    <input type="hidden" name="csrf_token" value="<?= $token; ?>">
    <!-- text型のinputを書いてください（name属性はname、placeholder「名前」） -->
    <input type="text" name="name" placehoder="名前">
    <!-- email型のinputを書いてください（name属性はemail、placeholder「メール」） -->
    <input type="email" name="email" placehoder="メール">
    <!-- password型のinputを書いてください（name属性はpassword、placeholder「パスワード」） -->
    <input type="password" name="password" placehoder="パスワード">
    <!-- 登録ボタンを書いてください -->
    <button>登録</button>

</form>
<!-- formタグを閉じてください -->
