<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate($attributes = [
    'email' => $email,
    'password' => $password
]);

$signedIn = (new Authenticator)
    ->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    $form
        ->error('email', 'No user found with this email address and password.')
        ->throw();
}

redirect('/');




