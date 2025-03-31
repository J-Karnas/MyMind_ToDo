<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class MainModel extends AbstractModel
{
    public function statsCountTaskToday(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND DATE(due_date) = CURDATE() AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "progress");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsCountTaskUpcoming(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND DATE(due_date) > CURDATE() AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "progress");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsCountTaskCompleted(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND user_id = :userid;');

        $this->bind(':userid', $id);
        $this->bind(':status', "done");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsDayTaskCompleted(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND DATE(updated_at) = CURDATE() AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "done");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsDayTaskUnfinished(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND DATE(due_date) = CURDATE() AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "progress");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsWeekTaskCompleted(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND YEARWEEK(updated_at, 1) = YEARWEEK(CURDATE(), 1) AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "done");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsWeekTaskUnfinished(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND YEARWEEK(due_date, 1) = YEARWEEK(CURDATE(), 1) AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "progress");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsMonthTaskCompleted(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND YEAR(updated_at) = YEAR(CURDATE()) AND MONTH(updated_at) = MONTH(CURDATE()) AND user_id = :userid;');

        $this->bind(':userid', $id);
        $this->bind(':status', "done");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function statsMonthTaskUnfinished(int $id): array | Bool
    {
        $this->query('SELECT email, username, COUNT(tasks.id) AS statistic_count FROM users RIGHT JOIN tasks ON users.id = tasks.user_id WHERE tasks.status = :status AND YEAR(due_date) = YEAR(CURDATE()) AND MONTH(due_date) = MONTH(CURDATE()) AND user_id = :userid');

        $this->bind(':userid', $id);
        $this->bind(':status', "progress");

        $row = $this->singleArray();

        if ($this->Count() == 1) {
            return $row;
        } else {
            return false;
        }
    }
}
