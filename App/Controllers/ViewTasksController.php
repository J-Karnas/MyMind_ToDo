<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;
use App\Models\ViewTasksModel;
use App\View\View;

class ViewTasksController extends AbstractController
{
    public function viewTasksRender(): Void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] = "login") {
            $this->paramView['category'] = $this->category();

            $viewTasks = new ViewTasksModel();

            $filtr = $_GET['categories'] ?? [];
            $filtrNone = $_GET['categoriesNone'] ?? [];
            $sort = $_GET['sort'] ?? "";

            if ($result = $viewTasks->viewTasksFiltr((int) $_SESSION['userId'], $filtr, $filtrNone, $sort)) {
                $this->paramView['tasks'] = $result;
            }

            (new View())->viewer("viewTasks", $this->paramView);
        } else {
            $this->forwarding("/login");
        }
    }

    public function postTask(): Void
    {
        $viewTasks = new ViewTasksModel();

        $data = [
            'titleTask' => trim($_POST['titleTask']),
            'descriptionTask' => trim($_POST['descriptionTask']),
            'category' => trim($_POST['category']),
            'priority' => trim($_POST['priority']),
            'date' => trim($_POST['date']),
        ];

        if (isset($_POST['checkboxReminder'])) {
            $data['checkboxReminder'] = $_POST['checkboxReminder'];
            $data['notification'] = trim($_POST['notification']);

            if (empty($data['checkboxReminder']) || empty($data['notification'])) {
                $_SESSION["error"] = "Brak potrzebnych danych";
                $this->forwarding("/viewTasks");
            }

            switch ($data['notification']) {
                case "null":
                    $data['notification'] = NULL;
                    break;
                case 1:
                    $data['notification'] = "codziennie";
                    break;
                case 2:
                    $data['notification'] = "dwa dni";
                    break;
                case 3:
                    $data['notification'] = "tydzien";
                    break;
                case 4:
                    $data['notification'] = "dzien przed";
                    break;
                case 5:
                    $data['notification'] = "dzien zakonczenia";
                    break;
                default:
                    $_SESSION["error"] = "Brak potrzebnych danych";
                    $this->forwarding("/viewTasks");
                    break;
            }
        } else {
            $data['checkboxReminder'] = NULL;
            $data['notification'] = NULL;
            $data['lastReminder'] = NULL;
        }

        if (empty($data['titleTask']) || empty($data['category']) || empty($data['priority'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/viewTasks");
        }

        if (strlen($data['titleTask']) > 100) {
            $_SESSION["error"] = "Zbyt długa nazwa zadania";
            $this->forwarding("/viewTasks");
        }

        switch ($data['priority']) {
            case "null":
                $data['priority'] = NULL;
                break;
            case 1:
                $data['priority'] = "I";
                break;
            case 2:
                $data['priority'] = "II";
                break;
            case 3:
                $data['priority'] = "III";
                break;
            case 4:
                $data['priority'] = "IV";
                break;
            case 5:
                $data['priority'] = "V";
                break;
            default:
                $_SESSION["error"] = "Uzupełnij potrzebne dane!";
                $this->forwarding("/viewTasks");
                break;
        }

        if ($data['category'] === "null") {
            $data['category'] = NULL;
        }

        if (empty($data['descriptionTask'])) {
            $data['descriptionTask'] = NULL;
        }

        if (empty($data['date'])) {
            $data['date'] = NULL;
        }
        $data['userId'] = $_SESSION['userId'];

        if ($viewTasks->addTask($data)) {
            $_SESSION["error"] = "Zadanie zostało dodane";
            $this->forwarding("/viewTasks");
        } else {
            $_SESSION["error"] = "Zadanie nie zostało dodane";
            $this->forwarding("/viewTasks");
        }
    }

    public function editTask(): Void
    {
        $viewTasks = new ViewTasksModel();

        $data = [
            'id' => trim($_POST['id']),
            'titleTask' => trim($_POST['titleTaskEdit']),
            'descriptionTask' => trim($_POST['descriptionTaskEdit']),
            'category' => trim($_POST['categoryEdit']),
            'priority' => trim($_POST['priorityEdit']),
            'date' => trim($_POST['dateEdit']),
        ];

        if (isset($_POST['checkboxReminderEdit'])) {
            $data['checkboxReminderEdit'] = $_POST['checkboxReminderEdit'];
            $data['notificationEdit'] = trim($_POST['notificationEdit']);

            if (empty($data['checkboxReminderEdit']) || empty($data['notificationEdit'])) {
                $_SESSION["error"] = "Brak potrzebnych danych";
                $this->forwarding("/viewTasks");
            }

            switch ($data['notificationEdit']) {
                case "null":
                    $data['notificationEdit'] = NULL;
                    break;
                case 1:
                    $data['notificationEdit'] = "codziennie";
                    break;
                case 2:
                    $data['notificationEdit'] = "dwa dni";
                    break;
                case 3:
                    $data['notificationEdit'] = "tydzien";
                    break;
                case 4:
                    $data['notificationEdit'] = "dzien przed";
                    break;
                case 5:
                    $data['notificationEdit'] = "dzien zakonczenia";
                    break;
                default:
                    $_SESSION["error"] = "Brak potrzebnych danych";
                    $this->forwarding("/viewTasks");
                    break;
            }
        } else {
            $data['checkboxReminderEdit'] = NULL;
            $data['notificationEdit'] = NULL;
            $data['lastReminder'] = NULL;
        }

        if (empty($data['titleTask']) || empty($data['category']) || empty($data['priority'])) {
            $_SESSION["error"] = "Brak potrzebnych danych";
            $this->forwarding("/viewTasks");
        }

        if (strlen($data['titleTask']) > 100) {
            $_SESSION["error"] = "Zbyt długa nazwa zadania";
            $this->forwarding("/viewTasks");
        }

        switch ($data['priority']) {
            case "null":
                $data['priority'] = NULL;
                break;
            case 1:
                $data['priority'] = "I";
                break;
            case 2:
                $data['priority'] = "II";
                break;
            case 3:
                $data['priority'] = "III";
                break;
            case 4:
                $data['priority'] = "IV";
                break;
            case 5:
                $data['priority'] = "V";
                break;
            default:
                $_SESSION["error"] = "Uzupełnij potrzebne dane!";
                $this->forwarding("/viewTasks");
                break;
        }

        if ($data['category'] === "null") {
            $data['category'] = NULL;
        }

        if (empty($data['descriptionTask'])) {
            $data['descriptionTask'] = NULL;
        }

        if (empty($data['date'])) {
            $data['date'] = NULL;
        }

        $data['userId'] = $_SESSION['userId'];

        if ($viewTasks->editTask($data)) {
            $_SESSION["error"] = "Zadanie zostało zmienione";
            $this->forwarding("/viewTasks");
        } else {
            $_SESSION["error"] = "Zadanie nie zostało zmienione";
            $this->forwarding("/viewTasks");
        }
    }

    public function acceptTask(): Void
    {
        $viewTasks = new ViewTasksModel();

        $data = [
            'id' => trim($_POST['id'])
        ];

        if (empty($data['id'])) {
            $_SESSION["error"] = "Brak id";
            $this->forwarding("/viewTasks");
        }

        $data['userId'] = $_SESSION['userId'];

        if ($viewTasks->acceptTask($data)) {
            $_SESSION["error"] = "Zadanie zostało zakończone";
            $this->forwarding("/viewTasks");
        } else {
            $_SESSION["error"] = "Zadanie nie zostało zakończone";
            $this->forwarding("/viewTasks");
        }
    }

    public function delTask(): Void
    {
        $viewTasks = new ViewTasksModel();

        $data = [
            'id' => trim($_POST['id'])
        ];

        if (empty($data['id'])) {
            $_SESSION["error"] = "Brak id";
            $this->forwarding("/viewTasks");
        }

        $data['userId'] = $_SESSION['userId'];

        if ($viewTasks->delTask($data)) {
            $_SESSION["error"] = "Zadanie zostało usunięte";
            $this->forwarding("/viewTasks");
        } else {
            $_SESSION["error"] = "Zadanie nie zostało usunięte";
            $this->forwarding("/viewTasks");
        }
    }
}
