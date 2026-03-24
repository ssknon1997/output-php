<?php
// session_startを呼んでください

// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/function.phpをrequire_onceで読み込んでください

// requireLogin()でログインチェックしてください

// verifyCsrfToken()でCSRFトークンを検証してください

// filter_inputでINPUT_POSTからcontentを取得して$contentに入れてください

// $filenameをnullで初期化してください

// $contentが空ならindex.phpにリダイレクトしてください

// $_FILES['image']['name']が空でない場合、以下の処理をしてください
    // time()と元のファイル名を組み合わせたファイル名を$filenameに入れてください
    // move_uploaded_fileで../uploads/ディレクトリに画像を移動してください

// postsテーブルにuser_id、content、imageをINSERTするSQLを書いてください
// プリペアドステートメントを使ってください
// $_SESSION['user']['id']、$content、$filenameを渡してください

// ../index.phpにリダイレクトしてexitしてください
