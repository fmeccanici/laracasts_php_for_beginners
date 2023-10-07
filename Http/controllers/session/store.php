<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);
$form = new LoginForm();
if (! $form->validate($email, $password))
{
    return view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
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