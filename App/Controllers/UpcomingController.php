<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\ViewTasksModel;
use App\View\View;

class UpcomingController extends AbstractController
{
    public function upcomingRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->paramView['category'] = $this->category();

            $viewTasks = new ViewTasksModel();

            $filtr = $_GET['categories'] ?? [];
            $filtrNone = $_GET['categoriesNone'] ?? [];
            $sort = $_GET['sort'] ?? "";

            if ($result = $viewTasks->viewTasksFiltrUpcoming((int) $_SESSION['userId'], $filtr, $filtrNone, $sort)) {
                $this->paramView['tasks'] = $result;
            }

            (new View())->viewer("upcoming", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }
}
