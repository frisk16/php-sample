<?php

class LoginController
{
    public static function auth()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'login.php') !== false) {
            if (isset($_SESSION['user'])) {
                header('Location:'.TOP_URL);
            }
        } else {
            if (!isset($_SESSION['user'])) {
                header('Location:'.TOP_URL.'login.php');
            }
        }
    }

    public static function login()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = PDO_DATA->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindValue('email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $record = $stmt->fetch();

            if (empty($record)) {
                return 'そのEメールアドレスは存在しません';
            } else {
                if (password_verify($password, $record->password)) {
                    if (!isset($_SESSION['user'])) {
                        $_SESSION['user'] = [
                            'email' => $email,
                            'login_at' => date('Y/m/d H:i:s'),
                        ];
                    }
                } else {
                    return 'パスワードが違います';
                }
            }

        }
    }

    public static function logout()
    {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }
}