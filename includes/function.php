<?php

session_start();

function h($value) : string
{
    return htmlspecialchars($value, ENT_QUOTES);
}

function requireLogin() 
{
    if (!isset($_SESSION['user'])) {
        redirect('../auth/login.php');
    }
}

function generateCsrfToken(): string
{
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    return $token;
}

function verifyCsrfToken(): void
{
    $token = $_POST['csrf_token'] ?? '';

    // hash_equalsはタイミング攻撃を防ぐための比較関数
    // == や === で比較しないこと
    if (!isset($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $token)) {
        redirect('../index.php');
    }
}

function getPostInt(string $key): int
{
    $value = filter_input(INPUT_POST, $key, FILTER_VALIDATE_INT);
    if ($value === false || $value === null) {
        redirect('../index.php');
    }
    return $value;
}

function redirect(string $url): never
{
    header("Location: $url");
    exit;
}