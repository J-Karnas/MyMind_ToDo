<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class ViewCategoriesController extends AbstractController
{
    public function viewCategoriesRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("viewCategories");
        } else {
            $this->forwarding("/login");
        }
    }
}
