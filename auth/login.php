<?php
// session_startを呼んでください

// ../config/db.phpをrequire_onceで読み込んでください

// $_SERVER["REQUEST_METHOD"]がPOSTの場合だけ以下の処理をしてください

    // filter_inputでINPUT_POSTからemailを取得して$emailに入れてください

    // filter_inputでINPUT_POSTからpasswordを取得して$passwordに入れてください

    // usersテーブルからemailが一致するレコードを取得するSQLを書いてください
    // プリペアドステートメントを使ってください
    // 結果を$userに入れてください（fetch・連想配列で取得）

    // $userが存在し、かつpassword_verifyでパスワードが一致する場合
        // $_SESSION['user']に$userを入れてください
        // session_regenerate_idでセッションIDを再生成してください（固定化攻撃対策）
        // ../index.phpにリダイレクトしてexitしてください

    // 一致しない場合
        // 「ログイン失敗」と表示してください

?>

<!-- h2タグで「ログイン」と表示してください -->

<!-- POSTで送信するformタグを書いてください -->

    <!-- email型のinputを書いてください -->

    <!-- password型のinputを書いてください -->

    <!-- ログインボタンを書いてください -->

<!-- formタグを閉じてください -->
