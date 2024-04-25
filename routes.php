<?php


$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/delete.php');
$router->patch('/note', 'notes/update.php');

$router->get('/note/edit', 'notes/edit.php');

$router->get('/signup', 'auth/signup.php')->only('guest');
$router->post('/signup', 'auth/store.php');

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');

$router->delete('/logout', 'sessions/destroy.php')->only('auth');
