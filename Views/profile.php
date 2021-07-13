<?php
// 設定関連を読み込む
include_once('../config.php');
// 便利な関数を読み込む
include_once('../util.php');

///////////////////////////////////
////   ツイート一覧
///////////////////////////////////
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
];    

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once('common/head.php') ?>
    <title>プロフィール画面 / Twitterクローン</title>
    <meta name="description" content="Twitterクローンのプロフィール画面です">
</head>

<body class="home profile text-center">
   <div class="container">
        <?php include_once('common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>エネオス</h1>
            </div>
            <!-- プロフィールエリア -->
            <div class="profile-area">
                <!-- ユーザーのプロフィール画像とプロフィール編集ボタン -->
                <div class="top">
                    <div class="user"><img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/my-profile-foto.jpeg" alt="プロフィール画像"></div>

                    <?php if(isset($_GET['user_id'])): ?>
                        <!-- 他人のプロフィール -->
                        <?php if(isset($_GET['case'])): ?>
                            <button class="btn btn-sm">フォローを外す</button>
                        <?php else: ?>
                            <button class="btn btn-sm btn-reverse">フォローする</button>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- 自分のプロフィール -->
                        <button class="btn btn-reverse btn-sm js-model-button" type="submit" data-bs-toggle="modal" data-bs-target="#js-modal">プロフィール編集</button>

                        <div class="modal fade" id="js-modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="profile.php" method="post" enctype="multipart/form-data">
                                        <!-- モーダルヘッダー -->
                                        <div class="modal-header">
                                            <h5 class="modal-title">プロフィールを編集</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>                                      
                                        </div>
                                        <!-- モーダルボディー -->
                                        <div class="modal-body">
                                            <div class="user">
                                                <img src="/TwitterClone/Views/img_uploaded/user/my-profile-foto.jpeg" alt="プロフィール画像">
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-1">プロフィール写真</label>
                                                <input type="file" class="form-control form-control-sm" name="image">
                                            </div>

                                            <label class="mb-1">ニックネーム</label>
                                            <input type="text" class="mb-4 form-control" name="nickname" maxlength="50" value="エネオス" placeholder="ニックネームを入力してください" required>
                                            <label class="mb-1">ユーザー名</label>
                                            <input type="text" class="mb-4 form-control" name="name" maxlength="50" value="eneos" placeholder="ユーザー名を入力してください" required>
                                            <label class="mb-1">メールアドレス</label>
                                            <input type="email" class="mb-4 form-control" name="email" maxlength="254" value="eneos@techis.jp" placeholder="メールアドレスを入力してください" required>
                                            <label class="mb-1">パスワード</label>
                                            <input type="password" class="mb-4 form-control" name="password" minlength="4" maxlength="128" value="" placeholder="パスワードを変更する場合ご入力ください">
                                        </div>
                                        <!-- モーダルフッター -->
                                        <div class="modal-footer">
                                            <button class="btn btn-reverse" data-bs-dismiss="modal">キャンセル</button>
                                            <button class="btn" type="submit">保存する</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ユーザーのニックネームと名前 -->
                <div class="name">エネオス</div>
                <div class="text-muted">@eneos</div>

                <!-- フォロー中 / フォロワーのエリア -->
                <div class="follow-follower">
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロー中</div>
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロワー</div>
                </div>
            </div>

            <div class="ditch"></div>

            <!-- ツイート一覧 -->
            <?php if(empty($view_tweets)): ?>
                <p class="p-3">ツイートがまだありません</p>
            <?php else: ?>
            <div class="tweet-list">
                <?php foreach ($view_tweets as $view_tweet): ?>
                   <?php include('common/tweet.php'); ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

        </div>
   </div>
   <?php include_once('common/foot.php'); ?>
</body>
</html>