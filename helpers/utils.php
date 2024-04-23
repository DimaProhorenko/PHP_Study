<?php
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($file_name)
{
    return base_path("views/{$file_name}");
}

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
    require view("{$code}.php");
    die();
}


function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }

    return true;
}
