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
        // if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
        //     // $this->redirectGrant($_SESSION['userRight']);
        // } else {
        (new View())->viewer("register");
        // }
    }

    public function userRegister(): void
    {
        $registerModel = new RegisterModel();

        $data = [
            'userName' => trim($_POST['userName']),
            'email' => trim($_POST['email']),
            'phoneNumber' => trim($_POST['phoneNumber']),
            'password' => trim($_POST['password']),
            'repeatPassword' => trim($_POST['repeatPassword'])
        ];

        if (empty($data['userName']) || empty($data['email']) || empty($data['password']) || empty($data['repeatPassword'])) {
            $_SESSION["error"] = "Uzupełnij wymagane dane1";
            $this->forwarding("/register");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Uzupełnij wymagane dane2";
            $this->forwarding("/register");
        }

        if (!preg_match('/^[a-zA-Z0-9ĄĆĘŁŃÓŚŹŻąćęłńóśźż ]+$/u', $data['userName'])) {
            $_SESSION["error"] = "Uzupełnij wymagane dane3";
            $this->forwarding("/register");
        }

        if (!empty($data['phoneNumber'])) {
            if (!strlen($data['phoneNumber']) == 9) {
                $_SESSION["error"] = "Niepoprawny numer telefonu";
                $this->forwarding("/register");
            } else if (!preg_match('/^[0-9]{9,15}$/', $data['phone'])) {
                $_SESSION["error"] = "Niepoprawny numer telefonu";
                $this->forwarding("/register");
            }
        }

        if (strlen($data['password']) < 8) {
            $_SESSION["error"] = "Niepoprawne hasło";
            $this->forwarding("/register");
        } else if ($data['password'] !== $data['repeatPassword']) {
            $_SESSION["error"] = "Hasła nie sa takie same";
            $this->forwarding("/register");
        }

        if ($registerModel->findEmail($data['email'])) {
            $_SESSION["error"] = "Adres email jest już zajęty";
            $this->forwarding("/register");
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($registerModel->UserAdd($data)) {
            $_SESSION["error"] = "Udało się";
            $this->forwarding("/login");
        } else {
            $_SESSION["error"] = "Coś poszło nie tak";
            $this->forwarding("/register");
        }
    }
}
