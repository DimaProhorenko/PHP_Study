<?php


$db = App::resolve('Core/DB');
$user = $db->query('SELECT * from users WHERE email = :email', ['email' => $_POST['email']])->fetch();

if (!$user) {
    throw new Exception('No users found');
}

if (password_verify($_POST['password'], $user['password'])) {
    login($user);
    header('location: /');
    exit();
}
