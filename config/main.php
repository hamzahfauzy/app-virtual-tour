<?php

$menu = require '../config/menu.php';
$icon_menu = require '../config/icon_menu.php';

return [
    'base_url' => 'http://localhost:8080',
    'default_page' => 'default/index',
    'database' => [
        'driver'   => 'PDO',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'virtualtour_db', // 'notif-sql-1',
        'port' => NULL,
        'socket' => NULL
    ],
    'auth' => 'session', //JWT or Session
    'jwt_secret' => '',
    'jwt_cookie_name' => '',
    'app_domain_name' => '',
    'menu' => [
        'menu' => $menu,
        'icon' => $icon_menu
    ]
];