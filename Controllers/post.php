<?php
////////////////////////////////
///  ポストコントローラー
///////////////////////////////

//設定を読み込み
include_once('../config.php');
// ツイートデータ操作モデルを読み込み
include_once('../Models/tweets.php');
//  便利な関数呼び出し
include_once('../util.php');

// ログインしているか
$user = getUserSession();
if(!$user){
    // ログインしていない
    header('Location:'.HOME_URL.'Controllers/sign-in.php');
    exit;
}

//  ツイートがある場合
if(isset($_POST['body'])){
    $image_name = null;
    if(isset($_FILES['image'])  && is_uploaded_file($_FILES['image']['tmp_name'])){   //is_uploaded_file関数はファイルがPOSTによって送信されたものかを調べる
        $image_name = uploadImage($user,$_FILES['image'],'tweet'); //TODO:アップロードされたファイルを保存する関数
    }

    // $dataに投稿情報を代入
    $data = [
        'user_id' => $user['id'],
        'body' => $_POST['body'],
        'image_name' => $image_name
    ];

    // ツイートを投稿
    if(createTweet($data)){
        // ホーム画面に遷移
        header('Location:'.HOME_URL.'Controllers/home.php');
        exit;
    }
}

//  画面表示
$view_user = $user;
include_once('../Views/post.php');
