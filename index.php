<?php
// session_startを呼んでください

// config/db.phpをrequire_onceで読み込んでください
// includes/function.phpをrequire_onceで読み込んでください
// header.phpをrequire_onceで読み込んでください

// generateCsrfToken()でトークンを生成して$tokenに入れてください

// $_SESSION['user']が存在する場合だけ以下の処理を行ってください

    // $limitに1ページの表示件数5を入れてください

    // $_GET["page"]が存在すれば$pageに入れ、なければ1を入れてください
    // （三項演算子を使ってください）

    // $offsetを計算してください（何件目からデータを取るか）

    // postsの全カラム、usersのname、likesのいいね数（like_countとして）を取得するSQLを書いてください
    // postsとusersをJOINしてください（posts.user_id = users.id）
    // postsとlikesをLEFT JOINしてください（posts.id = likes.post_id）
    // GROUP BY posts.idでまとめてください
    // ORDER BY posts.created_atの降順にしてください
    // LIMITとOFFSETでページネーションしてください（プリペアドステートメントを使ってください）

    // SQLを実行して結果を$postsに入れてください
?>

<!-- h2タグで「投稿」と表示してください -->

<!-- $_SESSION['user']が存在する場合だけフォームを表示してください -->
    <!-- post/create.phpにPOSTで送るformタグを書いてください -->
    <!-- enctype="multipart/form-data"をつけてください（画像送信のため） -->

        <!-- CSRFトークンをhiddenで埋め込んでください -->

        <!-- contentという名前のtextareaを書いてください -->

        <!-- imageという名前のfile inputを書いてください -->

        <!-- 送信ボタンを書いてください -->

    <!-- formタグを閉じてください -->
<!-- endif -->

<!-- h2タグで「投稿一覧」と表示してください -->

<!-- foreachで$postsを$postとして1件ずつ取り出してください -->

    <!-- divタグで囲んでください -->

        <!-- h()でXSS対策しながら投稿者名を表示してください -->

        <!-- h()でXSS対策しながら投稿内容を表示してください -->

        <!-- $post['image']が存在する場合だけimgタグで画像を表示してください -->
        <!-- src="uploads/画像ファイル名"、width="200"にしてください -->

        <!-- h()でXSS対策しながら作成日時を表示してください -->

        <!-- $_SESSION['user']が存在しかつログインユーザーと投稿者が一致する場合だけ
             post/delete.phpへの削除リンクを表示してください
             URLに?id=投稿IDをつけてください -->

        <!-- post/like.phpにPOSTで送るformタグを書いてください -->
            <!-- post_idをhiddenで埋め込んでください -->
            <!-- いいねボタンを書いてください -->
        <!-- formタグを閉じてください -->

        <!-- いいね数を表示してください -->

    <!-- divタグを閉じてください -->

    <!-- hrタグで区切り線を引いてください -->

<!-- endforeachを書いてください -->

<?php
// postsテーブルの総件数をCOUNT(*)で取得して$totalに入れてください

// $total_pageを計算してください（ceil()で切り上げてください）

// forループでページ番号リンクを表示してください
// <a href='?page=ページ番号'>ページ番号</a>の形式で出力してください
?>

<!-- $_SESSION['user']のendifを書いてください -->
