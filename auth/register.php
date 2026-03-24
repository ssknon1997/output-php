<?php
// session_startを呼んでください

// ../config/db.phpをrequire_onceで読み込んでください
// ../includes/function.phpをrequire_onceで読み込んでください

// generateCsrfToken()でトークンを生成して$tokenに入れてください

// $_SERVER["REQUEST_METHOD"]がPOSTの場合だけ以下の処理をしてください

    // verifyCsrfToken()でCSRFトークンを検証してください

    // $_POST["name"]を$nameに入れてください

    // $_POST["email"]を$emailに入れてください

    // $_POST["password"]をpassword_hashでハッシュ化して$passwordに入れてください
    // PASSWORD_DEFAULTを使ってください

    // usersテーブルにname、email、passwordをINSERTするSQLを書いてください
    // プリペアドステートメントを使ってください

    // login.phpにリダイレクトしてexitしてください

?>

<!-- h2タグで「新規登録」と表示してください -->

<!-- POSTで送信するformタグを書いてください -->

    <!-- CSRFトークンをhiddenで埋め込んでください -->

    <!-- text型のinputを書いてください（name属性はname、placeholder「名前」） -->

    <!-- email型のinputを書いてください（name属性はemail、placeholder「メール」） -->

    <!-- password型のinputを書いてください（name属性はpassword、placeholder「パスワード」） -->

    <!-- 登録ボタンを書いてください -->

<!-- formタグを閉じてください -->
