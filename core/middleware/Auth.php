<?php

class Auth
{

    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}
