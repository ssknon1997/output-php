<?php
// session_startを呼んでください
session_start();
// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/functions.phpをrequire_onceで読み込んでください
require_once('../config/db.php');
require_once('../includes/functions.php');
// requireLogin()でログインチェックしてください
requireLogin();
// verifyCsrfToken()でCSRFトークンを検証してください
verifyCsrfToken();
// filter_inputでINPUT_POSTからcontentを取得して$contentに入れてください
$content = filter_input(INPUT_POST, 'content');
// $filenameをnullで初期化してください
$filename = null;
// $contentが空ならindex.phpにリダイレクトしてください
if(!$content) {
    redirect('index.php');
}
// $_FILES['image']['name']が空でない場合、以下の処理をしてください
    // time()と元のファイル名を組み合わせたファイル名を$filenameに入れてください
    // move_uploaded_fileで../uploads/ディレクトリに画像を移動してください
if(isset($_FILES['image']['name'])) {
    $filename = time() . '_' . $_FILES['file']['tmp_name'];
    move_uploaded_file('../uploads/' .$filename);
} 
// postsテーブルにuser_id、content、imageをINSERTするSQLを書いてください
// プリペアドステートメントを使ってください
// $_SESSION['user']['id']、$content、$filenameを渡してください
$sql = "INSERT INTO posts(user_id, content, image) VALUES(?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['user']['id'],
    $content,
    $filename
]);
// ../index.phpにリダイレクトしてexitしてください
redirect('index.php');
exit;