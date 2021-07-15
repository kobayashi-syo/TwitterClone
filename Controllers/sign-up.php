<?php
//////////////////////////////////
/////  サインアップコントローラー
//////////////////////////////////

//設定を読み込み
include_once('../config.php');
// ユーザーデータ操作モデルを読み込み
include_once('../Models/users.php');

//ユーザー作成
// 今回は $_POST を使っているが、filter_input() という関数を使ってもいける。
if(isset($_POST['nickname']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $data = [
        'nickname' => $_POST['nickname'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    if(createUser($data)){
        header('Location:'.HOME_URL.'Controllers/sign-in.php');
        exit;
    }
}

//  画面表示
include_once '../Views/sign-up.php';