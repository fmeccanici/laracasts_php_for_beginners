<?php
$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Notes';

$notes = $db->query('select * from notes where user_id = :id', [
    'id' => 1
])->get();

require "views/notes/index.view.php";