<?php
$heading = 'Note';

$config = require base_path('config.php');
$db = new DB($config['database'], 'root', 'qwerty');


$note = $db->query('select * from notes where id = ?', [$_GET['id']])->fetchOrAbort(Response::PAGE_NOT_FOUND);



authorize($note['creator_id'] === 4);


require view('/notes/show.view.php');
