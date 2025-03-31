<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\LoginModel;
use App\Models\NotesModel;
use App\View\View;

class ActivationController extends AbstractController
{
    public function activeAccountRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->forwarding("/main");
        } else {
            (new View())->viewer("active");
        }
    }

    public function tokenErrorRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->forwarding("/main");
        } else {
            (new View())->viewer("tokenError");
        }
    }

    public function verify()
    {
        if (isset($_GET['token'])) {
            $token = trim($_GET['token']);
            $userModel = new LoginModel();

            if ($userModel->tokenUsed($token)) {
                $this->forwarding("/verify/active");
                echo "Twoje konto zostało aktywowane!";
            } else {
                $this->forwarding("/verify/error");
                echo "Nieprawidłowy lub już wykorzystany token.";
            }
        } else {
            $this->forwarding("/verify/error");
            echo "Nieprawidłowy lub już wykorzystany token.";
        }
    }
}
