<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");


get('/', 'index.php');

get('/register', 'views/register.php');
post('/register', 'backend/register_user.php');

get('/login', 'views/login.php');
post('/login', 'backend/login_user.php');

get('/test', 'views/usertest.php');

get('/files/$user/$item', 'backend/user.php');

any('/404','views/404.php');
