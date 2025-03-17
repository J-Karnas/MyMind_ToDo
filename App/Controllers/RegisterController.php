<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View\View;
use App\Controllers\AbstractController;
use App\Models\RegisterModel;

class RegisterController extends AbstractController
{
    public function registerRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->forwarding("/main");
        } else {
            (new View())->viewer("register");
        }
    }

    public function userRegister(): void
    {
        $registerModel = new RegisterModel();

        $data = [
            'userName' => trim($_POST['userName']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'repeatPassword' => trim($_POST['repeatPassword'])
        ];

        if (empty($data['userName']) || empty($data['email']) || empty($data['password']) || empty($data['repeatPassword'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/register");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Niepoprawna forma maila";
            $this->forwarding("/register");
        }

        if (!preg_match('/^[a-zA-Z0-9ĄĆĘŁŃÓŚŹŻąćęłńóśźż ]+$/u', $data['userName'])) {
            $_SESSION["error"] = "Zakazane znaki w nazwie użytkownika";
            $this->forwarding("/register");
        }

        if (strlen($data['password']) < 8) {
            $_SESSION["error"] = "Zbyt krótkie hasło";
            $this->forwarding("/register");
        } else if ($data['password'] !== $data['repeatPassword']) {
            $_SESSION["error"] = "Hasła nie są takie same";
            $this->forwarding("/register");
        }

        if ($registerModel->findEmail($data['email'])) {
            $_SESSION["error"] = "Adres email jest już zajęty";
            $this->forwarding("/register");
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($registerModel->UserAdd($data)) {
            $_SESSION["error"] = "Konto zostało utworzone!";
            $this->forwarding("/login");
        } else {
            $_SESSION["error"] = "Nie udało się utworzyć konta";
            $this->forwarding("/register");
        }
    }
}
