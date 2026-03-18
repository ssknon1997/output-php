<?php

require_once('../config/db.php');

if($_SERVER["REQUEST_METHOD"] === "POST") { //名前,メール,パスワードがPOSTで送信されたらifの中の処理が実行される

$name = $_POST["name"]; //$_POST['name']はinputタグのname属性で受け取った値が入っている
$email = $_POST['email']; //入力された情報をSQLに後で追加するために変数にいれる
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //sqlに保存する際に入力された値をハッシュ化してsqlを見られてもパスワードがバレないようにする

$sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)"; //sqlに今入力された情報をusersテーブルの中のname,email,passwordカラムにプレースホルダで追加している

$stmt = $pdo->prepare($sql); //prepareで引数に$sqlを指定して中に書いたINSERT文を実行するための準備をしている(SQLインジェクション対策)
$stmt->execute([$name, $email, $password]); //executeで引数に先程のusersテーブルのカラム順と同じ用にプレースホルダに合う変数を指定してsqlを実行している

header("Location: login.php"); //headerで入力が完了したらlogin.phpへ移動する

}

?>

<h2>新規登録</h2>

<form method="POST">

<input type="text" name="name" placeholder="名前"> <!--placeholder:何も入力していないときに表示される入力するべき情報のヒント -->

<input type="email" name="email" placeholder="メール"> <!--placeholder:何も入力していないときに表示される入力するべき情報のヒント -->

<input type="password" name="password" placeholder="パスワード"> <!--placeholder:何も入力していないときに表示される入力するべき情報のヒント -->

<button>登録</button>

</form>