<?php
$heading = 'Note';

$config = require 'config.php';
$db = new DB($config['database'], 'root', 'qwerty');


$note = $db->query('select * from notes where id = ?', [$_GET['id']])->fetchOrAbort(Response::PAGE_NOT_FOUND);



authorize($note['creator_id'] === 4);


require 'views/notes/show.view.php';
