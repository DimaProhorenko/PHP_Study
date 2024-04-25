<?php

$db = App::resolve('Core/DB');
$delete_id = $_POST['note_id'];
$note = $db->query('select * from notes where id = ?', [$delete_id])->fetchOrAbort(Response::PAGE_NOT_FOUND);

if (authorize($note['creator_id'] === 4)) {
    $db->query('delete from notes where id = :id', ['id' => $delete_id]);
    header('location: /notes');
    die();
}
