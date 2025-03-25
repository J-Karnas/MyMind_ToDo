<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class ViewTasksModel extends AbstractModel
{
    public function addTask(array $data): bool
    {

        $this->query('INSERT INTO tasks(user_id, title, description, category_id, priority, status, due_date, created_at, updated_at, reminder, reminder_interval, last_reminder) VALUES (:userid, :title, :description, :category_id, :priority, :status, :due_date, now(), now(), :reminder, :reminder_interval, :last_reminder)');

        $this->bind(':userid', $data['userId']);
        $this->bind(':title', $data['titleTask']);
        $this->bind(':description', $data['descriptionTask']);
        $this->bind(':category_id', $data['category']);
        $this->bind(':priority', $data['priority']);
        $this->bind(':status', "progress");
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

    public function viewTasksMain(int $id): array | Bool
    {
        $this->query('SELECT tasks.id, tasks.user_id, title, description, category_id, priority, status, DATE_FORMAT(due_date, \'%d-%m-%Y\') AS due_date, reminder, reminder_interval, name FROM tasks LEFT JOIN categories ON categories.id = tasks.category_id WHERE status = "progress" AND due_date <> "NULL" AND tasks.user_id = :userid ORDER BY due_date ASC LIMIT 15');

        $this->bind(':userid', $id);

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function viewTasksFiltr(int $id, $filtr,  $filtrNone, string $sort): array | Bool
    {

        $placeholders = implode(', ', array_map(function ($index) {
            return ":placeholder" . $index;
        }, array_keys($filtr)));

        if (empty($filtrNone) && empty($filtr)) {
            $sql =  "";
        } elseif (!empty($filtrNone) && empty($filtr)) {
            $sql =  "AND category_id IS NULL";
        } elseif (empty($filtrNone) && !empty($filtr)) {
            $sql = "AND category_id IN (" . $placeholders . ")";
        } elseif (!empty($filtrNone) && !empty($filtr)) {
            $sql = "AND category_id IN (" . $placeholders . ") OR category_id IS NULL";
        }

        switch ($sort) {
            case '1':
                $order = " ORDER BY due_date ASC";
                break;
            case '2':
                $order = " ORDER BY due_date DESC";
                break;
            case '3':
                $order = " ORDER BY priority ASC";
                break;
            case '4':
                $order = " ORDER BY priority DESC";
                break;
            default:
                $order = "";
                break;
        }

        $this->query('SELECT tasks.id, tasks.user_id, title, description, category_id, priority, status, DATE_FORMAT(due_date, \'%d-%m-%Y\') AS due_date, reminder, reminder_interval, name FROM tasks LEFT JOIN categories ON categories.id = tasks.category_id WHERE status = "progress" AND tasks.user_id = :userid ' . $sql . $order);

        $this->bind(':userid', $id);
        foreach ($filtr as $index => $value) {
            $this->bind(':placeholder' . $index, $value);
        }

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function viewTasksFiltrToday(int $id, $filtr,  $filtrNone, string $sort): array | Bool
    {

        $placeholders = implode(', ', array_map(function ($index) {
            return ":placeholder" . $index;
        }, array_keys($filtr)));

        if (empty($filtrNone) && empty($filtr)) {
            $sql =  "";
        } elseif (!empty($filtrNone) && empty($filtr)) {
            $sql =  "AND category_id IS NULL";
        } elseif (empty($filtrNone) && !empty($filtr)) {
            $sql = "AND category_id IN (" . $placeholders . ")";
        } elseif (!empty($filtrNone) && !empty($filtr)) {
            $sql = "AND (category_id IN (" . $placeholders . ") OR category_id IS NULL)";
        }

        switch ($sort) {
            case '3':
                $order = " ORDER BY priority ASC";
                break;
            case '4':
                $order = " ORDER BY priority DESC";
                break;
            default:
                $order = "";
                break;
        }

        $this->query('SELECT
        tasks.id, tasks.user_id, title, description, category_id, priority, status, DATE_FORMAT(due_date, \'%d-%m-%Y\') AS due_date, reminder, reminder_interval, name FROM tasks
        LEFT JOIN categories ON categories.id = tasks.category_id
        WHERE status = "progress"
        AND DATE(due_date) = CURDATE()
        AND tasks.user_id = :userid ' . $sql . $order);

        $this->bind(':userid', $id);
        foreach ($filtr as $index => $value) {
            $this->bind(':placeholder' . $index, $value);
        }

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function viewTasksFiltrUpcoming(int $id, $filtr,  $filtrNone, string $sort): array | Bool
    {

        $placeholders = implode(', ', array_map(function ($index) {
            return ":placeholder" . $index;
        }, array_keys($filtr)));

        if (empty($filtrNone) && empty($filtr)) {
            $sql =  "";
        } elseif (!empty($filtrNone) && empty($filtr)) {
            $sql =  "AND category_id IS NULL";
        } elseif (empty($filtrNone) && !empty($filtr)) {
            $sql = "AND category_id IN (" . $placeholders . ")";
        } elseif (!empty($filtrNone) && !empty($filtr)) {
            $sql = "AND (category_id IN (" . $placeholders . ") OR category_id IS NULL)";
        }

        switch ($sort) {
            case '1':
                $order = " ORDER BY due_date ASC";
                break;
            case '2':
                $order = " ORDER BY due_date DESC";
                break;
            case '3':
                $order = " ORDER BY priority ASC";
                break;
            case '4':
                $order = " ORDER BY priority DESC";
                break;
            default:
                $order = "";
                break;
        }

        $this->query('SELECT
        tasks.id, tasks.user_id, title, description, category_id, priority, status, DATE_FORMAT(due_date, \'%d-%m-%Y\') AS due_date, reminder, reminder_interval, name FROM tasks
        LEFT JOIN categories ON categories.id = tasks.category_id
        WHERE status = "progress"
        AND (DATE(due_date) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY))
        AND tasks.user_id = :userid ' . $sql . $order);

        $this->bind(':userid', $id);
        foreach ($filtr as $index => $value) {
            $this->bind(':placeholder' . $index, $value);
        }

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function viewTasksFiltrEnded(int $id, $filtr,  $filtrNone, string $sort): array | Bool
    {

        $placeholders = implode(', ', array_map(function ($index) {
            return ":placeholder" . $index;
        }, array_keys($filtr)));

        if (empty($filtrNone) && empty($filtr)) {
            $sql =  "";
        } elseif (!empty($filtrNone) && empty($filtr)) {
            $sql =  "AND category_id IS NULL";
        } elseif (empty($filtrNone) && !empty($filtr)) {
            $sql = "AND category_id IN (" . $placeholders . ")";
        } elseif (!empty($filtrNone) && !empty($filtr)) {
            $sql = "AND (category_id IN (" . $placeholders . ") OR category_id IS NULL)";
        }

        switch ($sort) {
            case '1':
                $order = " ORDER BY due_date ASC";
                break;
            case '2':
                $order = " ORDER BY due_date DESC";
                break;
            case '3':
                $order = " ORDER BY priority ASC";
                break;
            case '4':
                $order = " ORDER BY priority DESC";
                break;
            default:
                $order = "";
                break;
        }

        $this->query('SELECT
        tasks.id, tasks.user_id, title, description, category_id, priority, status, DATE_FORMAT(due_date, \'%d-%m-%Y\') AS due_date, reminder, reminder_interval, name FROM tasks
        LEFT JOIN categories ON categories.id = tasks.category_id
        WHERE status = "done"
        AND tasks.user_id = :userid ' . $sql . $order);

        $this->bind(':userid', $id);
        foreach ($filtr as $index => $value) {
            $this->bind(':placeholder' . $index, $value);
        }

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
