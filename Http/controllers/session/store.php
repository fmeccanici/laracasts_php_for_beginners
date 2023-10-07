<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No user found with this email address and password.');
}

Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $email
]);

return redirect('/login');
