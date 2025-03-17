<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class EndedController extends AbstractController
{
    public function endedRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("ended");
        } else {
            $this->forwarding("/login");
        }
    }
}
