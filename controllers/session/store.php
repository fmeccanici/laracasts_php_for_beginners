<?php

use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);
$errors = [];

if (!\Core\Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!\Core\Validator::string($password)) {
    $errors['password'] = 'Please enter a valid password.';
}

if (!empty($errors)) {
    return view('sessions/create.view.php', compact('errors'));
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user)
{
    if (password_verify($password, $user['password']))
    {
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No user found with this email address and password.'
    ]
]);