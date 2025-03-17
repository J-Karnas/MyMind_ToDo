<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class SettingsController extends AbstractController
{
    public function settingsRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("settings");
        } else {
            $this->forwarding("/login");
        }
    }
}
