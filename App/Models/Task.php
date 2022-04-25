<?php

namespace App\Models;

use App\Database;

class Task extends Database
{
    public function get($page = 1, $sort = 'username', $desc = '')
    {
        switch (strtolower($sort)) {
            case "username":
                $sort = "username";
                break;
            case "email":
                $sort = "email";
                break;
            case "status":
                $sort = "status";
                break;
            default:
                $sort = "username";
        }
        $sql        = "SELECT * FROM tasks ORDER BY " . $sort . ' ' . $desc .
            " LIMIT 3 OFFSET " . (($page - 1) * 3);
        $sth        = self::db()->prepare($sql);
        $is_success = $sth->execute();
        if ($is_success) {
            $tasks = [];
            while ($row = $sth->fetch()) {
                $tasks[] = $row;
            }
            return $tasks;
        }
        return null;
    }

    public function find($id)
    {
        $sql        = "SELECT * FROM tasks WHERE id=:task_id";
        $sth        = self::db()->prepare($sql);
        $is_success = $sth->execute(array('task_id' => $id));
        if ($is_success) {
            return $sth->fetch();
        }
        return null;
    }

    public static function addTask($post)
    {
        $sql        = "INSERT INTO Tasks (username, email, text) VALUES (:username, :email, :text)";
        $sth        = self::db()->prepare($sql);
        $is_success = $sth->execute(array('username' => $post['username'], 'email' => $post['email'], 'text' => $post['text']));
        if ($is_success) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTask($post)
    {
        $sql        = "UPDATE Tasks SET username=:username, email=:email, text=:text,status=:status,edited=1 WHERE id=:id";
        $sth        = self::db()->prepare($sql);
        $is_success = $sth->execute(array(
            'id' => $post['id'],
            'username' => $post['username'],
            'email' => $post['email'],
            'text' => $post['text'],
            'status' => $post['status']
        ));
        if ($is_success) {
            return true;
        } else {
            return false;
        }
    }

    public function count()
    {
        $sql        = "SELECT COUNT(*) as count FROM tasks";
        $sth        = self::db()->prepare($sql);
        $is_success = $sth->execute();
        if ($is_success) {
            $row = $sth->fetch();
            return $row['count'];
        }
        return null;
    }
}
