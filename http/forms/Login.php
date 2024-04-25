<?php

class Login
{
    private $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Incorrect email';
        }

        if (!Validator::password($password)) {
            $this->errors['password'] = 'Password must be in range 6 - 16 characters';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
