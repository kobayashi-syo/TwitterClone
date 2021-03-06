<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('common/head.php') ?> 
    <title>ログイン画面 / Twitterクローン</title>
    <meta name="description" content="Twitterクローンのログイン画面です">
</head>

<!-- ログイン画面 -->
<body class="signup text-center">
    <main class="form-signup">
        <form action="sign-in.php" method="post">  <!-- 特別な理由がなければメソッドにはpostを使用 -->
            <img src="<?php echo HOME_URL; ?>Views/img/logo-white.svg" alt="" class="logo-white">
            <h1>Twitterクローンにログイン</h1>

            <?php if(isset($view_try_login_result) and $view_try_login_result === false):?>
                <!-- ログインに失敗した場合 -->
                <div class="alert alert-warning text-sm" fole="alert">
                    ログインに失敗しました。メールアドレス・パスワードが正しいかご確認ください。
                </div>
            <?php endif; ?>

            <input type="email" class="form-control" name="email" placeholder="メールアドレス" required autofocus>
            <input type="password" class="form-control" name="password" placeholder="パスワード" required>
            <button class="w-100 btn btn-lg" type="submit">ログイン</button>
            <p class="mt-3 mb-2"><a href="sign-up.php">会員登録する</a></p>
            <p class="mt-2 mb-3 text-muted">&copy;2021</p>
        </form>
    </main>
    <?php include_once('common/foot.php'); ?>
</body>

</html>