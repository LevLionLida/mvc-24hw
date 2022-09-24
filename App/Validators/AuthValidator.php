<?php

namespace App\Validators;

class AuthValidator extends Base\UserBaseValidator
{
    protected array $errors = [
        'email_error' => 'Email or password is invalid',
        'password_error' => 'Email or password is invalid'
    ];

    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/'
    ];

    public function verifyPassword (string $formPass, string $userPass): bool  //compare the password from the form and from the database
    {
        $result = true;

        if (!password_verify($formPass, $userPass)) {//если хешированый пароль формы не совпадаес с паролем с базы
            $this->errors['password_error']='Email or password is invalid';
            $result = false;
        }

        return $result;
    }
}