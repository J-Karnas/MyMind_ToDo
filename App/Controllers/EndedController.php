<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\ViewTasksModel;
use App\View\View;

class EndedController extends AbstractController
{
    public function endedRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->paramView['category'] = $this->category();

            $viewTasks = new ViewTasksModel();

            $filtr = $_GET['categories'] ?? [];
            $filtrNone = $_GET['categoriesNone'] ?? [];
            $sort = $_GET['sort'] ?? "";

            if ($result = $viewTasks->viewTasksFiltrEnded((int) $_SESSION['userId'], $filtr, $filtrNone, $sort)) {
                $this->paramView['tasks'] = $result;
            }

            (new View())->viewer("ended", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }
}
