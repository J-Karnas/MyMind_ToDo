<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class SettingsModel extends AbstractModel
{
    public function viewNameAndPWD(int $id): array | Bool
    {
        $this->query('SELECT username, password_hash FROM users WHERE id = :userid');

        $this->bind(':userid', $id);

        $row = $this->singleArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function editName(array $data): bool
    {
        $this->query('UPDATE users SET username = :name WHERE id = :userId');

        $this->bind(':name', $data['name']);
        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function editPWD(array $data): bool
    {
        $this->query('UPDATE users SET password_hash = :password WHERE id = :userId');

        $this->bind(':password', $data['password']);
        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delAllData(array $data): bool
    {
        $this->query('DELETE FROM tasks WHERE user_id = :userId; DELETE FROM categories WHERE user_id = :userId; DELETE FROM notes WHERE user_id = :userId');

        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delAccount(array $data): bool
    {
        if($this->delAllData($data)){
            $this->query('DELETE FROM users WHERE id = :userId');
    
            $this->bind(':userId', $data['userId']);
    
            if ($this->execute()) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }

    }


}
