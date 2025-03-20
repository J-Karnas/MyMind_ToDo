<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\ViewTasksModel;
use App\View\View;

class MainController extends AbstractController
{
    public function mainRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->paramView['category'] = $this->category();

            $viewTasks = new ViewTasksModel();

            if ($result = $viewTasks->viewTasksMain((int) $_SESSION['userId'])) {
                $this->paramView['tasks'] = $result;
            }

            (new View())->viewer("main", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }
}
