<?php
////////////////////////////////
///  サインアウトコントローラー
///////////////////////////////

//設定を読み込み
include_once('../config.php');
// ユーザーデータ操作モデルを読み込み
include_once('../Models/users.php');
//  便利な関数呼び出し
include_once('../util.php');

// ユーザー情報をセッションから削除
deleteUserSession();

// ログイン画面に遷移
header('Location:'.HOME_URL.'Controllers/sign-in.php');
exit;
