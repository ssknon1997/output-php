<?php

require_once('../config/db.php');

if($_SERVER["REQUEST_METHOD"] === "POST") {

$name = $_POST["name"];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name, email, password) VALUES(?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute();

header("Location: login.php");

}

?>

<h2>新規登録</h2>

<form method="POST">

<input type="text" name="name" placeholder="名前"> <!--placeholder:何も入力していないときに表示される入力するべき情報のヒント -->

<input type="email" name="email" placeholder="メール"> <!--placeholder:何も入力していないときに表示される入力するべき情報のヒント -->

<input type="password" name="password" placeholder="パスワード"> <!--placeholder:何も入力していないときに表示される入力するべき情報のヒント -->

<button>登録</button>

</form>