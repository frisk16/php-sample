<?php

class Csrf
{
    public static function token()
    {
        if(!isset($_SESSION['token']) || empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
    }

    public static function validate()
    {
        if($_SESSION['token'] !== $_POST['token'] || !isset($_SESSION['token'])) {
            exit(header('Location:'.TOP_URL.'error.php'));
        }
    }
}