<?php

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
}
