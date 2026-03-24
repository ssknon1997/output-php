<?php
// session_startを呼んでください

// ../config/db.phpをrequire_onceで読み込んでください

// $_SESSION['user']が存在しない場合、../index.phpにリダイレクトしてexitしてください

// filter_inputでINPUT_POSTからpost_idをFILTER_VALIDATE_INTで取得して$post_idに入れてください

// $_SESSION['user']['id']を$user_idに入れてください

// $post_idが取得できなかった場合、../index.phpにリダイレクトしてexitしてください

// likesテーブルからuser_idとpost_idが一致するレコードを取得するSQLを書いてください
// プリペアドステートメントを使ってください

// fetchで結果が取得できた場合（すでにいいね済み）
    // likesテーブルからuser_idとpost_idが一致するレコードをDELETEしてください
    // プリペアドステートメントを使ってください

// 取得できなかった場合（まだいいねしていない）
    // likesテーブルにuser_idとpost_idをINSERTしてください
    // プリペアドステートメントを使ってください

// ../index.phpにリダイレクトしてexitしてください
