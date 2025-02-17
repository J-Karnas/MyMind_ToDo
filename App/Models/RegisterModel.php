<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class RegisterModel extends AbstractModel
{
    public function UserAdd(array $data): bool
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

    public function findEmail($email)
    {
        $this->query('SELECT id FROM users WHERE email = :email');
        $this->bind(':email', $email);

        $row = $this->single();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
