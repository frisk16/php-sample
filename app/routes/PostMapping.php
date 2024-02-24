<?php

class PostMapping
{
    public static function action()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            Csrf::validate();

            switch($_SERVER['REQUEST_URI']) {
    
                case '/php-sample/public/?comments=add':
                    CommentController::add();
                    break;

                case '/php-sample/public/login.php?action=login':
                    $msg = LoginController::login();
                    return $msg;
                    break;

                default:
                    if ($_GET['action'] === 'logout') {
                        LoginController::logout();
                    } else {
                        header('Location:'.TOP_URL.'error.php');
                    }
                    
            }

           

        }
    }
}