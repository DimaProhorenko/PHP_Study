<?php
$heading = 'Notes';
$config = require base_path('config.php');
$db = new DB($config['database'], 'root', 'qwerty');
$notes = $db->query("select * from notes where creator_id = 4")->fetchAll();

require view('notes/index.view.php');
