<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View\View;
use App\Controllers\AbstractController;

class HomeController extends AbstractController
{
    public function homeRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->forwarding("/main");
        } else {
            (new View())->viewer("home");
        }
    }
}
