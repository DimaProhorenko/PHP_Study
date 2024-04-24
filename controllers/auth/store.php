<?php
require_once base_path('core/Validator.php');
$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Incorrect email';
}

if (!Validator::password($password)) {
    $errors['password'] = 'Password must be in range 6 - 16 characters';
}


if (!count($errors)) {
    $db = App::resolve('Core/DB');
    $user_in_db = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();
    if (!$user) {
        // Save to db
    }
}
