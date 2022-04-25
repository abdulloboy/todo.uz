<?php

namespace App\Controllers;

use App\View;

class LoginController
{
	public function login()
	{
		$view = new View('login/index');
		
		if (isset($_POST) && !empty($_POST)) {
			if ($_POST['login'] == 'admin' && $_POST['password'] == '123') {
				$_SESSION['admin'] = 'true';
				header("Location: /tasks/");
			} else {
				$view->assign('message', 'Неправильный логин или пароль');
			}
		}

		return $view;
	}

	public function logout()
	{
		session_destroy();
		header("Location: /tasks/");
	}
}
