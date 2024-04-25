<?php
$heading = 'Note';

$config = require base_path('config.php');
$db = new DB($config['database'], 'root', 'qwerty');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete_id = $_POST['note_id'];
    $note = $db->query('select * from notes where id = ?', [$delete_id])->fetchOrAbort(Response::PAGE_NOT_FOUND);

    if (authorize($note['creator_id'] === 4)) {
        $db->query('delete from notes where id = :id', ['id' => $delete_id]);
        header('location: /notes');
        die();
    }
}

$note = $db->query('select * from notes where id = ?', [$_GET['id']])->fetchOrAbort(Response::PAGE_NOT_FOUND);



authorize($note['creator_id'] === 4);


require view('/notes/show.view.php');
