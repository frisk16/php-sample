<?php

class Sql
{
    public static function pdo()
    {
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $pass = '';

        try {

            $pdo = new PDO(
                $dsn, $user, $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );

            return $pdo;

        } catch(PDOException $e) {

            exit ($e->getMessage());

        }

    }
}