<?php

namespace App;

use App\Controllers\TaskController;
use App\Controllers\LoginController;

Router::route('.*/login?.*', array(new LoginController,'login'));

Router::route('.*/logout?.*', array(new LoginController,'logout'));

Router::route('.*/add?.*', array(new TaskController,'add'));

Router::route('.*/edit/(\d+)', array(new TaskController,'edit'));

Router::route('.*/?.*', array(new TaskController,'index'));

// запускаем маршрутизатор, передавая ему запрошенный адрес
Router::execute($_SERVER['REQUEST_URI']);
