<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class TodayController extends AbstractController
{
    public function todayRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("today");
        } else {
            $this->forwarding("/login");
        }
    }
}
