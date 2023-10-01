<?php
require 'functions.php';
require 'Database.php';

// Connect to the database, and execute a query.

$db = new Database();
$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post)
{
    echo "<li>{$post['title']}</li>";
}

