<?php
require_once base_path('core/Validator.php');
require_once base_path('http/forms/Login.php');

$email = $_POST['email'];
$password = $_POST['password'];

$form = new Login();

if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    $form->addError('email', 'No matching account found');
}

Session::flash('errors', $form->errors());
redirect('/login');
