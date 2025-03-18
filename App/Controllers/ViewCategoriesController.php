<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\ViewCategoriesModel;
use App\View\View;

class ViewCategoriesController extends AbstractController
{
    public function viewCategoriesRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $viewCategories = new ViewCategoriesModel();

            if ($result = $viewCategories->viewCategories((int) $_SESSION['userId'])) {
                $this->paramView['category'] = $result;
            }

            (new View())->viewer("viewCategories",  $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }

    public function postCategory(): Void
    {
        $viewCategories = new ViewCategoriesModel();

        $data = [
            'titleCategory' => trim($_POST['category']),
        ];

        if (empty($data['titleCategory'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/viewCategories");
        }

        if (!preg_match('/^[a-zA-Z0-9ĄĆĘŁŃÓŚŹŻąćęłńóśźż ]+$/u', $data['titleCategory'])) {
            $_SESSION["error"] = "Zakazane znaki w nazwie kategorii";
            $this->forwarding("/viewCategories");
        }

        if (strlen($data['titleCategory']) > 50) {
            $_SESSION["error"] = "Zbyt długa nazwa kategorii";
            $this->forwarding("/viewCategories");
        }

        $data['userId'] = $_SESSION['userId'];

        if ($viewCategories->addCategory($data)) {
            $_SESSION["error"] = "Kategoria została dodana";
            $this->forwarding("/viewCategories");
        } else {
            $_SESSION["error"] = "Zadanie nie zostało dodane";
            $this->forwarding("/viewCategories");
        }
    }
}
