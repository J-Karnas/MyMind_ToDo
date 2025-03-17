<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class ViewTasksController extends AbstractController
{
    public function viewTasksRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("viewTasks");
        } else {
            $this->forwarding("/login");
        }
    }
}
