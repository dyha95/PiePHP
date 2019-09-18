<?php
use Core\Router; 

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user', ['controller' => 'user', 'action' => 'index']);
Router::connect('/user/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/user/register', ['controller' => 'user', 'action' => 'register']);
Router::connect('/user/read', ['controller' => 'user', 'action' => 'reader']);
Router::connect('/user/profil', ['controller' => 'user', 'action' => 'profil']);
Router::connect('/user/update', ['controller' => 'user', 'action' => 'updateProfil']);
Router::connect('/user/delete', ['controller' => 'user', 'action' => 'deleteProfil']);
Router::connect('/user/deconnect', ['controller' => 'user', 'action' => 'deconnect']);

