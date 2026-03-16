<?php
session_start(); 
?>

<header>

<h1>掲示板</h1>

<nav>

<?php if(isset($_SESSION['user'])): ?> <!--$_SESSION['user'] に情報が入っているか入っていない場合ログイン新規登録のページリンク -->

<a href="index.php">掲示板</a>
<a href="auth/logout.php">ログアウト</a>

<?php else: ?> 

<a href="auth/login.php">ログイン</a>
<a href="auth/register.php">新規登録</a>

<?php endif; ?>

</nav> 

<hr> <!--ページの区切りとして横線を引く -->

</header>