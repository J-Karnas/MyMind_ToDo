<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View\View;

class LoginController
{

    public function loginRender(): Void
    {
        // if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
        //     // $this->redirectGrant($_SESSION['userRight']);
        // } else {
        (new View())->viewer("login");
        // }
    }
}
