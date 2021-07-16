<?php
////////////////////////////////
///  ホームコントローラー
///////////////////////////////

//設定を読み込み
include_once('../config.php');
// ユーザーデータ操作モデルを読み込み
include_once('../Models/users.php');
//  便利な関数呼び出し
include_once('../util.php');

// ログインしているか
$user = getUserSession();
        if(!$user){
            // ログインしていない
            header('Location:'.HOME_URL.'Controllers/sign-in.php');
            exit;
        }


// 画面表示
$view_user = $user;
// ツイート一覧
// TODO：あとでDBから取得
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' => 'taro',
        'user_nickname' => '太郎',
        'user_image_name' => 'my-profile-foto.jpeg',
        'tweet_body' => '今プログラミングをしています。',
        'tweet_image_name' => null,
        'tweet_created_at' => '2021-07-02 14:00:00',
        'like_id' => null,
        'like_count' => 0,
    ],
    [
        'user_id' => 2,
        'user_name' => 'jiro',
        'user_nickname' => '次郎',
        'user_image_name' => null,
        'tweet_body' => 'コワーキングスペースをオープンしました！',
        'tweet_image_name' => 'sample-post.jpg',
        'tweet_created_at' => '2021-03-14 14:00:00',
        'like_id' => 1,
        'like_count' => 1,
    ],
];    

include_once ('../Views/home.php');