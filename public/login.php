<?php

require_once('../app/config.php');
LoginController::auth();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include('components/__head.php') ?>
    <title>Login</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h5 class="text-center">ログイン</h5>
                    <div class="card card-body">
                        <form action="?action=login" method="post">
                            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                            <div class="row form-group">
                                <div class="col-9">
                                    <label for="email">
                                        Eメールアドレス
                                    </label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="email" id="email">
                                    <p class="form-error-msg"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-9">
                                    <label for="password">
                                        パスワード
                                    </label>
                                </div>
                                <div class="col-9">
                                    <input type="password" name="password" id="password">
                                    <p class="form-error-msg"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-9 mt-5">
                                    <input type="submit" value="ログイン" class="btn btn-primary w-100" disabled>
                                    <p class="form-error-msg text-center mt-2">
                                        <?= $msg ?>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('components/__scripts.php') ?>
    <script src="js/login.js"></script>
</body>
</html>