<?php

$_SESSION['name'] = 'Floris';

view("index.view.php", [
    'heading' => 'Home'
]);