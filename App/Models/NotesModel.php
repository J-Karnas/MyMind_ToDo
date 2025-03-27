<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class NotesModel extends AbstractModel
{
    public function addNote(array $data): bool
    {
        $this->query('INSERT INTO notes(user_id, title, description) VALUES (:userid, :title, :description)');

        $this->bind(':userid', $data['userId']);
        $this->bind(':title', $data['title']);
        $this->bind(':description', $data['description']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function viewNotes(int $id): array | Bool
    {
        $this->query('SELECT * FROM notes WHERE user_id = :userid');

        $this->bind(':userid', $id);

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function editNote(array $data): bool
    {
        $this->query('UPDATE notes SET title = :title, description = :description WHERE id = :id AND user_id = :userId');

        $this->bind(':id', $data['id']);
        $this->bind(':title', $data['title']);
        $this->bind(':description', $data['description']);
        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delNote(array $data): bool
    {
        $this->query('DELETE FROM notes WHERE id = :id AND user_id = :userId');

        $this->bind(':id', $data['id']);
        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
