<?php
$heading = 'Notes';
$config = require 'config.php';
$db = new DB($config['database'], 'root', 'qwerty');
$notes = $db->query("select * from notes where creator_id = 4")->fetchAll();

require 'views/notes/index.view.php';
