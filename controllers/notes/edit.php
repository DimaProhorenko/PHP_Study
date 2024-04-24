<?php
$heading = 'Edit Note';

$db = App::resolve('Core/DB');
$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetchOrAbort();
authorize($note['creator_id'] === 4);
require view('notes/edit.view.php');
