<?php

namespace App\Controllers;

use App\Models\Task;
use App\View;

class TaskController
{
    public function index()
    {
        $view = new View('tasks/index');
        $task = new Task();
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $desc = '';
        $sort = 'username';
        if (isset($_GET['sort'])) {
            $pos = strpos($_GET['sort'], '_desc');
            if ($pos === false) {
                $sort = $_GET['sort'];
            } else {
                $sort = substr($_GET['sort'], 0, -5);
                $desc = "DESC";
            }
        }
        $tasks = $task->get($page, $sort, $desc);
        $view->assign('tasks', $tasks);
        $view->assign('numberOfPages', ceil($task->count() / 3));
        $view->assign('page', $page);
        if (isset($_SESSION['message'])) {
            $view->assign('message', $_SESSION['message']);
            unset($_SESSION['message']);
        }

        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            $view->assign('admin', true);
        } else {
            $view->assign('admin', false);
        }

        return $view;
    }

    public function add()
    {
        if (isset($_POST) && !empty($_POST)) {
            $validated = $this->validate($_POST);
            if (Task::addTask($validated)) {
                $_SESSION['message'] = "Задача успешно создана.";
            } else {
                $_SESSION['message'] = "Ошибка при создании задачи.";
            }
            header("Location: /tasks/");
        }
        $view = new View('tasks/add');
    }

    public function edit($id)
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $task = new Task();
            if (isset($_POST) && !empty($_POST)) {
                $validated = $this->validate($_POST);
                $task->updateTask($validated);
                $_SESSION['message'] = "Таск редактирована.";
                header("Location: /tasks/");
            }

            $view = new View('tasks/edit');
            $view->assign('task', $task->find($id));
            return $view;
        } else {
            header("Location: /login");
        }
    }

    public function validate($post)
    {
        $posts['id'] = self::test_input($post['id']);
        $posts['username'] = self::test_input($post['username']);
        $posts['email'] = self::test_input($post['email']);
        $posts['text'] = self::test_input($post['text']);
        if (isset($post['status'])) {
            $posts['status'] = self::test_input($post['status']);
        } else {
            $posts['status'] = 0;
        }
        return $posts;
    }

    public static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
