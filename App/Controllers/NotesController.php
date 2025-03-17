<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\View\View;

class NotesController extends AbstractController
{
    public function notesRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            (new View())->viewer("notes");
        } else {
            $this->forwarding("/login");
        }
    }
}
