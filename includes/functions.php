<?php
// session_startを呼んでください
session_start();

// h()関数を作成してください
// 引数：$value（文字列）、戻り値：string
// htmlspecialcharsでENT_QUOTESを指定してXSS対策した文字列を返してください
function h($value) : string
{
    return htmlspecialchars($value, ENT_QUOTES);
}

// requireLogin()関数を作成してください
// 戻り値の型はvoidです
// $_SESSION['user']がなければredirect()でlogin.phpに飛ばしてください
function requireLogin() : void
{
    if(isset($_SESSION['user'])) {
        redirect('login.php');
    }
}
// generateCsrfToken()関数を作成してください
// 戻り値の型はstringです
// bin2hexとrandom_bytesで32バイトのトークンを生成してください
// $_SESSION['csrf_token']に保存してトークンを返してください
function generateCsrfToken() :string
{
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
}
// verifyCsrfToken()関数を作成してください
// 戻り値の型はvoidです
// $_POST['csrf_token']をnull合体演算子で取得してください
// $_SESSION['csrf_token']が存在しない、またはhash_equalsで一致しない場合
// redirect()でindex.phpに飛ばしてください
function verifyCsrfToken() :void
{
    if(!$_POST['csrf_token'] && !hash_equls($_SESSION['csrf_token'], $_POST['csrf_token'] )) {
        redirect('index.php');
    } 
}
// getPostInt()関数を作成してください
// 引数：$key（string）、戻り値：int
// filter_inputでINPUT_POSTからFILTER_VALIDATE_INTで整数取得してください
// falseまたはnullならredirect()でindex.phpに飛ばしてください
function getPostInt(string $key) : int
{
    filter_input(INPUT_POST, $key, FILTER_VALIDATE_INT);

    if($key == 'null') {
        redirect('index.php');
    }
}
// redirect()関数を作成してください
// 引数：$url（string）、戻り値：never
// headerでLocationを指定してexitしてください
function redirect(string $url) :never
{
    header('Location: index.php');
    exit();
}