<?php
require_once base_path('core/Validator.php');
$db = App::resolve('Core/DB');
$note = $db->query('select * from notes where id = :id', ['id' => $_POST['note_id']])->fetchOrAbort(Response::FORBIDDEN);

authorize($note['creator_id'] === 4);

$errors = [];

if (!Validator::string($_POST['title'], 1, 255)) {
    $errors['title'] = 'Title must be in range 1 - 255 characters';
}

if (!Validator::string($_POST['body'], 1, 5)) {
    $errors['body'] = 'The note body must be in range 1 - 1_000 characters';
}

if (empty($errors)) {
    $db->query('update notes set title = :title, body = :body where id = :id', [
        'title' => htmlspecialchars($_POST['title']),
        'body' => htmlspecialchars($_POST['body']),
        'id' => $_POST['note_id']
    ]);
    header('location: /notes');
    die();
}
