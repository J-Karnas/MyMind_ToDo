<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\AbstractModel;

class ViewCategoriesModel extends AbstractModel
{
    public function addCategory(array $data): bool
    {

        $this->query('INSERT INTO categories(name, user_id) VALUES (:title, :userid)');

        $this->bind(':title', $data['titleCategory']);
        $this->bind(':userid', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editCategory(array $data): bool
    {
        $this->query('UPDATE categories SET name = :title WHERE id = :id AND user_id = :userId');

        $this->bind(':id', $data['id']);
        $this->bind(':title', $data['titleCategory']);
        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function viewCategories(int $id): array | Bool
    {
        $this->query('SELECT * FROM categories WHERE user_id = :userid');

        $this->bind(':userid', $id);

        $row = $this->allArray();

        if ($this->Count() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function delCategories(array $data)
    {
        $this->query('SELECT * FROM tasks WHERE category_id = :id');

        $this->bind(':id', $data['id']);

        $row = $this->allArray();

        if ($this->Count() == 0) {
            $this->viewCategoriesUse($data);
        } else {
            return false;
        }
    }

    public function viewCategoriesUse(array $data): bool
    {
        $this->query('DELETE FROM categories WHERE id = :id AND user_id = :userId ');

        $this->bind(':id', $data['id']);
        $this->bind(':userId', $data['userId']);

        if ($this->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
