<?php
$heading = 'New Note';
$config = require 'config.php';
$db = new DB($config['database'], 'root', 'qwerty');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST['title']) === 0) {
        $errors['title'] = 'Title can not be empty';
    }

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'Note body can not be empty';
    }

    if (strlen($_POST['body'] > 1000)) {
        $errors['body'] = 'The body can not be more than 1000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(title, body, creator_id) VALUES(:title, :body, :creator_id)', [
            'title' => htmlspecialchars($_POST['title']),
            'body' => htmlspecialchars($_POST['body']),
            'creator_id' => 4
        ]);
    }
}

require 'views/create_note.view.php';
