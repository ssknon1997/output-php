<?php
// session_startを呼んでください

// ../config/db.phpをrequire_onceで読み込んでください

// $_SESSION['user']が存在しない場合、../auth/login.phpにリダイレクトしてexitしてください

// filter_inputでINPUT_GETからidをFILTER_VALIDATE_INTで取得して$idに入れてください

// postsテーブルからidとuser_idが一致するレコードをDELETEするSQLを書いてください
// 自分の投稿以外は削除できないようにWHERE id=? AND user_id=?にしてください
// プリペアドステートメントを使ってください
// $idと$_SESSION['user']['id']を渡してください

// ../index.phpにリダイレクトしてexitしてください
