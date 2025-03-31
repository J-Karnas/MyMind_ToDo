<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class EmailModel extends AbstractModel
{
    //zmiana lastRem
    public function updateLastRem(array $data): bool
    {
        $this->query('UPDATE tasks SET last_reminder = NOW() WHERE id = :id');

        $this->bind(':id', $data['id']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //codzienne powiadomienia
    public function countTaskEveryDay(): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS tasks_value FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :reminder AND tasks.status = :status AND reminder_interval = :rem_interval GROUP BY email');

        $this->bind(':reminder', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "codziennie");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function idTaskEveryDay(array $data): array | Bool
    {
        $this->query('SELECT tasks.id, tasks.title FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :statusRem AND tasks.status = :status AND reminder_interval = :rem_interval AND email = :email');

        $this->bind(':email', $data['email']);
        $this->bind(':statusRem', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "codziennie");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function countTaskOnThisDay(): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS tasks_value FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :reminder AND tasks.status = :status AND DATE(due_date) = CURDATE() AND reminder_interval = :rem_interval GROUP BY email;');

        $this->bind(':reminder', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "dzien zakonczenia");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function dataTaskOnThisDay(array $data): array | Bool
    {
        $this->query('SELECT tasks.id, tasks.title FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :statusRem AND tasks.status = :status AND reminder_interval = :rem_interval AND email = :email AND DATE(due_date) = CURDATE();');

        $this->bind(':email', $data['email']);
        $this->bind(':statusRem', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "dzien zakonczenia");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function countTaskDayBeforeEnd(): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS tasks_value FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :reminder AND tasks.status = :status AND (DATE(due_date) = CURDATE() + INTERVAL 1 DAY) AND reminder_interval = :rem_interval GROUP BY email');

        $this->bind(':reminder', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "dzien przed");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function dataTaskDayBeforeEnd(array $data): array | Bool
    {
        $this->query('SELECT tasks.id, tasks.title FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :statusRem AND tasks.status = :status AND reminder_interval = :rem_interval AND email = :email AND (DATE(due_date) = CURDATE() + INTERVAL 1 DAY);');

        $this->bind(':email', $data['email']);
        $this->bind(':statusRem', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "dzien przed");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function countTaskEveryTwoDays(): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS tasks_value FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :reminder AND tasks.status = :status AND (DATE(last_reminder) = CURDATE() - INTERVAL 2 DAY) AND reminder_interval = :rem_interval GROUP BY email;');

        $this->bind(':reminder', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "dwa dni");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function dataTaskEveryTwoDays(array $data): array | Bool
    {
        $this->query('SELECT tasks.id, tasks.title FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :statusRem AND tasks.status = :status AND reminder_interval = :rem_interval AND email = :email AND (DATE(last_reminder) = CURDATE() - INTERVAL 2 DAY);');

        $this->bind(':email', $data['email']);
        $this->bind(':statusRem', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "dwa dni");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function countTaskEveryWeek(): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS tasks_value FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :reminder AND tasks.status = :status AND (DATE(last_reminder) = CURDATE() - INTERVAL 7 DAY) AND reminder_interval = :rem_interval GROUP BY email');

        $this->bind(':reminder', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "tydzien");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function dataTaskEveryWeek(array $data): array | Bool
    {
        $this->query('SELECT tasks.id, tasks.title FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.reminder = :statusRem AND tasks.status = :status AND reminder_interval = :rem_interval AND email = :email AND (DATE(last_reminder) = CURDATE() - INTERVAL 7 DAY);');

        $this->bind(':email', $data['email']);
        $this->bind(':statusRem', "on");
        $this->bind(':status', "progress");
        $this->bind(':rem_interval', "tydzien");

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
