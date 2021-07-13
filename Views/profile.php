<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/TwitterClone/Views/img/logo-twitterblue.svg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/TwitterClone/Views/css/style.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>  
    <!-- いいね！JS -->
    <script src="/TwitterClone/Views/js/like.js" defer></script>

    <title>プロフィール画面 / Twitterクローン</title>
    <meta name="description" content="Twitterクローンのプロフィール画面です">
</head>

<body class="home profile text-center">
   <div class="container">
        <div class="side">
        <div class="side-inner">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="home.php" class="nav-link"><img src="/TwitterClone/Views/img/logo-twitterblue.svg" alt="テックアイエスアイコン" class="icon"></a></li>
                <li class="nav-item"><a href="home.php" class="nav-link"><img src="/TwitterClone/Views/img/icon-home.svg" alt="プロフィールボタンアイコン"></a></li>
                <li class="nav-item"><a href="serch.php" class="nav-link"><img src="/TwitterClone/Views/img/icon-search.svg" alt="虫めがねアイコン"></a></li>
                <li class="nav-item"><a href="notification.php" class="nav-link"><img src="/TwitterClone/Views/img/icon-notification.svg" alt="ベルマークアイコン"></a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><img src="/TwitterClone/Views/img/icon-profile.svg" alt="プロフィールアイコン"></a></li>
                <li class="nav-item"><a href="post.php" class="nav-link"><img src="/TwitterClone/Views/img/icon-post-tweet-twitterblue.svg" alt="ツイッター書き込みアイコン" class="post-tweet"></a></li>
                <li class="nav-item my-icon"><img src="/TwitterClone/Views/img_uploaded/user/my-profile-foto.jpeg" alt="プロフィール画像" class="js-popover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>" data-bs-html="true"></li>
            </ul>
        </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>エネオス</h1>
            </div>
            <!-- プロフィールエリア -->
            <div class="profile-area">
                <!-- ユーザーのプロフィール画像とプロフィール編集ボタン -->
                <div class="top">
                    <div class="user"><img src="/TwitterClone/Views/img_uploaded/user/my-profile-foto.jpeg" alt="プロフィール画像"></div>

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

            <!-- TODO：ツイート一覧   後日実装 -->

        </div>
   </div>
   <script>
        document.addEventListener('DOMContentLoaded',function(){
            // alert('called!');
            // $('.js-popover') ＝ document.getElementsByClassName('js-poppover') ・・・？

            $('.js-popover').popover({
                container: 'body'
            })
        },false);
   </script>
</body>
</html>