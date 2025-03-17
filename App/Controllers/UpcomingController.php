<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class UpcomingController extends AbstractController
{
    public function upcomingRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("upcoming");
        } else {
            $this->forwarding("/login");
        }
    }
}
