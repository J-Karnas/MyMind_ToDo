<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ViewCategoriesModel;

abstract class AbstractController
{
    protected $paramView = [];

    protected function forwarding(string $url): void
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $url);
        exit;
    }

    protected function category()
    {
        $viewCategories = new ViewCategoriesModel();

        if ($result = $viewCategories->viewCategories((int) $_SESSION['userId'])) {
            return $result;
        }
    }
}
