<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class LoginModel extends AbstractModel
{
    public function UserLogin(array $data): bool
    {

        $this->query('INSERT INTO users VALUES (NULL, :username, :email, :phone_number, :password_hash, :login_error, now(), now());');
        $this->bind(':username', $data['userName']);
        $this->bind(':email', $data['email']);
        $this->bind(':phone_number', $data['phoneNumber']);
        $this->bind(':password_hash', $data['password']);
        $this->bind(':login_error', (int) 0);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUser($email)
    {
        $this->query('SELECT * FROM users WHERE email = :email');
        $this->bind(':email', $email);

        $row = $this->singleArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function updateDateLogin(array $data): bool
    {
        $this->query('UPDATE users SET last_login = NOW() WHERE users.id = :id;');
        $this->bind(':id', $data['id']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
