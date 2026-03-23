<?php

session_start();
require_once('../config/db.php');
require_once('../includes.function.php');

requireLogin();
verifyCsrfToken();


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$sql = "SELECT * FROM posts WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$post = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<h2>投稿編集</h2>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>" >

    <textarea name="content">
        <?php echo htmlspecialchars($post['content']); ?>
    </textarea>

    <button>更新</button>

</form>