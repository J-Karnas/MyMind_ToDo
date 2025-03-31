<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class PwdResetModel extends AbstractModel
{

    public function setResetToken(string $token, string $dateUse, int $id): bool
    {
        $this->query('INSERT INTO reset_pwd_token(id, user_id, token_pwd, end_of_validity) VALUES (NULL, :id, :token, :date)');
        $this->bind(':id', $id);
        $this->bind(':token', $token);
        $this->bind(':date', $dateUse);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserByToken(string $token): array | bool
    {
        $this->query('SELECT user_id FROM reset_pwd_token INNER JOIN users ON users.id = reset_pwd_token.user_id WHERE token_pwd = :token AND end_of_validity > NOW()');

        $this->bind(':token', $token);

        $row = $this->singleArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        };
    }

    public function updatePassword(string $token, string $newPassword): bool
    {
        $this->query('UPDATE users SET password_hash = :password WHERE id = (SELECT user_id FROM reset_pwd_token WHERE token_pwd = :token)');

        $this->bind(':token', $token);
        $this->bind(':password', $newPassword);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delToken(string $token): bool
    {
        $this->query('DELETE FROM reset_pwd_token WHERE token_pwd = :token');

        $this->bind(':token', $token);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
