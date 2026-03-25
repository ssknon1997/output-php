<?php
// session_startを呼んでください
session_start();
?>

<!-- headerタグを書いてください -->
<header>
    <!-- h1タグで「掲示板」と表示してください -->
    <h1>掲示板</h1>
    <!-- navタグを書いてください -->
    <nav>
        <!-- $_SESSION['user']が存在する場合は
             index.phpへの「掲示板」リンクと
             auth/logout.phpへの「ログアウト」リンクを表示してください -->
        <?php if(isset($_SESSION['user'])): ?>
            <a href="index.php">掲示板</a>
            <a href="auth/logout.php">ログアウト</a>
        <?php else: ?>
        <!-- 存在しない場合は
             auth/login.phpへの「ログイン」リンクと
             auth/register.phpへの「新規登録」リンクを表示してください -->
            <a href="auth/login.php">ログイン</a>
            <a href="auth/register.php">新規登録</a>
        <?php endif; ?>
    </nav>
    <!-- navタグを閉じてください -->
    <hr>
    <!-- hrタグでページの区切り線を引いてください -->
</header>
<!-- headerタグを閉じてください -->
