<?php
$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Notes';

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $id
])->fetch();

if (! $note)
{
    abort();
}

$currentUserId = 1;

if ($note['user_id'] !== $userId)
{
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";