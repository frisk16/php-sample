<?php

class CommentController
{
    public static function get()
    { 
        $sql = 'SELECT * FROM comments ORDER BY created_at DESC';
        $stmt = PDO_DATA->query($sql);

        return $stmt->fetchAll();
    }

    public static function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['name'])) {
                $name = '名無しさん';
            } else {
                $name = $_POST['name'];
            }
            $comment = $_POST['comment'];
            $sql = 'INSERT INTO comments(name, comment) VALUES(:name, :comment)';

            $stmt = PDO_DATA->prepare($sql);
            $stmt->bindValue('name', $name, PDO::PARAM_STR);
            $stmt->bindValue('comment', $comment, PDO::PARAM_STR);
            $stmt->execute();
        }

        header('Location:'.TOP_URL);
    }
}