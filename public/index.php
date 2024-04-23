<?php
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'helpers/utils.php';
require base_path('core/Database.php');
require base_path('core/Response.php');
require base_path('core/Router.php');

$router = new Router();
require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
