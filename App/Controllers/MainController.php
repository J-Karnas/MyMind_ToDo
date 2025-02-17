<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class MainController extends AbstractController
{
    public function mainRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("main");
        } else {
            $this->forwarding("/login");
        }
    }
}
