<?php

session_start();

session_destroy(); //sessionの情報を削除

header("Location: login.php");
exit;
