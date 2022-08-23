<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");


get('/', 'index.php');
get('/logout', 'logout.php');
get('/register', 'views/register.php');
post('/register', 'backend/register_user.php');

get('/login', 'views/login.php');
post('/login', 'backend/login_user.php');

get('/test', 'views/usertest.php');

get('/folders/$user', 'views/folders.php');
post('/upload', 'backend/upload.php');
get('/delete/$user/$id', 'backend/deletefiles.php');
get('/view/$user/$id', 'views/viewfile.php');

any('/404','views/404.php');
