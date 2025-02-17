<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View\View;
use App\Controllers\AbstractController;
use App\Models\LoginModel;

class LoginController extends AbstractController
{

    public function loginRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->forwarding("/main");
        } else {
            (new View())->viewer("login");
        }
    }

    public function userLogin(): void
    {
        $loginModel = new LoginModel();

        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        if (empty($data['email']) || empty($data['password'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/login");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Nieprawidłowy format email";
            $this->forwarding("/login");
        }

        if (strlen($data['password']) < 8) {
            $_SESSION["error"] = "Zbyt krótkie hasło";
            $this->forwarding("/login");
        }

        if ($return = $loginModel->findUser($data['email'])) {
            if (password_verify($data['password'], $return['password_hash'])) {
                if (!$loginModel->updateDateLogin($return)) {
                    $_SESSION["error"] = "Nie udało sie zaktualizować daty";
                    $this->createUserSession($return);
                }
                $this->createUserSession($return);
            } else {
                $_SESSION["error"] = "Niepoprawne hasło";
                // TODO - licznik błędnych zalogowań, jeżeli 3 pod rząd to wysłać mail
                $this->forwarding("/login");
            }
        } else {
            $_SESSION["error"] = "Niepoprawne dane";
            $this->forwarding("/login");
        }
    }

    private function createUserSession($return): void
    {
        $_SESSION['status'] = "login";
        $_SESSION['userId'] = $return['id'];
        $_SESSION['userName'] = $return['username'];
        $_SESSION['userEmail'] = $return['email'];
        $this->forwarding("/main");
    }

    public function logout(): void
    {
        unset($_SESSION['status']);
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);

        session_unset();
        session_destroy();
        $this->forwarding("/");
    }
}
