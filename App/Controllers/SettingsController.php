<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\SettingsModel;
use App\View\View;

class SettingsController extends AbstractController
{
    public function settingsRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $viewSettings = new SettingsModel();

            if ($result = $viewSettings->viewNameAndPWD((int) $_SESSION['userId'])) {
                $this->paramView = $result;
            }

            (new View())->viewer("settings", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }

    public function editUser(): Void
    {
        $viewSettings = new SettingsModel();

        $data = [
            'name' => trim($_POST['nameEdit']),
        ];

        if (empty($data['name'])) {
            $_SESSION["error"] = "Brak nazwy";
            $this->forwarding("/settings");
        }

        if (!preg_match('/^[a-zA-Z0-9ĄĆĘŁŃÓŚŹŻąćęłńóśźż ]+$/u', $data['name'])) {
            $_SESSION["error"] = "Zakazane znaki w nazwie użytkownika";
            $this->forwarding("/settings");
        }

        $data['userId'] = $_SESSION['userId'];

        if ($viewSettings->editName($data)) {
            $_SESSION["error"] = "Nazwa została zmienione";
            $this->forwarding("/settings");
        } else {
            $_SESSION["error"] = "Wystąpił problem";
            $this->forwarding("/settings");
        }
    }

    public function editPWD(): Void
    {
        $viewSettings = new SettingsModel();

        $data = [
            'password' => trim($_POST['passwordEdit']),
            'repeatPassword' => trim($_POST['repeatPasswordEdit'])
        ];

        if (empty($data['password']) || empty($data['repeatPassword'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/settings");
        }

        if (strlen($data['password']) < 8) {
            $_SESSION["error"] = "Zbyt krótkie hasło";
            $this->forwarding("/settings");
        } else if ($data['password'] !== $data['repeatPassword']) {
            $_SESSION["error"] = "Hasła nie są takie same";
            $this->forwarding("/settings");
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['userId'] = $_SESSION['userId'];

        if ($viewSettings->editPWD($data)) {
            $_SESSION["error"] = "Hasło zostało zmienione";
            $this->forwarding("/settings");
        } else {
            $_SESSION["error"] = "Wystąpił problem";
            $this->forwarding("/settings");
        }
    }

    public function delAllData(): Void
    {
        $viewSettings = new SettingsModel();

        $data = [
            'password' => trim($_POST['password']),
            'repeatPassword' => trim($_POST['repeatPassword'])
        ];

        if (empty($data['password']) || empty($data['repeatPassword'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/settings");
        }

        if ($return = $viewSettings->viewNameAndPWD((int) $_SESSION['userId'])) {

            $data['userId'] = $_SESSION['userId'];

            if (password_verify($data['password'], $return['password_hash'])) {
                if ($viewSettings->delAllData($data)) {
                    $_SESSION["error"] = "Dane zostały usunięte";
                    $this->forwarding("/settings");
                } else {
                    $_SESSION["error"] = "Wystąpił problem";
                    $this->forwarding("/settings");
                }
            } else {
                $_SESSION["error"] = "Niepoprawne hasło";
                $this->forwarding("/settings");
            }
        } else {
            $_SESSION["error"] = "Wystąpił problem z bazą";
            $this->forwarding("/settings");
        }
    }

    public function delAccount(): Void
    {
        $viewSettings = new SettingsModel();

        $data = [
            'password' => trim($_POST['password']),
            'repeatPassword' => trim($_POST['repeatPassword'])
        ];

        if (empty($data['password']) || empty($data['repeatPassword'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/settings");
        }

        if ($return = $viewSettings->viewNameAndPWD((int) $_SESSION['userId'])) {

            $data['userId'] = $_SESSION['userId'];

            if (password_verify($data['password'], $return['password_hash'])) {
                if ($viewSettings->delAccount($data)) {
                    $_SESSION["error"] = "Dane zostały usunięte";
                    $this->forwarding("/logout");
                } else {
                    $_SESSION["error"] = "Wystąpił problem";
                    $this->forwarding("/settings");
                }
            } else {
                $_SESSION["error"] = "Niepoprawne hasło";
                $this->forwarding("/settings");
            }
        } else {
            $_SESSION["error"] = "Wystąpił problem z bazą";
            $this->forwarding("/settings");
        }
    }
}
