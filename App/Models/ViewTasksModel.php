<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class ViewTasksModel extends AbstractModel
{
    public function addTask(array $data): bool
    {

        $this->query('INSERT INTO tasks(user_id, title, description, category_id, priority, due_date, created_at, updated_at, reminder, reminder_interval, last_reminder) VALUES (:userid, :title, :description, :category_id, :priority, :due_date, now(), now(), :reminder, :reminder_interval, :last_reminder)');

        $this->bind(':userid', $data['userId']);
        $this->bind(':title', $data['titleTask']);
        $this->bind(':description', $data['descriptionTask']);
        $this->bind(':category_id', $data['category']);
        $this->bind(':priority', $data['priority']);
        $this->bind(':due_date', $data['date']);

        $this->bind(':reminder', $data['checkboxReminder']);
        $this->bind(':reminder_interval', $data['notification']);
        $this->bind(':last_reminder',  $data['lastReminder']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
