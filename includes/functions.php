<?php
// session_startを呼んでください


// h()関数を作成してください
// 引数：$value（文字列）、戻り値：string
// htmlspecialcharsでENT_QUOTESを指定してXSS対策した文字列を返してください


// requireLogin()関数を作成してください
// 戻り値の型はvoidです
// $_SESSION['user']がなければredirect()でlogin.phpに飛ばしてください


// generateCsrfToken()関数を作成してください
// 戻り値の型はstringです
// bin2hexとrandom_bytesで32バイトのトークンを生成してください
// $_SESSION['csrf_token']に保存してトークンを返してください


// verifyCsrfToken()関数を作成してください
// 戻り値の型はvoidです
// $_POST['csrf_token']をnull合体演算子で取得してください
// $_SESSION['csrf_token']が存在しない、またはhash_equalsで一致しない場合
// redirect()でindex.phpに飛ばしてください


// getPostInt()関数を作成してください
// 引数：$key（string）、戻り値：int
// filter_inputでINPUT_POSTからFILTER_VALIDATE_INTで整数取得してください
// falseまたはnullならredirect()でindex.phpに飛ばしてください


// redirect()関数を作成してください
// 引数：$url（string）、戻り値：never
// headerでLocationを指定してexitしてください
