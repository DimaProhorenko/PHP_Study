<?php
require_once base_path('core/Validator.php');


$heading = 'New Note';
$config = require base_path('config.php');
$db = new DB($config['database'], 'root', 'qwerty');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!Validator::string($_POST['title'], 1, 255)) {
        $errors['title'] = 'Title must be in range 1 - 255 characters';
    }

    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'The note body must be in range 1 - 1_000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(title, body, creator_id) VALUES(:title, :body, :creator_id)', [
            'title' => htmlspecialchars($_POST['title']),
            'body' => htmlspecialchars($_POST['body']),
            'creator_id' => 4
        ]);
        header('location: /notes');
        die();
    }
}

require view('notes/create.view.php');
