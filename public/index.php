<?php

require_once('../app/config.php');
LoginController::auth();

$comments = CommentController::get();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include('components/__head.php') ?>
    <title>PHP TEST</title>
</head>
<body>
    <main>

        <div id="logout-btn">
            <form action="?action=logout" method="post">
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                <button type="submit" class="btn btn-danger">ログアウト</button>
            </form>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h5>入力フォーム</h5>
                    <div class="card card-body">

                        <form action="?comments=add" method="post">
                            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                            <div class="row form-group">
                                <div class="col-lg-3">
                                    <label for="name">名前</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" name="name" id="name" placeholder="10文字以内（任意）">
                                    <p class="form-error-msg"></p>
                                </div>  
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-3">
                                    <label for="comment">コメント</label>
                                    <span>必須</span>
                                </div>
                                <div class="col-lg-7">
                                    <textarea name="comment" id="comment" placeholder="10文字以上、255文字以内"></textarea>
                                    <p class="form-error-msg"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-10">
                                    <input type="submit" value="投稿" class="btn btn-primary w-100" disabled>
                                </div>
                            </div>
                        </form>

                    </div>
                    <hr>
                    <h5>コメント</h5>

                    <?php foreach($comments as $comment): ?>
                    
                        <div class="comment-card">
                            <p class="comment-name">
                                <?= $comment->name ?>
                            </p>
                            <p class="comment-area">
                                <?= nl2br($comment->comment) ?>
                            </p>
                            <span class="comment-time">
                                <span>投稿時刻：</span>
                                <?= $comment->created_at ?>
                            </span>
                        </div>

                    <?php endforeach ?>

                </div>
            </div>
            
        </div>
    </main>
    
    <?php include('components/__scripts.php') ?>
    <script src="js/script.js"></script>
</body>
</html>