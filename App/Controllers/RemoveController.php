<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class RemoveController extends AbstractController
{
    public function removeRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("remove");
        } else {
            $this->forwarding("/login");
        }
    }
}
