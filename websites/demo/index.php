<?php
require 'functions.php';
require 'Database.php';

// Connect to the database, and execute a query.
$config = require('config.php');

$db = new Database($config['database']);
$posts = $db->query("select * from posts")->fetchAll();

foreach ($posts as $post)
{
    echo "<li>{$post['title']}</li>";
}

