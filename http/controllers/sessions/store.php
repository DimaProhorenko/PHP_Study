<?php
require_once base_path('core/Validator.php');
require_once base_path('http/forms/Login.php');

$email = $_POST['email'];
$password = $_POST['password'];

$form = new Login();

if (!$form->validate($email, $password)) {
    // Store errors in cookies
    // Redirect
}

$auth = new Authenticator();
if ($auth->attempt($email, $password)) {
    redirect('/');
}

dd($auth);

// $db = App::resolve('Core/DB');
// $user = $db->query('SELECT * from users WHERE email = :email', ['email' => $_POST['email']])->fetch();

// if (!$user) {
//     throw new Exception('No users found');
// }

// if (password_verify($_POST['password'], $user['password'])) {
//     login($user);
//     header('location: /');
//     exit();
// }
