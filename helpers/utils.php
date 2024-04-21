<?php
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre';
    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::PAGE_NOT_FOUND)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}


function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}
