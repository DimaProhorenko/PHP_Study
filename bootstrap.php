<?php

$container = new Container();


$container->bind('Core/DB', function () {
    $config = require base_path('config.php');
    return new DB($config['database'], 'root', 'qwerty');
});

$db = $container->resolve('Core/DB');


App::set_container($container);
