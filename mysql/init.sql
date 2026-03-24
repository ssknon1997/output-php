-- bbsという名前のデータベースを作成してください
CREATE DATABASE bbs;
-- bbsデータベースを使用する宣言を書いてください
use bbs;
-- usersテーブルを作成してください
-- カラム：id（整数・自動採番・主キー）、name（50文字まで）、email（100文字まで・重複禁止）
-- password（255文字まで）、created_at（現在日時をデフォルト値にするタイムスタンプ）
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- postsテーブルを作成してください
-- カラム：id（整数・自動採番・主キー）、user_id（整数）、content（長文テキスト）
-- image（255文字まで）、created_at（現在日時をデフォルト値にするタイムスタンプ）
-- user_idはusersテーブルのidと外部キーで紐づけてください
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT ,
    content TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- likesテーブルを作成してください
-- カラム：id（整数・自動採番・主キー）、user_id（整数・NOT NULL）、post_id（整数・NOT NULL）
-- user_idとpost_idの組み合わせが重複しないようにUNIQUE制約をつけてください
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    UNIQUE(user_id, post_id)
)