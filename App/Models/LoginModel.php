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
        $this->query('SELECT * FROM users WHERE email = :email AND is_active = :status_tk');
        $this->bind(':email', $email);
        $this->bind(':status_tk', "used");

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

    public function tokenUsed(string $token): bool
    {
        $this->query('SELECT * FROM users WHERE activation_token = :token AND is_active = :token_status');
        $this->bind(':token', $token);
        $this->bind(':token_status', "active");

        $row = $this->singleArray();

        if ($this->Count() > 0) {
            return $this->updateActiveUser($token);
        } else {
            return false;
        }
    }

    public function updateActiveUser(string $token): bool
    {
        $this->query('UPDATE users SET is_active = :status_tk WHERE activation_token = :token;');
        $this->bind(':token', $token);
        $this->bind(':status_tk', "used");

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLoginError(string $email): bool | array
    {
        $this->query('SELECT login_error FROM users WHERE email = :email;');
        $this->bind(':email', $email);

        $row = $this->singleArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function updateLoginError(string $email, $error): bool
    {
        $this->query('UPDATE users SET login_error = :error WHERE email = :email;');
        $this->bind(':email', $email);
        $this->bind(':error', $error);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
