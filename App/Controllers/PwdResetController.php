<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View\View;
use App\Controllers\AbstractController;
use App\Models\LoginModel;
use App\Models\PwdResetModel;

class PwdResetController extends AbstractController
{
    public function pwdResetemailRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->forwarding("/main");
        } else {
            (new View())->viewer("pwdResetEmail");
        }
    }

    public function reset()
    {
        if (isset($_GET['token'])) {
            $token = trim($_GET['token']);
            $pwdResetModel = new PwdResetModel();

            if ($pwdResetModel->getUserByToken($token)) {
                $this->paramView['data'] = $token;

                (new View())->viewer("pwdReset", $this->paramView);
            } else {
                $this->forwarding("/verify/error");
                echo "Nieprawidłowy lub już wykorzystany token.";
            }
        } else {
            $this->forwarding("/verify/error");
            echo "Nieprawidłowy lub już wykorzystany token.";
        }
    }

    public function sendResetEmail()
    {
        $loginModel = new LoginModel();
        $pwdResetModel = new PwdResetModel();

        $data = [
            'email' => trim($_POST['email']),
        ];

        if (empty($data['email'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/pwd/reset");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Nieprawidłowy format email";
            $this->forwarding("/pwd/reset");
        }

        if ($return = $loginModel->findUser($data['email'])) {
            $token = bin2hex(random_bytes(32));
            $dateUse = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $pwdResetModel->setResetToken($token, $dateUse, (int) $return['id']);

            $dataEmail = [
                'resertPwdLink' => "http://mymind.local/reset-password?token=" . $token,
            ];

            $this->sendPwdResetEmail($data['email'], $dataEmail);

            $_SESSION["error"] = "Email został wysłany";
            $this->forwarding("/login");
        } else {
            $_SESSION["error"] = "Email został wysłany";
            $this->forwarding("/login");
        }
    }


    public function resetPWD(): void
    {
        $pwdResetModel = new PwdResetModel();

        $data = [
            'password' => trim($_POST['password']),
            'repeatPassword' => trim($_POST['password_repeat']),
            'token' => trim($_POST['token'])
        ];

        if (empty($data['password']) || empty($data['repeatPassword']) || empty($data['token'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/reset-password?token=" . $data['token']);
        }

        if (strlen($data['password']) < 8) {
            $_SESSION["error"] = "Zbyt krótkie hasło";
            $this->forwarding("/reset-password?token=" . $data['token']);
        } else if ($data['password'] !== $data['repeatPassword']) {
            $_SESSION["error"] = "Hasła nie są takie same";
            $this->forwarding("/reset-password?token=" . $data['token']);
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if ($pwdResetModel->updatePassword($data['token'], $data['password'])) {
            $pwdResetModel->delToken($data['token']);
            $_SESSION["error"] = "Hasło zostało zmienione";
            $this->forwarding("/login");
        } else {
            $_SESSION["error"] = "Nie udało się zmienić hasła";
            $this->forwarding("/reset-password?token=" . $data['token']);
        }
    }
}
