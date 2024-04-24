<?php
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/notes/create' => 'controllers/notes/create.php',
//     '/note' => 'controllers/notes/show.php',
//     '/contact' => 'controllers/contact.php',
// ];


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/delete.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/note/edit', 'controllers/notes/edit.php');

$router->get('/signup', 'controllers/auth/signup.php');
$router->post('/signup', 'controllers/auth/store.php');

$router->get('/login', 'controllers/auth/login.php');
