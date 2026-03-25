<?php
require_once('../includes/function.php');
// session_startを呼んでください
session_start();
// session_destroyでセッション情報を削除してください
session_destroy();
// auth/login.phpにリダイレクトしてexitしてください
redirect('auth/login.php');
exit;