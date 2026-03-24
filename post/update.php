<?php
// session_startを呼んでください

// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/function.phpをrequire_onceで読み込んでください

// requireLogin()でログインチェックしてください

// verifyCsrfToken()でCSRFトークンを検証してください

// filter_inputでINPUT_POSTからidをFILTER_VALIDATE_INTで取得して$idに入れてください

// filter_inputでINPUT_POSTからcontentを取得して$contentに入れてください

// postsテーブルのcontentをUPDATEするSQLを書いてください
// WHERE id=? AND user_id=?で自分の投稿のみ更新できるようにしてください
// プリペアドステートメントを使ってください
// $content、$id、$_SESSION['user']['id']を渡してください

// ../index.phpにリダイレクトしてexitしてください
