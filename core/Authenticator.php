<?php

class Authenticator
{

    private function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    }

    private function logout()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
    }


    public function attempt($email, $password)
    {
        $db = App::resolve('Core/DB');
        $user = $db->query('SELECT * from users WHERE email = :email', ['email' => $email])->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }
        return false;
    }
}
