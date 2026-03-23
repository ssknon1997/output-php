CREATE DATABASE bbs; -- bbsという名前のデータベースを作成 --

USE bbs; -- bbsテーブルを使用する --

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, --idカラム作成　整数　自動で番号振り分け　このテーブルで唯一のキー --
    name VARCHAR(50), --決まった文字数まで入れれる --
    email VARCHAR(100) UNIQUE, --決まった文字数まで入れれる　重複禁止 --
    password VARCHAR(255), --決まった文字数まで入れれる　パスワードハッシュで長くなる可能性があるので文字数制限多め --
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP --タイムスタンプ　現在の時間をいれる --
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY, --idカラム作成　整数　自動で番号振り分け　このテーブルで唯一のキー --
    user_id INT, --決まった文字数まで入れれる --
    content TEXT, --長い文章を入れれる --
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, --タイムスタンプ　現在の時間をいれる --
    FOREIGN KEY (user_id) REFERENCES users(id) --usersテーブルに存在しないidを紐づけできないようにする -- 
);

CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    post_id INT NOT NULL,

    UNIQUE(user_id,post_id) --user_id と post_id の組み合わせが同じ行を禁止する --

);
